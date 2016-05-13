<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "research_cve_details".
 *
 * @property integer $id
 * @property string $product
 * @property string $cve
 * @property string $vulnerability
 * @property string $conf
 * @property string $integrity
 * @property string $availability
 * @property string $description
 */
class ResearchCveDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'research_cve_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product', 'cve', 'vulnerability', 'conf', 'integrity', 'availability'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 32767],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product' => 'Product',
            'cve' => 'Cve',
            'vulnerability' => 'Vulnerability',
            'conf' => 'Conf',
            'integrity' => 'Integrity',
            'availability' => 'Availability',
            'description' => 'Description',
        ];
    }

    /**
     * @inheritdoc
     * @return ResearchCveDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ResearchCveDetailsQuery(get_called_class());
    }
}
