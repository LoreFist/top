<?php

namespace app\models;

use app\models\dict\DictCity;
use app\models\dict\DictCountry;
use app\models\dict\DictResort;
use app\models\direct\DirectCategory;
use app\models\direct\DirectFood;
use app\models\direct\DirectKids;
use app\models\direct\DirectOther;
use app\models\direct\DirectPlaceValue;
use Yii;

/**
 * This is the model class for table "direct".
 *
 * @property int                 $id
 * @property int                 $request_id
 * @property int                 $country_id
 * @property int                 $city_id
 * @property int                 $city_departure_id
 * @property int                 $hotel_rating_id
 * @property DictCountry         $dictCountry
 * @property DictResort          $dictresort
 * @property DirectCategory[]    $categorys
 * @property DirectFood[]        $foods
 * @property DirectplaceValue[]  $placevalues
 * @property Rating              $rating
 * @property DirectKids[]        $kids
 * @property DirectOther[]       $other
 * @property DictCity            $dictcitydeparture
 *
 * @property Request             $request
 */
class Direct extends \yii\db\ActiveRecord
{

    public function getDictcitydeparture()
    {
        return $this->hasOne(DictCity::className(), ['id' => 'city_departure_id']);
    }

    public function getKids()
    {
        return $this->hasMany(DirectKids::className(), ['direct_id' => 'id']);
    }

    public function getOthers()
    {
        return $this->hasMany(DirectOther::className(), ['direct_id' => 'id']);
    }

    public function getRating()
    {
        return $this->hasOne(Rating::className(), ['id' => 'hotel_rating_id']);
    }

    public function getDictcountry()
    {
        return $this->hasOne(DictCountry::className(), ['id' => 'country_id']);
    }

    public function getDictresort()
    {
        return $this->hasOne(DictResort::className(), ['id' => 'city_id']);
    }

    public function getCategorys()
    {
        return $this->hasMany(DirectCategory::className(), ['direct_id' => 'id']);
    }

    public function getFoods()
    {
        return $this->hasMany(DirectFood::className(), ['direct_id' => 'id']);
    }

    public function getplacevalues()
    {
        return $this->hasMany(DirectPlaceValue::className(), ['direct_id' => 'id']);
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
            'id'                => 'ID',
            'request_id'        => 'Request ID',
            'country_id'        => 'Country ID',
            'city_id'           => 'City ID',
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
