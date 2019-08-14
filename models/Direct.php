<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "direct".
 *
 * @property int $id
 * @property int $request_id
 * @property int $country_id
 * @property int $city_id
 * @property int $city_departure_id
 *
 * @property Request $request
 * @property Request $request0
 */
class Direct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'direct';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'request_id'], 'required'],
            [['id', 'request_id', 'country_id', 'city_id', 'city_departure_id'], 'integer'],
            [['id', 'request_id'], 'unique', 'targetAttribute' => ['id', 'request_id']],
            [['request_id'], 'exist', 'skipOnError' => true, 'targetClass' => Request::className(), 'targetAttribute' => ['request_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'request_id' => 'Request ID',
            'country_id' => 'Country ID',
            'city_id' => 'City ID',
            'city_departure_id' => 'City Departure ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequest()
    {
        return $this->hasOne(Request::className(), ['id' => 'request_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequest0()
    {
        return $this->hasOne(Request::className(), ['id' => 'request_id']);
    }

    /**
     * {@inheritdoc}
     * @return DirectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DirectQuery(get_called_class());
    }
}
