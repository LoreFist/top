<?php

namespace app\controllers;

use app\models\dict\DictCity;
use app\models\dict\DictCountry;
use app\models\Direct;
use app\models\Food;
use app\models\MailSchedule;
use app\models\Request;
use app\models\RequestFood;
use app\models\RequestLocation;
use Yii;
use yii\helpers\ArrayHelper;
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
            $key_spb => 'Санкт-Петербург'
            ] + $items_dict_deprt;

        $items_dict_deprt_spechotel = [
            -1 => 'Без перелета'
        ] + $items_dict_deprt;

        $food = Food::find()->orderBy(['id'=>SORT_ASC])->all();

        return $this->render(
            'help',
            ['model'      => $model,
             'items_dict' => ['country'    => $items_dict_country,
                              'city_deprt' => $items_dict_deprt,
                              'spec_hotel'  => $items_dict_deprt_spechotel,
                              'food'        => $food
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
            $model->created_at = strtotime($model->created_at);
            $model->city_tour_id = 0;
            if ($model->save()) {

                $email_to = 'test.th.welcome@gmail.com';
                try {
                    Yii::$app->mailer->compose(
                        '@app/mail/requests/request',
                        [
                            'model'    => $model,
                            'email_to' => $email_to,
                        ]
                    )
                        ->setFrom(Yii::$app->params['admin_email'])
                        ->setTo($email_to)
                        ->setSubject('Добавлена новая заявка')
                        ->send();

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
     * Сохранение модели расширеного подбора, создание реквеста, разбор направлений и сохранение, добавление емайл в очередь
     *
     * @return Json
     */
    public function actionSaveextend()
    {
        $model = new Request();

        if ($posts = Yii::$app->request->post()) {
            //приводим в более удобный массив, данные направления  из расширенной формы
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

            $directs = $posts['Request']['direct'];
            unset($posts['Request']['direct']);

            $model->load($posts);

            $model->created_at = strtotime($model->created_at);

            if($save = $model->save()) {
                $countryCount   = count($directs['country_id']);
                $departureCount = count($directs['departure_id']);
                $directCount    = max($countryCount, $departureCount);

                $directSave  = [];
                $directModel = [];

                //перебираем данные направлений и записываем в бд
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

                    $directModel[$i]->request_id = $model->id;
                }
var_dump( $directModel);die;
                for ($i = 0; $i < $directCount; $i++) {
                    $directSave[$i] = $directModel[$i]->save();
                }

                //перебираем данные конкретного отеля и записываем в бд
                foreach ($posts['location_id'] as $location_id) {
                    if(isset($location_id) AND $location_id != ''){
                        $lc = new RequestLocation();
                        $lc->location_id = $location_id;
                        $lc->request_id = $model->id;
                        $lc->save();
                    }

                }

                //данные питание из конкретного отеля
                $foods_short_name = explode(' ',rtrim($posts['food_short_name']));
                $foods = Food::find()->where('short_name in ("'.implode('","',$foods_short_name).'")')->all();

                //сохранение питания
                foreach ($foods as $food) {
                    $fd = new RequestFood();
                    $fd->food_id = $food->id;
                    $fd->request_id = $model->id;
                    $fd->save();
                }

                $mail = new MailSchedule();
                $mail->request_id = $model->id;
                $mail->created_at = date('y-m-d H:i:s');
                $mail->send = 0;
                $mail->save();

                return json_encode(
                    [
                        'code'   => 1,
                        'status' => 'send and save',
                    ]
                );
            }
            else {
                return json_encode(
                    [
                        'code'   => 0,
                        'status' => 'no save',
                    ]
                );
            }
        }
    }

    public function actionGetallocation()
    {

    }
}
