<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Direct]].
 *
 * @see Direct
 */
class DirectQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Direct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Direct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
