<?php

namespace app\controllers;

use app\models\DictCity;
use app\models\DictCountry;
use app\models\Direct;
use app\models\MailSchedule;
use app\models\Request;
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
            $model->created_at = strtotime($model->created_at);
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
        $items_dict_deprt = [$key_msc => 'Москва',
                             $key_spb => 'Санкт-Петербург'] + $items_dict_deprt;

        return $this->render(
            'help',
            ['model'      => $model,
             'items_dict' => ['country'    => $items_dict_country,
                              'city_deprt' => $items_dict_deprt]]
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
     * Сохранение модели расширеного подбора, создание реквеста, разбор
     * направлений и сохранение, добавление емайл в очередь
     *
     * @return Json
     */
    public function actionSaveextend()
    {
        $posts      = Yii::$app->request->post();

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

            $date_from_to     = explode(
                "_", $posts['Request']['date_departure']
            );
            $day_stay_from_to = explode("_", $posts['Request']['day_stay']);

            $posts['Request']['date_departure_from'] = $date_from_to[0];
            $posts['Request']['date_departure_to']   = $date_from_to[1];

            $posts['Request']['day_stay_from'] = $day_stay_from_to[0];
            $posts['Request']['day_stay_to']   = $day_stay_from_to[1];

            $directs = $posts['Request']['direct'];
            unset($posts['Request']['direct']);

            $model->load($posts);
            $model->created_at = strtotime($posts['Request']['created_at']);
            $model->city_tour_id = (int)$model->city_tour_id;

            if ($save = $model->save(false)) {
                if($step == 1) {
                    $countryCount   = count($directs['country_id']);
                    $departureCount = count($directs['departure_id']);
                    $directCount    = max($countryCount, $departureCount);

                    $directSave  = [];
                    $directModel = [];

                    for ($i = 0; $i < $directCount; $i++) {
                        $directModel[$i] = new Direct();

                        if (isset($directs['country_id'][$i])) {
                            $directModel[$i]->country_id
                                = $directs['country_id'][$i];
                        }

                        if (isset($directs['city_id'][$i])) {
                            $directModel[$i]->city_id = $directs['city_id'][$i];
                        }

                        if (isset($directs['departure_id'][$i])) {
                            $directModel[$i]->city_departure_id
                                = $directs['departure_id'][$i];
                        }

                        $directModel[$i]->request_id = $model->id;
                    }

                    for ($i = 0; $i < $directCount; $i++) {
                        $directSave[$i] = $directModel[$i]->save();
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

    /**
     * Получение справочника городов
     *
     * @return mixed
     */
    public function actionGetcity()
    {
        if ($id = Yii::$app->request->post('id')) {
            $dict_city = DictCity::getDictCity($id);
            $items     = '';

            foreach ($dict_city as $item) {
                $items .= "<option value='".$item->id."'>".$item->name
                    ."</option>";
            }

            return $this->renderPartial(
                'partial/extend_city_select_option', [
                    'items' => $items,
                ]
            );
        }
    }

}
