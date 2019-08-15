<?php

namespace app\models\dict;

use Yii;

/**
 * This is the model class for table "dict_alloccat".
 *
 * @property int $id
 * @property string $name
 * @property string $nick
 * @property string $name_eng
 * @property string $description
 * @property string $weight
 * @property bool $active
 * @property bool $trash
 * @property string $date_create
 * @property int $updated
 * @property int $th_updated признак обновления записи, используется для построения таблицы кэша отелей на ТХ
 */
class DictAlloccat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dict_alloccat';
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
            [['weight'], 'number'],
            [['active', 'trash'], 'boolean'],
            [['date_create'], 'safe'],
            [['name', 'nick', 'name_eng'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
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
            'nick' => 'Nick',
            'name_eng' => 'Name Eng',
            'description' => 'Description',
            'weight' => 'Weight',
            'active' => 'Active',
            'trash' => 'Trash',
            'date_create' => 'Date Create',
            'updated' => 'Updated',
            'th_updated' => 'признак обновления записи, используется для построения таблицы кэша отелей на ТХ',
        ];
    }
}
