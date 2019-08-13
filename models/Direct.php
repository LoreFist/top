<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "direct".
 *
 * @property int $id
 * @property int $country_id
 * @property int $city_id
 * @property int $city_departure_id
 *
 * @property RequestDirect $id0
 * @property RequestDirect[] $requestDirects
 * @property Request[] $requests
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
            [['country_id', 'city_id', 'city_departure_id'], 'integer'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => RequestDirect::className(), 'targetAttribute' => ['id' => 'direct_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_id' => 'Country ID',
            'city_id' => 'City ID',
            'city_departure_id' => 'City Departure ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(RequestDirect::className(), ['direct_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequestDirects()
    {
        return $this->hasMany(RequestDirect::className(), ['direct_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['id' => 'request_id'])->viaTable('request_direct', ['direct_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return directQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new directQuery(get_called_class());
    }
}
