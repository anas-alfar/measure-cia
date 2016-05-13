<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[CveFile]].
 *
 * @see CveFile
 */
class CveFileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return CveFile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CveFile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
