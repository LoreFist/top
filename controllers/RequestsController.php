<?php

namespace app\controllers;

use app\models\CityCountry;
use app\models\DictCity;
use app\models\DictCountry;
use app\models\Requests;
use Yii;
use yii\helpers\ArrayHelper;

class RequestsController extends \yii\web\Controller
{

    private function _dict_get_city($id)
    {
        return DictCity::find()
            ->select('id, name')
            ->where(['active' => true])
            ->andWhere(['trash' => false])
            ->andWhere(['country' => $id])
            ->orderBy(['id' => SORT_ASC])
            ->all();
    }

    /**
     * Создание модели помощь в подборе
     * Подгрузка справочника стран и городов России
     *
     * @return рендер view help
     */
    public function actionHelp()
    {
        $model = new Requests();

        $dict_country = DictCountry::find()
            ->select('id, name')
            ->where(['active' => true])
            ->andWhere(['trash' => false])
            ->orderBy(['name' => SORT_ASC])
            ->all();

        $dict_city_deprt = $this->_dict_get_city(1);

        $items_dict_country = ArrayHelper::map($dict_country, 'id', 'name');
        $items_dict_deprt   = ArrayHelper::map($dict_city_deprt, 'id', 'name');

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
        $model = new Requests();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = strtotime($model->created_at);

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
                        ->setFrom('sdfghj1234567sdfg@gmail.com')
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
     * Получение справочника городов
     *
     * @return mixed
     */
    public function actionGetcity()
    {
        if ($id = Yii::$app->request->post('id')) {
            $dict_city = $this->_dict_get_city($id);
            $items = '';

            foreach ($dict_city as $item) {
                $items .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            }

            return $this->renderPartial('partial/extend_city_select_option', [
                'items'     => $items,
            ]);
        }
    }

}
