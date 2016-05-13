<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "final_cve_file".
 *
 * @property integer $id
 * @property string $cve
 * @property string $filename
 */
class CveFile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tool_cve_file';
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
     * @return CveFileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CveFileQuery(get_called_class());
    }
}
