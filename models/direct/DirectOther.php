<?php

namespace app\models\direct;

use Yii;

/**
 * This is the model class for table "direct_other".
 *
 * @property int $direct_id
 * @property int $other_id
 *
 * @property Other $other
 * @property Direct $direct
 */
class DirectOther extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'direct_other';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['direct_id', 'other_id'], 'required'],
            [['direct_id', 'other_id'], 'integer'],
            [['direct_id', 'other_id'], 'unique', 'targetAttribute' => ['direct_id', 'other_id']],
            [['other_id'], 'exist', 'skipOnError' => true, 'targetClass' => Other::className(), 'targetAttribute' => ['other_id' => 'id']],
            [['direct_id'], 'exist', 'skipOnError' => true, 'targetClass' => Direct::className(), 'targetAttribute' => ['direct_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'direct_id' => 'Direct ID',
            'other_id' => 'Other ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOther()
    {
        return $this->hasOne(Other::className(), ['id' => 'other_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirect()
    {
        return $this->hasOne(Direct::className(), ['id' => 'direct_id']);
    }
}
