<?php

namespace app\models\direct;

use Yii;

/**
 * This is the model class for table "direct_rating".
 *
 * @property int $direct_id
 * @property int $rating_id
 *
 * @property Rating $rating
 * @property Direct $direct
 */
class DirectRating extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'direct_rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['direct_id', 'rating_id'], 'required'],
            [['direct_id', 'rating_id'], 'integer'],
            [['direct_id', 'rating_id'], 'unique', 'targetAttribute' => ['direct_id', 'rating_id']],
            [['rating_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::className(), 'targetAttribute' => ['rating_id' => 'id']],
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
            'rating_id' => 'Rating ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRating()
    {
        return $this->hasOne(Rating::className(), ['id' => 'rating_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirect()
    {
        return $this->hasOne(Direct::className(), ['id' => 'direct_id']);
    }
}
