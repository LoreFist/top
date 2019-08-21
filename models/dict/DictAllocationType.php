<?php

namespace app\models\dict;

use Yii;

/**
 * This is the model class for table "dict_allocation_type".
 *
 * @property int    $id
 * @property string $name
 * @property string $name_eng
 * @property bool   $active
 * @property bool   $trash
 * @property string $date_create
 * @property int    $updated
 * @property int    $th_updated признак обновления записи, используется для построения таблицы кэша отелей на ТХ
 */
class DictAllocationType extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dict_allocation_type';
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
            [['id', 'active', 'trash', 'date_create', 'updated', 'th_updated'], 'required'],
            [['id', 'updated', 'th_updated'], 'default', 'value' => null],
            [['id', 'updated', 'th_updated'], 'integer'],
            [['active', 'trash'], 'boolean'],
            [['date_create'], 'safe'],
            [['name', 'name_eng'], 'string', 'max' => 100],
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
            'name'        => 'Name',
            'name_eng'    => 'Name Eng',
            'active'      => 'Active',
            'trash'       => 'Trash',
            'date_create' => 'Date Create',
            'updated'     => 'Updated',
            'th_updated'  => 'признак обновления записи, используется для построения таблицы кэша отелей на ТХ',
        ];
    }

}
