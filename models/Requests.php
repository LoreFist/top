<?php

namespace app\models;

/**
 * This is the model class for table "requests".
 *
 * @property int    $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property int    $direct_country
 * @property int    $direct_department
 * @property int    $direct_city
 * @property string $optional
 * @property int    $created_at
 * @property string $date_departure
 * @property string $day_stay
 * @property string $guest
 * @property string $price
 */
class Requests extends \yii\db\ActiveRecord
{

    public $children;
    public $age1;
    public $age2;
    public $age3;

    public $priceFrom;
    public $priceTo;
    public $priceComfort;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['name', 'phone', 'email', 'optional','date_departure', 'day_stay', 'guest', 'price'], 'string'],
            [['created_at','direct_country','direct_department','direct_city'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'                => 'ID',
            'name'              => 'Name',
            'phone'             => 'Phone',
            'email'             => 'Email',
            'direct_country'    => 'Direct country',
            'direct_department' => 'Direct Department',
            'optional'          => 'Optional',
            'created_at'        => 'Created At',
            'date_departure'    => 'Date Departure',
            'day_stay'          => 'Day Stay',
            'guest'             => 'Guest',
            'price'             => 'Price',

        ];
    }

}
