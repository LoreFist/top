<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request_direct".
 *
 * @property int $request_id
 * @property int $direct_id
 *
 * @property Direct $direct
 * @property Request $request
 * @property Direct $direct0
 * @property Request $request0
 */
class RequestDirect extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request_direct';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['request_id', 'direct_id'], 'required'],
            [['request_id', 'direct_id'], 'integer'],
            [['request_id', 'direct_id'], 'unique', 'targetAttribute' => ['request_id', 'direct_id']],
            [['direct_id'], 'exist', 'skipOnError' => true, 'targetClass' => Direct::className(), 'targetAttribute' => ['direct_id' => 'id']],
            [['request_id'], 'exist', 'skipOnError' => true, 'targetClass' => Request::className(), 'targetAttribute' => ['request_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'request_id' => 'Request ID',
            'direct_id' => 'Direct ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirect()
    {
        return $this->hasOne(Direct::className(), ['id' => 'direct_id']);
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
    public function getDirect0()
    {
        return $this->hasOne(Direct::className(), ['id' => 'direct_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequest0()
    {
        return $this->hasOne(Request::className(), ['id' => 'request_id']);
    }
}
