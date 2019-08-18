<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "other".
 *
 * @property int $id
 * @property string $name
 * @property string $active
 * @property int $weight
 *
 * @property DirectOther[] $directOthers
 * @property Direct[] $directs
 */
class Other extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'other';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'active'], 'required'],
            [['name', 'active'], 'string'],
            [['weight'], 'integer'],
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
            'weight' => 'Weight',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirectOthers()
    {
        return $this->hasMany(DirectOther::className(), ['other_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirects()
    {
        return $this->hasMany(Direct::className(), ['id' => 'direct_id'])->viaTable('direct_other', ['other_id' => 'id']);
    }
}
