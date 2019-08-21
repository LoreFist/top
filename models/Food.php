<?php

namespace app\models;

/**
 * This is the model class for table "food".
 *
 * @property int           $id
 * @property string        $name
 * @property string        $short_name
 *
 * @property RequestFood[] $requestFoods
 * @property Request[]     $requests
 */
class Food extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'food';
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequestFoods()
    {
        return $this->hasMany(RequestFood::className(), ['food_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['id' => 'request_id'])->viaTable('request_food', ['food_id' => 'id']);
    }

}
