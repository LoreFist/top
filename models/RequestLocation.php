<?php

namespace app\models;

use app\models\dict\DictAllocation;

/**
 * This is the model class for table "request_location".
 *
 * @property int            $id
 * @property int            $location_id
 * @property int            $request_id
 * @property DictAllocation $location
 *
 * @property Request        $request
 */
class RequestLocation extends \yii\db\ActiveRecord
{

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(DictAllocation::className(), ['id' => 'location_id']);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request_location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['location_id', 'request_id'], 'integer'],
            [['request_id'], 'exist', 'skipOnError' => true, 'targetClass' => Request::className(), 'targetAttribute' => ['request_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'location_id' => 'Location ID',
            'request_id'  => 'Request ID',
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