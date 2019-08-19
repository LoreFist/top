<?php

namespace app\models;

use app\models\dict\DictCity;
use app\models\dict\DictCountry;
use Yii;

/**
 * This is the model class for table "direct".
 *
 * @property int $id
 * @property int $request_id
 * @property int $country_id
 * @property int $city_id
 * @property int $city_departure_id
 * @property DictCountry $dictCountry
 * @property DictCity $dictCity
 *
 * @property Request $request
 */
class Direct extends \yii\db\ActiveRecord
{
    public function getDictcountry()
    {
        return $this->hasOne(DictCountry::className(), ['id' => 'country_id']);
    }

    public function getDictcity()
    {
        return $this->hasOne(DictCity::className(), ['id' => 'city_id']);
    }
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
            [['request_id'], 'required'],
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
}
