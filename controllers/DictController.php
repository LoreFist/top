<?php
namespace app\controllers;

use app\models\dict\DictAllocation;
use app\models\dict\DictCity;
use Yii;
use yii\helpers\VarDumper;

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
        if($namesearch = Yii::$app->request->get('namesearch')){
            $namesearch = "'%".$namesearch."%'";

            $location = DictAllocation::find()->joinWith(['type','resort0','resort0.country0','cat0'])
                ->where('"dict_allocation".name like '.$namesearch)
                ->all();

            /*$locationArr = [];
            foreach ($location as $lc){
                $locationArr[] = [

                    'country_id'=>$lc->resort0->country0->id,
                    'country_name'=>$lc->resort0->country0->name,
                    'country_name_eng'=>$lc->resort0->country0->name_eng,
                    'id'=>$lc->id,
                    'name'=>$lc->name,
                    'resort_name'=>$lc->resort0->name,
                    'stars'=>$lc->cat0->name

                ];
            }*/

            return $this->renderPartial( 'hotelsearch',['location' => $location]);
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
