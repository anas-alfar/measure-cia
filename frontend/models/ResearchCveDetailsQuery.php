<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[ResearchCveDetails]].
 *
 * @see ResearchCveDetails
 */
class ResearchCveDetailsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ResearchCveDetails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ResearchCveDetails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
