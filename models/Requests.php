<?php

namespace app\models;

/**
 * This is the model class for table "requests".
 *
 * @property int    $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $direct
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
            [['name', 'phone', 'email', 'direct', 'optional', 'date_departure',
              'day_stay', 'guest', 'price'], 'string'],
            [['created_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'             => 'ID',
            'name'           => 'Name',
            'phone'          => 'Phone',
            'email'          => 'Email',
            'direct'         => 'Direct',
            'optional'       => 'Optional',
            'created_at'     => 'Created At',
            'date_departure' => 'Date Departure',
            'day_stay'       => 'Day Stay',
            'guest'          => 'Guest',
            'price'          => 'Price',

        ];
    }

}
