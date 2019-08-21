<?php

namespace app\models\direct;

use app\models\Direct;
use app\models\Food;
use Yii;

/**
 * This is the model class for table "direct_food".
 *
 * @property int    $direct_id
 * @property int    $food_id
 *
 * @property Food   $food
 * @property Direct $direct
 */
class DirectFood extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'direct_food';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['direct_id', 'food_id'], 'required'],
            [['direct_id', 'food_id'], 'integer'],
            [['direct_id', 'food_id'], 'unique', 'targetAttribute' => ['direct_id', 'food_id']],
            [['food_id'], 'exist', 'skipOnError' => true, 'targetClass' => Food::className(), 'targetAttribute' => ['food_id' => 'id']],
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
            'food_id'   => 'Food ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFood()
    {
        return $this->hasOne(Food::className(), ['id' => 'food_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirect()
    {
        return $this->hasOne(Direct::className(), ['id' => 'direct_id']);
    }

}
