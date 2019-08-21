<?php

namespace app\models\consultant;

use app\models\dict\DictCountry;

/**
 * This is the model class for table "consultant_country".
 *
 * @property int         $id
 * @property int         $consultant_id
 * @property int         $country_id
 * @property DictCountry $dictcountry
 *
 * @property Consultant  $consultant
 */
class ConsultantCountry extends \yii\db\ActiveRecord
{

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDictcountry()
    {
        return $this->hasOne(DictCountry::className(), ['id' => 'country_id']);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consultant_country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['consultant_id', 'country_id'], 'required'],
            [['consultant_id', 'country_id'], 'integer'],
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
            'country_id'    => 'Country ID',
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
