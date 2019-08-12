<?php

namespace app\models;

use Yii;

class DictCountry extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'dict_country';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dict');
    }
}
