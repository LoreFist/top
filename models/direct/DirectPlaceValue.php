<?php

namespace app\models\direct;

use app\models\dict\DictAllocPlaceValue;
use app\models\Direct;
use Yii;

/**
 * This is the model class for table "direct_place_type".
 *
 * @property int                 $direct_id
 * @property int                 $placevalue_id
 * @property DictAllocPlaceValue $dictplaceValue
 *
 * @property Direct              $direct
 */
class DirectplaceValue extends \yii\db\ActiveRecord
{

    public function getDictplacevalue()
    {
        return $this->hasOne(DictAllocPlaceValue::className(), ['id' => 'placevalue_id']);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'direct_place_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['direct_id', 'placevalue_id'], 'required'],
            [['direct_id', 'placevalue_id'], 'integer'],
            [['direct_id', 'placevalue_id'], 'unique', 'targetAttribute' => ['direct_id', 'placevalue_id']],
            [['direct_id'], 'exist', 'skipOnError' => true, 'targetClass' => Direct::className(), 'targetAttribute' => ['direct_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'direct_id'      => 'Direct ID',
            'placevalue_id' => 'placetype ID',
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
