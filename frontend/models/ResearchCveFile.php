<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "research_cve_file".
 *
 * @property integer $id
 * @property string $cve
 * @property string $filename
 */
class ResearchCveFile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'research_cve_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cve', 'filename'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cve' => 'Cve',
            'filename' => 'Filename',
        ];
    }

    /**
     * @inheritdoc
     * @return ResearchCveFileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ResearchCveFileQuery(get_called_class());
    }
}
