<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[ResearchCveFile]].
 *
 * @see ResearchCveFile
 */
class ResearchCveFileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ResearchCveFile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ResearchCveFile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
