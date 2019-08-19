<?php

namespace app\controllers;

use app\models\Request;
use yii\helpers\VarDumper;
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

        $query   = Request::find()->joinWith(['currencyDecrypt','directs'])->with(['directs.dictcountry','directs.dictcity'])->orderBy(['id' => SORT_DESC]);
        $columns = [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'header'    => 'Id заявки',
                'attribute' => 'id',
            ],
            [
                'header'    => 'Дата и время добавления',
                'format'    => 'html',
                'attribute' => 'created_at',
                'format'    => ['date', 'php:Y-m-d H:i:s'],
            ],////“Страна”/”Курорт (город)”/”Отель”
            [
                'header'    => 'Направление <br>(Страна/Курорт(город)/Отель)',
                'format'    => 'html',
                'value'  => function ($model) {

                    $view = '';
                    foreach ($model->directs as $key => $direct){
                        $view .= '<b>'.($key+1).'.</b> ';
                        if($direct->country_id != '' AND isset($direct->dictcountry))
                            $view .= $direct->dictcountry->name;
                        else
                            $view .= '-';

                        if($direct->city_id != '' AND isset($direct->dictcity))
                            $view .= '/'.$direct->dictcity->name;
                        else
                            $view .= '/-';

                        if($view != '')
                            $view .= '<br>';
                    }
                    return $view;
                }
            ],
            [
                'header'    => 'Имя',
                'format'    => 'html',
                'attribute' => 'name',
            ],
            [
                'header'    => 'Телефон',
                'format'    => 'html',
                'attribute' => 'phone',
            ],
            [
                'header'    => 'Еmail',
                'format'    => 'html',
                'attribute' => 'email',
            ],
            [
                'header'    => 'Доп. пожелание',
                'format'    => 'html',
                'attribute' => 'optional',
            ],
            [
                'header' => 'Дата вылета/Кол-во ночей',
                'format' => 'html',
                'value'  => function ($model) {
                    $ts1 = strtotime($model->date_departure_from);
                    $ts2 = strtotime($model->date_departure_to);

                    $diff     = $ts2 - $ts1;
                    $date2    = date('j', $diff);
                    $viewDate = date('d.m.Y', $ts1).' ';

                    if ($diff != 0) {
                        $viewDate .= '+ '.$date2.' дн';
                    }

                    if ($model->day_stay_to == $model->day_stay_from) {
                        $viewNihts = $model->day_stay_from.' нч.';
                    } else {
                        $viewNihts = $model->day_stay_from.'-'.$model->day_stay_to.' нч.';
                    }

                    return $viewDate.'/ '.$viewNihts;
                },
            ],
            [
                'header' => 'Кол-во человек',
                'format' => 'html',
                'value'  => function ($model) {
                    $view = $model->guest.' взрослых';

                    if ($model->children != 0) {
                        $children = '';
                        for ($i = 1; $i <= $model->children; $i++) {
                            $children .= ${"model->age$i"} = $i;
                            if ($i != $model->children) {
                                $children .= ',';
                            }
                        }
                        if($model->children > 1)
                            $view .= ' + '.$model->children.' ребенокa ('.$children.' лет)';
                        else
                            $view .= ' + '.$model->children.' ребенок ('.$children.' лет)';
                    }

                    return $view;
                },
            ],
            [
                'header' => 'Бюджет',
                'format' => 'html',
                'value'  => function ($model) {
                    $view = '';
                    if ($model->priceComfort != '' AND $model->priceComfort != -2) {
                        $view .= $model->priceComfort;
                    }
                    if ($model->priceTo != '' AND $model->priceTo != -2) {
                        $view .= ' - '.$model->priceTo;
                    }
                    if ($model->currency_id != '' AND $view != '') {
                        $view .= ' '.$model->currencyDecrypt->short_name;
                    }

                    if ($view == '') {
                        $view = "(not set)";
                    }

                    return $view;
                },
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
