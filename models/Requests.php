<?php

namespace app\models;

/**
 * This is the model class for table "requests".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $direct
 * @property string $optional
 * @property int $created_at
 */
class Requests extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['name', 'phone', 'email', 'direct', 'optional'], 'string'],
            [['created_at'], 'integer'],
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
            'phone' => 'Phone',
            'email' => 'Email',
            'direct' => 'Direct',
            'optional' => 'Optional',
            'created_at' => 'Created At',
        ];
    }
}
