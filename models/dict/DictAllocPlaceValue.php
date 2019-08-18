<?php

namespace app\models\dict;

use Yii;

/**
 * This is the model class for table "dict_alloc_place_value".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $place
 * @property bool $active
 * @property string $date_create
 * @property bool $trash
 * @property int $updated
 * @property int $th_updated признак обновления записи, используется для построения таблицы кэша отелей на ТХ
 * @property string $name_eng
 * @property string $description_eng
 */
class DictAllocPlaceValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dict_alloc_place_value';
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
            [['id', 'name', 'place', 'date_create', 'updated', 'th_updated'], 'required'],
            [['id', 'place', 'updated', 'th_updated'], 'default', 'value' => null],
            [['id', 'place', 'updated', 'th_updated'], 'integer'],
            [['active', 'trash'], 'boolean'],
            [['date_create'], 'safe'],
            [['name', 'name_eng'], 'string', 'max' => 70],
            [['description', 'description_eng'], 'string', 'max' => 100],
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
            'description' => 'Description',
            'place' => 'Place',
            'active' => 'Active',
            'date_create' => 'Date Create',
            'trash' => 'Trash',
            'updated' => 'Updated',
            'th_updated' => 'признак обновления записи, используется для построения таблицы кэша отелей на ТХ',
            'name_eng' => 'Name Eng',
            'description_eng' => 'Description Eng',
        ];
    }
}
