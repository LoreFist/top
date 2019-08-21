<?php

namespace app\controllers;

use app\models\dict\DictAllocation;
use app\models\dict\DictAllocationType;
use app\models\dict\DictAlloccat;
use app\models\dict\DictCity;
use app\models\dict\DictCountry;
use app\models\dict\DictResort;
use Yii;

/**
 * Для работы со справочниками
 *
 * @package app\controllers
 */
class DictController extends \yii\web\Controller
{

    /**
     * получение локации из справочника
     */
    public function actionGetallocation()
    {
        if ($namesearch = Yii::$app->request->get('namesearch')) {
            $namesearch = "'%".$namesearch."%'";

            $location = DictAllocation::find()
                ->select(
                    [
                        DictAllocation::tableName().'.name', DictAllocation::tableName().'.id',
                        DictAllocation::tableName().'.cat', DictAllocation::tableName().'.allocation_type',
                        DictAllocation::tableName().'.resort',
                    ]
                )
                ->joinWith(
                    [
                        'type'             => function ($q) {
                            $q->select(DictAllocationType::tableName().'.name');
                        },
                        'resort0'          => function ($q) {
                            $q->select([DictResort::tableName().'.id', DictResort::tableName().'.name', DictResort::tableName().'.country']);
                        },
                        'resort0.country0' => function ($q) {
                            $q->select([DictCountry::tableName().'.id', DictCountry::tableName().'.name']);
                        },
                        'cat0'             => function ($q) {
                            $q->select([DictAlloccat::tableName().'.id', DictAlloccat::tableName().'.name']);
                        },
                    ]
                )
                ->where(DictAllocation::tableName().'.name like '.$namesearch)
                ->all();

            return $this->renderPartial('hotelsearch', ['location' => $location]);
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
                '@app/views/request/partial/extend_city_select_option', [
                    'items' => $items,
                ]
            );
        }
    }

}
