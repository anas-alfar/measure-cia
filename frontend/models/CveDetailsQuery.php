<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[CveDetails]].
 *
 * @see CveDetails
 */
class CveDetailsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return CveDetails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CveDetails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
