<?php

namespace app\models\direct;

use app\models\dict\DictAllocPlaceValue;
use app\models\Direct;
use Yii;

/**
 * This is the model class for table "direct_palace_type".
 *
 * @property int $direct_id
 * @property int $palacevalue_id
 * @property DictAllocPlaceValue $dictPalaceValue
 *
 * @property Direct $direct
 */
class DirectPalaceValue extends \yii\db\ActiveRecord
{
    public function getDictpalacevalue()
    {
        return $this->hasOne(DictAllocPlaceValue::className(), ['id' => 'palacevalue_id']);
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'direct_palace_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['direct_id', 'palacevalue_id'], 'required'],
            [['direct_id', 'palacevalue_id'], 'integer'],
            [['direct_id', 'palacevalue_id'], 'unique', 'targetAttribute' => ['direct_id', 'palacevalue_id']],
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
            'palacevalue_id' => 'Palacetype ID',
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
