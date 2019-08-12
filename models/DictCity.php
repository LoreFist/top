<?php

namespace app\models;

use Yii;

class DictCity extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'dict_city';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dict');
    }
}
