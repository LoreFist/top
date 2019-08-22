<?php

namespace app\models\dict;

use Yii;

/**
 * This is the model class for table "dict_resort".
 *
 * @property int              $id
 * @property int              $country
 * @property string           $name
 * @property string           $name_eng
 * @property bool             $active
 * @property bool             $trash
 * @property string           $date_create
 * @property int              $capital
 * @property int              $updated
 * @property int              $th_updated признак обновления записи, используется для построения таблицы кэша отелей на ТХ
 * @property DictAllocation[] $dictAllocations
 * @property DictCountry      $dictcountry
 */
class DictResort extends \yii\db\ActiveRecord
{

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDictAllocations()
    {
        return $this->hasMany(DictAllocation::className(), ['resort' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDictcountry()
    {
        return $this->hasOne(DictCountry::className(), ['id' => 'country']);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dict_resort';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dict');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'country', 'name', 'updated', 'th_updated'], 'required'],
            [['id', 'country', 'capital', 'updated', 'th_updated'], 'default', 'value' => null],
            [['id', 'country', 'capital', 'updated', 'th_updated'], 'integer'],
            [['active', 'trash'], 'boolean'],
            [['date_create'], 'safe'],
            [['name', 'name_eng'], 'string', 'max' => 50],
            [['updated'], 'unique'],
            [['th_updated'], 'unique'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'country'     => 'Country',
            'name'        => 'Name',
            'name_eng'    => 'Name Eng',
            'active'      => 'Active',
            'trash'       => 'Trash',
            'date_create' => 'Date Create',
            'capital'     => 'Capital',
            'updated'     => 'Updated',
            'th_updated'  => 'признак обновления записи, используется для построения таблицы кэша отелей на ТХ',
        ];
    }

}
