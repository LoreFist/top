<?php

namespace app\models;

/**
 * This is the model class for table "rating".
 *
 * @property int             $id
 * @property string          $name
 * @property string          $active
 * @property int             $weight
 *
 * @property RequestRating[] $requestRatings
 * @property Request[]       $requests
 */
class Rating extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'active'], 'required'],
            [['name', 'active'], 'string'],
            [['weight'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'     => 'ID',
            'name'   => 'Name',
            'active' => 'Active',
            'weight' => 'Weight',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequestRatings()
    {
        return $this->hasMany(RequestRating::className(), ['rating_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['id' => 'request_id'])->viaTable('request_rating', ['rating_id' => 'id']);
    }

}
