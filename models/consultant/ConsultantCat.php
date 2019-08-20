<?php

namespace app\models\consultant;

use app\models\dict\DictAlloccat;
use Yii;

/**
 * This is the model class for table "consultant_cat".
 *
 * @property int $id
 * @property int $consultant_id
 * @property int $cat_id
 * @property DictAlloccat $dictCat
 *
 * @property Consultant $consultant
 */
class ConsultantCat extends \yii\db\ActiveRecord
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDictcat()
    {
        return $this->hasOne(DictAlloccat::className(), ['id' => 'cat_id']);
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consultant_cat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['consultant_id', 'cat_id'], 'required'],
            [['consultant_id', 'cat_id'], 'integer'],
            [['consultant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Consultant::className(), 'targetAttribute' => ['consultant_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'consultant_id' => 'Consultant ID',
            'cat_id' => 'Cat ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultant()
    {
        return $this->hasOne(Consultant::className(), ['id' => 'consultant_id']);
    }
}
