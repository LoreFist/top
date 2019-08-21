<?php

namespace app\models\direct;

use app\models\Direct;
use app\models\ForKids;
use Yii;

/**
 * This is the model class for table "direct_kids".
 *
 * @property int     $direct_id
 * @property int     $kids_id
 *
 * @property ForKids $kids
 * @property Direct  $direct
 */
class DirectKids extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'direct_kids';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['direct_id', 'kids_id'], 'required'],
            [['direct_id', 'kids_id'], 'integer'],
            [['direct_id', 'kids_id'], 'unique', 'targetAttribute' => ['direct_id', 'kids_id']],
            [['kids_id'], 'exist', 'skipOnError' => true, 'targetClass' => ForKids::className(), 'targetAttribute' => ['kids_id' => 'id']],
            [['direct_id'], 'exist', 'skipOnError' => true, 'targetClass' => Direct::className(), 'targetAttribute' => ['direct_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'direct_id' => 'Direct ID',
            'kids_id'   => 'Kids ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKids()
    {
        return $this->hasOne(ForKids::className(), ['id' => 'kids_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirect()
    {
        return $this->hasOne(Direct::className(), ['id' => 'direct_id']);
    }

}
