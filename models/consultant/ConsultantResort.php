<?php

namespace app\models\consultant;

use app\models\dict\DictResort;

/**
 * This is the model class for table "consultant_resort".
 *
 * @property int        $id
 * @property int        $consultant_id
 * @property int        $resort_id
 * @property DictResort $dictresort
 *
 * @property Consultant $consultant
 */
class ConsultantResort extends \yii\db\ActiveRecord
{

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDictresort()
    {
        return $this->hasOne(DictResort::className(), ['id' => 'resort_id']);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consultant_resort';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['consultant_id', 'resort_id'], 'required'],
            [['consultant_id', 'resort_id'], 'integer'],
            [['consultant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Consultant::className(), 'targetAttribute' => ['consultant_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'            => 'ID',
            'consultant_id' => 'Consultant ID',
            'resort_id'     => 'Resort ID',
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
