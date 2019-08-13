<?php

namespace app\controllers;

use app\models\Request;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;

class AdminController extends \yii\web\Controller
{

    /**
     * Отображение в виде бутсрап таблицы всех заявок
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $query   = Request::find()->orderBy(['id' => SORT_DESC]);
        $columns = [
            [
                'header'    => 'Id заявки',
                'attribute' => 'id',
            ],
            [
                'header'    => 'Дата и время добавления',
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d H:i:s']
            ],
            [
                'header'    => 'Направление',
                'attribute' => 'direct',
            ],
            [
                'header'    => 'Имя',
                'attribute' => 'name',
            ],
            [
                'header'    => 'Телефон',
                'attribute' => 'phone',
            ],
            [
                'header'    => 'Еmail',
                'attribute' => 'email',
            ],
            [
                'header'    => 'Доп. пожелание',
                'attribute' => 'optional',
            ],
        ];

        $dataProvider = new ActiveDataProvider(
            [
                'query'      => $query,
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]
        );

        return $this->render(
            'index',
            ['dataProvider' => $dataProvider, 'columns' => $columns]
        );
    }

    /**
     * Отоборажение конкретной заявки
     *
     * @param  string  $id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render(
            'view',
            [
                'model' => Request::findOne($id),
            ]
        );
    }

}
