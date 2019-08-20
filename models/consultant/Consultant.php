<?php

namespace app\models\consultant;

use app\models\dict\DictAlloccat;
use Yii;

/**
 * This is the model class for table "consultant".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 *
 * @property ConsultantCat[] $consultantcats
 * @property ConsultantCountry[] $consultantCountries
 * @property ConsultantResort[] $consultantResorts
 * @property Cats[] $cats
 */
class Consultant extends \yii\db\ActiveRecord
{
    public function getCats()
    {
        return $this->hasMany(DictAlloccat::className(), ['id' => 'id'])->viaTable(ConsultantCat::tableName(), ['cat_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consultant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['name', 'email'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultantcats()
    {
        return $this->hasMany(ConsultantCat::className(), ['consultant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultantcountries()
    {
        return $this->hasMany(ConsultantCountry::className(), ['consultant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultantresorts()
    {
        return $this->hasMany(ConsultantResort::className(), ['consultant_id' => 'id']);
    }
}
