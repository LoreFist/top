<?php

namespace app\controllers;

use app\models\consultant\Consultant;
use app\models\consultant\ConsultantCat;
use app\models\consultant\ConsultantCountry;
use app\models\consultant\ConsultantResort;
use app\models\dict\DictAllocation;
use app\models\dict\DictAlloccat;
use app\models\dict\DictAllocPlaceType;
use app\models\dict\DictCity;
use app\models\dict\DictCountry;
use app\models\dict\DictResort;
use app\models\Direct;
use app\models\direct\DirectCategory;
use app\models\direct\DirectFood;
use app\models\direct\DirectKids;
use app\models\direct\DirectOther;
use app\models\direct\DirectPalaceValue;
use app\models\Food;
use app\models\ForKids;
use app\models\MailSchedule;
use app\models\Other;
use app\models\Rating;
use app\models\Request;
use app\models\RequestFood;
use app\models\RequestLocation;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Response;
use yii\widgets\ActiveForm;

class RequestController extends \yii\web\Controller
{


    /**
     * Создание модели помощь в подборе
     * Подгрузка справочника стран и городов России
     *
     * @return рендер view help
     */
    public function actionHelp()
    {
        $model = new Request();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            $model->created_at          = strtotime($model->created_at);
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }

        $dict_country = DictCountry::find()
            ->select('id, name')
            ->where(['active' => true])
            ->andWhere(['trash' => false])
            ->orderBy(['name' => SORT_ASC])
            ->all();

        $dict_city_deprt = DictCity::getDirectCity();

        $items_dict_country = ArrayHelper::map($dict_country, 'id', 'name');
        $items_dict_deprt   = ArrayHelper::map($dict_city_deprt, 'id', 'name');

        $key_msc = array_search('Москва', $items_dict_deprt);
        $key_spb = array_search('Санкт-Петербург', $items_dict_deprt);
        unset($items_dict_deprt[$key_msc]);
        unset($items_dict_deprt[$key_spb]);
        $items_dict_deprt = [
                $key_msc => 'Москва',
                $key_spb => 'Санкт-Петербург',
            ] + $items_dict_deprt;

        $items_dict_deprt_spechotel = [
                -1 => 'Без перелета',
            ] + $items_dict_deprt;

        $food = Food::find()->orderBy(['id' => SORT_ASC])->all();

        $category = DictAlloccat::find()
            ->select('id, name')
            ->where(['active' => true])
            ->andWhere(['trash' => false])
            ->orderBy(['weight' => SORT_DESC])
            ->all();

        $rating = Rating::find()
            ->select('id, name')
            ->where(['active' => 'true'])
            ->orderBy(['weight' => SORT_DESC])
            ->all();

        $palaceType = DictAllocPlaceType::find()->joinWith('values')
            ->where(['dict_alloc_place_type.active' => true])
            ->andWhere(['dict_alloc_place_type.trash' => false])
            ->andWhere(['dict_alloc_place_value.active' => true])
            ->andWhere(['dict_alloc_place_value.trash' => false])
            ->all();

        $forKids = ForKids::find()
            ->select('id, name')
            ->where(['active' => 'true'])
            ->orderBy(['weight' => SORT_DESC])
            ->all();

        $other = Other::find()
            ->select('id, name')
            ->where(['active' => 'true'])
            ->orderBy(['weight' => SORT_DESC])
            ->all();

        return $this->render(
            'help',
            ['model'      => $model,
             'items_dict' => [
                 'country'    => $items_dict_country,
                 'city_deprt' => $items_dict_deprt,
                 'spec_hotel' => $items_dict_deprt_spechotel,
                 'food'       => $food,
                 'category'   => $category,
                 'rating'     => $rating,
                 'palaceType' => $palaceType,
                 'forkids'    => $forKids,
                 'other'      => $other,
             ]]
        );
    }

    /**
     * Сохранение модели не стандартного запроса
     *
     * @return Json
     */
    public function actionSavenostandard()
    {
        $model = new Request();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at   = strtotime(Yii::$app->request->post()['Request']['created_at']);
            $model->city_tour_id = 0;

            if ($model->save()) {

                try {
                    //даем шанс пользователю попасть на дефолтного менеджера по всем странам
                    $words_arr = preg_split('/\s+/', $model->optional);

                    $dictCountry = DictCountry::find()->select('id,name');
                    foreach ($words_arr as $key=>$word){
                        $key == 0 ? $dictCountry->where("name ILIKE '".$word."'") : $dictCountry->orWhere("name ILIKE '".$word."'");
                    }
                    $dictCountry = $dictCountry->all();

                    $consultant = Consultant::findOne(Yii::$app->params['defaultConsultant']);

                    $model->consultant_id = $consultant->id;
                    $model->save(false);

                    if (count($dictCountry) != 0) {

                        $email_to = $consultant->email;
                        Yii::$app->mailer->compose(
                            '@app/mail/requests/request',
                            [
                                'model'    => $model,
                                'email_to' => $email_to,
                                'name'     => $consultant->name,
                            ]
                        )
                            ->setFrom(Yii::$app->params['admin_email'])
                            ->setTo($email_to)
                            ->setSubject('Добавлена новая заявка')
                            ->send();
                    }

                    return json_encode(
                        [
                            'code'   => 1,
                            'status' => 'send and save',
                        ]
                    );

                } catch (ExitException $e) {
                    return json_encode(
                        [
                            'code'   => 0,
                            'status' => 'send error',
                        ]
                    );
                }


            } else {
                return json_encode(
                    [
                        'code'   => 0,
                        'status' => 'no save',
                    ]
                );
            }
        }
    }

    /**
     * Сохранение модели расширеного подбора, создание реквеста, разбор
     * направлений и сохранение, добавление емайл в очередь
     *
     * @return Json
     */
    public function actionSaveextend()
    {
        $posts = Yii::$app->request->post();

        if (isset($posts['modelRequestId']) AND $posts['modelRequestId'] == 0) {
            $model               = new Request();
            $model->name         = 'not set';
            $model->phone        = 'not set';
            $model->city_tour_id = 0;
            $step                = 1;
        } else {
            $model = Request::findOne((int)$posts['modelRequestId']);
            $step  = 2;
        }

        if ($posts) {
            foreach ($posts['country_id'] as $key => $country) {
                if ($country == 'Не важно') {
                    unset($posts['Request']['direct']['country_id'][$key]);
                }
            }
            foreach ($posts['city_id'] as $key => $city) {
                if ($city == 'Не важно') {
                    unset($posts['Request']['direct']['city_id'][$key]);
                }
            }
            foreach ($posts['departure_id'] as $key => $city) {
                if ($city == 'Не важно') {
                    unset($posts['Request']['direct']['departure_id'][$key]);
                }
            }

            //даты из строк переводим в массивы
            $date_from_to     = explode("_", $posts['Request']['date_departure']);
            $day_stay_from_to = explode("_", $posts['Request']['day_stay']);

            $posts['Request']['date_departure_from'] = $date_from_to[0];
            $posts['Request']['date_departure_to']   = $date_from_to[1];

            $posts['Request']['day_stay_from'] = $day_stay_from_to[0];
            $posts['Request']['day_stay_to']   = $day_stay_from_to[1];

            $directs     = $posts['Request']['direct'];
            $paramsHotel = $posts['Request']['direct']['paramhotel'];
            unset($posts['Request']['direct']);

            $model->load($posts);
            $model->created_at   = strtotime($posts['Request']['created_at']);
            $model->city_tour_id = (int)$model->city_tour_id;

            $model->currency_id = (int)$posts['Request']['currency'];
            $model->type        = $posts['typeTour'];

            if ($save = $model->save(false)) {
                if ($step == 1) {
                    $directCount = (int)$posts['countDirect'] + 1;
                    if ($model->type == 'type1') {
                        $directSave  = [];
                        $directModel = [];

                        for ($i = 0; $i < $directCount; $i++) {
                            $directModel[$i] = new Direct();

                            if (isset($directs['country_id'][$i]) AND $directs['country_id'][$i] != '') {
                                $directModel[$i]->country_id = $directs['country_id'][$i];
                            }
                            if (isset($directs['city_id'][$i]) AND $directs['city_id'][$i] != '') {
                                $directModel[$i]->city_id = $directs['city_id'][$i];
                            }
                            if (isset($directs['departure_id'][$i]) AND $directs['departure_id'][$i] != '') {
                                $directModel[$i]->city_departure_id = $directs['departure_id'][$i];
                            }

                            $directModel[$i]->request_id      = $model->id;
                            $directModel[$i]->hotel_rating_id = $paramsHotel[$i]['rating'][0];
                        }

                        if(isset($directModel[0]->country_id) AND $directModel[0]->country_id != ''){//распределение заявки по первому турпакету
                            $consCountry = ConsultantCountry::findOne(['country_id'=>$directModel[0]->country_id]);
                            $countIf = 1;
                            if(isset($consCountry->consultant_id)) {
                                $categorys = $paramsHotel[0]['category'];
                                if(isset($categorys) AND $categorys != '' ) {
                                    $consCategory = ConsultantCat::find()->select('cat_id')->where('consultant_id='.$consCountry->consultant_id)->all();
                                    $idConsCat = [];
                                    foreach ($consCategory as $ct)
                                       $idConsCat[] = $ct->cat_id;
                                    $countIf = count(array_diff($categorys,$idConsCat));
                                    if($countIf== 0) {
                                        $model->consultant_id = $consCountry->consultant_id;
                                        $model->save(false);
                                    }

                                }
                            }
                            if($countIf > 0){//записываем консультанта Анна
                                $model->consultant_id = Yii::$app->params['defaultConsultant'];
                                $model->save(false);
                            }
                        }

                        for ($i = 0; $i < $directCount; $i++) {
                            $directSave[$i] = $directModel[$i]->save();

                            if (is_array($categorys = $paramsHotel[$i]['category'])) {
                                foreach ($categorys as $cat) {
                                    $category              = new DirectCategory();
                                    $category->direct_id   = $directModel[$i]->id;
                                    $category->category_id = (int)$cat;
                                    $category->save();
                                }
                            }

                            $foods = Food::find()->where('short_name in ("'.implode('","', $paramsHotel[$i]['food']).'")')->all();
                            foreach ($foods as $food) {
                                $fd            = new DirectFood();
                                $fd->food_id   = $food->id;
                                $fd->direct_id = $directModel[$i]->id;
                                $fd->save();
                            }

                            if (is_array($kids = $paramsHotel[$i]['forkids'])) {
                                foreach ($kids as $kid) {
                                    $newKids            = new DirectKids();
                                    $newKids->kids_id   = (int)$kid;
                                    $newKids->direct_id = $directModel[$i]->id;
                                    $newKids->save();
                                }
                            }

                            if (is_array($others = $paramsHotel[$i]['other'])) {
                                foreach ($others as $other) {
                                    $newOther            = new DirectOther();
                                    $newOther->other_id  = (int)$other;
                                    $newOther->direct_id = $directModel[$i]->id;
                                    $newOther->save();
                                }
                            }

                            if ($paramsHotel[$i]['palacetype'][0] != 'any') {
                                foreach ($paramsHotel[$i]['palacetype'] as $palace) {
                                    $newPalace                 = new DirectPalaceValue();
                                    $newPalace->palacevalue_id = (int)$palace;
                                    $newPalace->direct_id      = $directModel[$i]->id;
                                    $newPalace->save();
                                }

                            }
                        }
                    } elseif ($model->type == 'type2') {
                        //перебираем данные конкретного отеля и записываем в бд
                        foreach ($posts['location_id'] as $key => $location_id) {
                            if (isset($location_id) AND $location_id != '') {
                                if($key == 0) {
                                    $model->consultant_id = Yii::$app->params['defaultConsultant']; //Записываем консультанта Анна

                                    $dictLocation = DictAllocation::find()
                                        ->where([DictAllocation::tableName().'.id'=>$location_id])
                                        ->joinWith(['cat0','resort0','resort0.country0'])
                                        ->one();

                                    $dictCat = $dictLocation->cat0->id;
                                    $dictCountry = $dictLocation->resort0->country0->id;
                                    $dictResort = $dictLocation->resort0->id;

                                    $consultant = Consultant::find()
                                        ->joinWith(['consultantcountries','consultantcats'])
                                        ->where(['=',ConsultantCountry::tableName().'.country_id',$dictCountry])
                                        ->andWhere(['=',ConsultantCat::tableName().'.cat_id',$dictCat])
                                        ->one();

                                    if(!isset($consultant)){
                                        $consultant = Consultant::find()
                                            ->joinWith(['consultantresorts'])
                                            ->where(['=',ConsultantResort::tableName().'.resort_id',$dictResort])
                                            ->one();
                                        if(isset($consultant))
                                            $model->consultant_id = $consultant->id;
                                    }
                                    else
                                        $model->consultant_id = $consultant->id;

                                    $model->save(false);
                                }

                                $lc              = new RequestLocation();
                                $lc->location_id = $location_id;
                                $lc->request_id  = $model->id;
                                $lc->save();
                            }
                        }

                        //данные питание из конкретного отеля
                        if ($food = $posts['food_short_name']) {
                            if ($food != 'ЛЮБОЕ') {
                                $foods_short_name = explode(' ', rtrim($posts['food_short_name']));
                                $foods            = Food::find()->where('short_name in ("'.implode('","', $foods_short_name).'")')->all();
                            } else {
                                $foods = Food::find()->where('name like "%'.$food.'%"')->all();
                            }

                            //сохранение питания
                            foreach ($foods as $food) {
                                $fd             = new RequestFood();
                                $fd->food_id    = $food->id;
                                $fd->request_id = $model->id;
                                $fd->save();
                            }
                        }
                    }

                    $mail             = new MailSchedule();
                    $mail->request_id = $model->id;
                    $mail->created_at = date('y-m-d H:i:s');
                    $mail->send       = 0;
                    $mail->save();
                }

                return json_encode(
                    [
                        'code'           => 1,
                        'status'         => 'send and save',
                        'modelRequestId' => $model->id,
                        'step'           => $step,
                    ]
                );
            } else {
                return json_encode(
                    [
                        'code'           => 0,
                        'status'         => 'no save',
                        'modelRequestId' => $model->id,
                        'step'           => $step,
                    ]
                );
            }
        }
    }

    public function actionGetallocation()
    {

    }

}
