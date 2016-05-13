<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[ResearchFileCodeMetrics]].
 *
 * @see ResearchFileCodeMetrics
 */
class ResearchFileCodeMetricsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ResearchFileCodeMetrics[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ResearchFileCodeMetrics|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
