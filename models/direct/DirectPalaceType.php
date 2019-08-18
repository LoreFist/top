<?php

namespace app\models\direct;

use Yii;

/**
 * This is the model class for table "direct_palace_type".
 *
 * @property int $direct_id
 * @property int $palacetype_id
 *
 * @property Direct $direct
 */
class DirectPalaceType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'direct_palace_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['direct_id', 'palacetype_id'], 'required'],
            [['direct_id', 'palacetype_id'], 'integer'],
            [['direct_id', 'palacetype_id'], 'unique', 'targetAttribute' => ['direct_id', 'palacetype_id']],
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
            'palacetype_id' => 'Palacetype ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirect()
    {
        return $this->hasOne(Direct::className(), ['id' => 'direct_id']);
    }
}
