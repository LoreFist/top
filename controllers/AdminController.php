<?php

namespace app\controllers;

use app\models\consultant\Consultant;
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

        $query   = Request::find()
            ->joinWith([
                'currencyDecrypt','directs','directs.categorys',
                'directs.foods.food','directs.palacevalues','directs.rating',
                'directs.kids.kids','directs.others.other','locations','requestFoods as rf', 'requestFoods.food as rf_f',
                'consultant'
                ])
            ->with([
                'directs.dictcountry','directs.dictcity','directs.dictcitydeparture',
                'directs.palacevalues.dictpalacevalue','directs.palacevalues.dictpalacevalue.type',
                'city','locations.location','locations.location.resort0','locations.location.cat0',
                'locations.location.resort0.country0','citydeparture'
            ])
            ->orderBy(['Request.id' => SORT_DESC]);

        $columns = [
            [
                'header'    => 'Id заявки',
                'attribute' => 'id',
            ],
            [
                'header'    => 'Дата и время добавления',
                'format'    => 'html',
                'attribute' => 'created_at',
                'format'    => ['date', 'php:Y-m-d H:i:s'],
            ],
            [
                'header'    => 'Направление <br>(Страна | Курорт(город) | Отель | Город Вылета)',
                'format'    => 'html',
                'value'  => function ($model) {

                    $view = '';
                    if($model->type == 'type1' OR $model->type == ''){
                        foreach ($model->directs as $key => $direct) {
                            $view .= '<b>'.($key + 1).'.</b> ';

                            if ($direct->country_id != '' AND isset($direct->dictcountry))
                                $view .= $direct->dictcountry->name;
                            else
                                $view .= ' - ';

                            if ($direct->city_id != '' AND isset($direct->dictcity))
                                $view .= ' | '.$direct->dictcity->name;
                            else
                                $view .= ' | - ';


                            if ($direct->city_departure_id != '' AND isset($direct->dictcitydeparture))
                                $view .= ' | '.$direct->dictcitydeparture->name;
                            else
                                $view .= ' | - ';

                            if ($view != '')
                                $view .= '<br>';
                        }
                    }elseif ($model->type == 'type2'){
                        foreach($model->locations as $key => $locations){
                            $view .= '<b>'.($key + 1).'.</b> ';
                            if (isset($locations->location->resort0->country0))
                                $view .= $locations->location->resort0->country0->name;
                            else
                                $view .= ' - ';


                            if (isset($locations->location->resort0))
                                $view .= ' | '.$locations->location->resort0->name;
                            else
                                $view .= ' | - ';

                            if (isset($locations->location))
                                $view .= ' | '.$locations->location->name.' '.$locations->location->cat0->name;
                            else
                                $view .= ' | - ';

                            if (isset($model->citydeparture))
                                $view .= ' | '.$model->citydeparture->name;
                            else
                                $view .= ' | - ';

                            if ($view != '')
                                $view .= '<br>';
                        }
                    }

                    return $view;
                }
            ],
            [
                'header'    => 'Имя Телефон Еmail',
                'format'    => 'html',
                'value'=>function ($model){
                    return $model->name.'<br/>'.$model->phone.'<br/>'.$model->email;
                }
            ],
            [
                'header'    => 'Доп. пожелание',
                'format'    => 'html',
                'value'  => function ($model) {
                    $view = '';
                    if($model->type == 'type1' OR $model->type == '') {
                        foreach ($model->directs as $key => $direct) {
                            $view .= '<b>'.($key + 1).'.</b> <br/>';
                            if (count($direct->categorys) != 0) {
                                $view .= '    <b>Катг:</b> ';
                                foreach ($direct->categorys as $category) {
                                    if (isset($category->dictcat)) {
                                        $view .= $category->dictcat->name.',';
                                    }
                                }
                                $view = substr($view, 0, -1);
                                $view .= '<br/>';
                            }
                            if (count($direct->foods) != 0) {
                                $view .= '    <b>Питн:</b> ';
                                foreach ($direct->foods as $foods) {
                                    $view .= $foods->food->short_name.',';

                                }
                                $view = substr($view, 0, -1);
                                $view .= '<br/>';
                            }
                            if (count($direct->palacevalues) != 0) {
                                $view .= '    <b>Расположение:</b> ';
                                foreach ($direct->palacevalues as $keyplace => $palacevalue) {
                                    if (isset($palacevalue->dictpalacevalue)) {
                                        if ($keyplace == 0) {
                                            $view .= $palacevalue->dictpalacevalue->type->name.' — '.$palacevalue->dictpalacevalue->name.',';
                                        } else {
                                            $view .= ' '.$palacevalue->dictpalacevalue->name.',';
                                        }
                                    }
                                }
                                $view = substr($view, 0, -1);
                                $view .= '<br/>';
                            }
                            if (isset($direct->rating)) {
                                $view .= '    <b>Рейтинг:</b> '.$direct->rating->name;
                                $view .= '<br/>';
                            }
                            if (count($direct->kids) != 0) {
                                $view .= '    <b>Для детей:</b> ';
                                foreach ($direct->kids as $kids) {
                                    $view .= ' '.$kids->kids->name.',';

                                }
                                $view = substr($view, 0, -1);
                                $view .= '<br/>';
                            }
                            if (count($direct->others) != 0) {
                                $view .= '    <b>Прочее:</b> ';
                                foreach ($direct->others as $others) {
                                    $view .= ' '.$others->other->name.',';
                                }
                                $view = substr($view, 0, -1);
                                $view .= '<br/>';
                            }
                        }
                        if ($model->optional != '') {
                            $view .= '<b>Комментарий:</b> '.$model->optional;
                        }

                        return $view;
                    }elseif ($model->type == 'type2'){
                        if (count($model->requestFoods) != 0) {
                            $view .= '    <b>Питн:</b> ';
                            foreach ($model->requestFoods as $requestFood) {
                                $view .= ' '.$requestFood->food->short_name.',';
                            }
                            $view = substr($view, 0, -1);
                            $view .= '<br/>';
                        }

                        if ($model->optional != '') {
                            $view .= '<b>Комментарий:</b> '.$model->optional;
                        }
                        return $view;
                    }
                }
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
                    return $view;
                },
            ],
            [
                'header' => 'Город туриста',
                'format' => 'html',
                'value'  => function ($model) {
                    if($model->city_tour_id != 0 AND isset($model->city_tour_id) AND isset($model->city))
                        return $model->city->name;
                },
            ],
            [
                'header'    => 'Консультант',
                'format'    => 'html',
                'value'  => function ($model) {
                    if(isset($model->consultant))
                        return $model->consultant->name;
                }
            ]
        ];

        $dataProvider = new ActiveDataProvider(
            [
                'query'      => $query->distinct(),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]
        );

        $this->layout = 'admin';
        return $this->render(
            'index',
            ['dataProvider' => $dataProvider, 'columns' => $columns]
        );
    }

    /**
     * Отображение консультантов и их условий
     *
     * @return string
     */
    public function actionConsultant()
    {
        $query   = Consultant::find()
            ->joinWith(['consultantcats','consultantcountries','consultantresorts'])
            ->with(['consultantcats.dictcat','consultantcountries.dictcountry','consultantresorts.dictresort'])
        ;

        $columns = [
            [
                'header'    => 'Id консультанта',
                'attribute' => 'id',
            ],
            [
                'header'    => 'Имя консультанта',
                'attribute' => 'name',
            ],
            [
                'header'    => 'Email консультанта',
                'attribute' => 'email',
            ],
            [
                'header'    => 'Категории отелей',
                'value'=> function($model){
                    $view = '';
                    foreach($model->consultantcats as $cats)
                            $view .= ' '.$cats->dictcat->name.',';
                    $view = substr($view, 0, -1);
                    return $view;
                }
            ],
            [
                'header'    => 'Страны',
                'value'=> function($model){
                    $view = '';
                    foreach($model->consultantcountries as $country)
                        $view .= ' '.$country->dictcountry->name.',';
                    $view = substr($view, 0, -1);
                    return $view;
                }
            ],
            [
                'header'    => 'Курорт',
                'value'=> function($model){
                    $view = '';
                    foreach($model->consultantresorts as $resorn)
                        $view .= ' '.$resorn->dictresort->name.',';
                    $view = substr($view, 0, -1);
                    return $view;
                }
            ],
        ];

        $dataProvider = new ActiveDataProvider(
            [
                'query'      => $query->distinct(),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]
        );

        $this->layout = 'admin';
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
