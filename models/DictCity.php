<?php

namespace app\models;

use Yii;

class DictCity extends \yii\db\ActiveRecord
{

    private static $direct_city
        = [
            'Алматы', 'Астана', 'Белгород', 'Брянск', 'Владикавказ',
            'Волгоград', 'Воронеж', 'Гомель', 'Гродно', 'Екатеринбург',
            'Иркутск', 'Калининград', 'Киев', 'Краснодар', 'Красноярск',
            'Магадан', 'Махачкала', 'Минеральные воды', 'Москва', 'Мурманск',
            'Набережные Челны', 'Нижний Новгород', 'Новосибирск', 'Омск',
            'Оренбург', 'Пенза', 'Ростов-на-Дону', 'Саратов', 'Санкт-Петербург',
            'Симферополь', 'Смоленск', 'Сочи', 'Томск', 'Ульяновск', 'Харьков',
            'Челябинск', 'Шымкент', 'Якутск', 'Ярославль',
            'Москва', 'Санкт-Петербург'
        ];


    /**
     * получем ид, название города из справочника с указанными  городами в задаче
     * @return \app\models\DictCity[]|\app\models\DictCountry[]|array|\yii\db\ActiveRecord[]
     */
    public static function getDirectCity()
    {
        return DictCity::find()
            ->select('id, name')
            ->where(['active' => true])
            ->andWhere(['trash' => false])
            ->andWhere(['name' => self::$direct_city])
            ->orderBy(['name' => SORT_ASC])
            ->all();
    }

    /**
     * по ид получаем город
     *
     * @param $id
     *
     * @return \app\models\DictCity[]|\app\models\DictCountry[]|array|\yii\db\ActiveRecord[]
     */
    public static function getDictCity($id)
    {
        return DictCity::find()
            ->select('id, name')
            ->where(['active' => true])
            ->andWhere(['trash' => false])
            ->andWhere(['country' => $id])
            ->all();
    }

    public static function tableName()
    {
        return 'dict_city';
    }

    public static function getDb()
    {
        return Yii::$app->get('dict');
    }

}
