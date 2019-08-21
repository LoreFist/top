<?php

namespace app\models;

/**
 * This is the model class for table "currency".
 *
 * @property int    $id
 * @property string $name
 * @property string $short_name
 */
class Currency extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'short_name'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'name'       => 'Name',
            'short_name' => 'Short Name',
        ];
    }

}
