<?php

namespace app\models\direct;

use app\models\dict\DictAlloccat;
use app\models\Direct;

/**
 * This is the model class for table "direct_category".
 *
 * @property int          $direct_id
 * @property int          $category_id
 * @property DictAlloccat $dictCat
 *
 * @property Direct       $direct
 */
class DirectCategory extends \yii\db\ActiveRecord
{

    public function getDictcat()
    {
        return $this->hasOne(DictAlloccat::className(), ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'direct_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['direct_id', 'category_id'], 'required'],
            [['direct_id', 'category_id'], 'integer'],
            [['direct_id', 'category_id'], 'unique', 'targetAttribute' => ['direct_id', 'category_id']],
            [['direct_id'], 'exist', 'skipOnError' => true, 'targetClass' => Direct::className(), 'targetAttribute' => ['direct_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'direct_id'   => 'Direct ID',
            'category_id' => 'Category ID',
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
