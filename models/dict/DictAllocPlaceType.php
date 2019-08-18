<?php

namespace app\models\dict;

use Yii;

/**
 * This is the model class for table "dict_alloc_place_type".
 *
 * @property int $id
 * @property string $name
 * @property bool $active
 * @property string $date_create
 * @property bool $trash
 * @property int $updated
 * @property int $th_updated признак обновления записи, используется для построения таблицы кэша отелей на ТХ
 * @property string $name_eng
 * @property Values[] $values
 */
class DictAllocPlaceType extends \yii\db\ActiveRecord
{
    public function getValues()
    {
        return $this->hasMany(DictAllocPlaceValue::className(), ['place' => 'id']);
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dict_alloc_place_type';
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
            [['id', 'name', 'date_create', 'updated', 'th_updated'], 'required'],
            [['id', 'updated', 'th_updated'], 'default', 'value' => null],
            [['id', 'updated', 'th_updated'], 'integer'],
            [['active', 'trash'], 'boolean'],
            [['date_create'], 'safe'],
            [['name', 'name_eng'], 'string', 'max' => 70],
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
            'id' => 'ID',
            'name' => 'Name',
            'active' => 'Active',
            'date_create' => 'Date Create',
            'trash' => 'Trash',
            'updated' => 'Updated',
            'th_updated' => 'признак обновления записи, используется для построения таблицы кэша отелей на ТХ',
            'name_eng' => 'Name Eng',
        ];
    }
}
