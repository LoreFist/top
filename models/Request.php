<?php

namespace app\models;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property int $city_tour_id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $direct
 * @property string $optional
 * @property string $date_departure_from
 * @property string $date_departure_to
 * @property string $day_stay_from
 * @property string $day_stay_to
 * @property int $guest
 * @property int $currency
 * @property int $priceTo
 * @property int $priceComfort
 * @property int $children
 * @property int $age1
 * @property int $age2
 * @property int $age3
 * @property int $created_at
 *
 * @property Direct[] $directs
 * @property Direct $id0
 * @property MailSchedule[] $mailSchedules
 * @property RequestFood[] $requestFoods
 * @property Food[] $foods
 */
class Request extends \yii\db\ActiveRecord
{

    public $date_departure; //для контрола календаря
    public $day_stay; //для контрола пребывание дней
    public $priceFrom; //не используется, но в либе lib-ui-tour-filter виджет WPrice жестко захардкоженно

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'city_tour_id'], 'required'],
            [['name', 'phone', 'email', 'direct', 'optional', 'date_departure_from', 'date_departure_to', 'day_stay_from', 'day_stay_to'], 'string'],
            [['guest', 'currency', 'priceTo', 'priceComfort', 'children', 'age1', 'age2', 'age3', 'created_at'], 'integer'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Direct::className(), 'targetAttribute' => ['id' => 'request_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_tour_id' => 'City Tour Id',
            'name' => 'Ваше имя',
            'phone' => 'Телефон',
            'email' => 'Email (не обязательно)',
            'direct' => 'Direct',
            'optional' => 'Optional',
            'date_departure_from' => 'Date Departure From',
            'date_departure_to' => 'Date Departure To',
            'day_stay_from' => 'Day Stay From',
            'day_stay_to' => 'Day Stay To',
            'guest' => 'Guest',
            'currency' => 'Currency',
            'priceTo' => 'Price To',
            'priceComfort' => 'Price Comfort',
            'children' => 'Children',
            'age1' => 'Age1',
            'age2' => 'Age2',
            'age3' => 'Age3',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirects()
    {
        return $this->hasMany(Direct::className(), ['request_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Direct::className(), ['request_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailSchedules()
    {
        return $this->hasMany(MailSchedule::className(), ['request_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequestFoods()
    {
        return $this->hasMany(RequestFood::className(), ['request_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFoods()
    {
        return $this->hasMany(Food::className(), ['id' => 'food_id'])->viaTable('request_food', ['request_id' => 'id']);
    }
}
