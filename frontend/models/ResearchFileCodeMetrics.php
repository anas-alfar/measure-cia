<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "research_file_code_metrics".
 *
 * @property integer $id
 * @property string $filename
 * @property string $name
 * @property integer $loc
 * @property integer $logicalLoc
 * @property string $volume
 * @property integer $length
 * @property integer $vocabulary
 * @property string $effort
 * @property string $difficulty
 * @property integer $time
 * @property string $bugs
 * @property string $intelligentContent
 * @property string $maintainabilityIndexWithoutComment
 * @property string $maintainabilityIndex
 * @property string $commentWeight
 * @property integer $instability
 * @property integer $afferentCoupling
 * @property integer $efferentCoupling
 * @property integer $noc
 * @property integer $noca
 * @property integer $nocc
 * @property integer $noc-anon
 * @property integer $noi
 * @property integer $nom
 * @property integer $cyclomaticComplexity
 * @property string $myerInterval
 * @property integer $myerDistance
 * @property integer $operators
 * @property integer $lcom
 * @property integer $sysc
 * @property integer $rsysc
 * @property integer $dc
 * @property integer $rdc
 * @property integer $sc
 * @property integer $rsc
 */
class ResearchFileCodeMetrics extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'research_file_code_metrics';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loc', 'logicalLoc', 'length', 'vocabulary', 'time', 'instability', 'afferentCoupling', 'efferentCoupling', 'noc', 'noca', 'nocc', 'noc-anon', 'noi', 'nom', 'cyclomaticComplexity', 'myerDistance', 'operators', 'lcom', 'sysc', 'rsysc', 'dc', 'rdc', 'sc', 'rsc'], 'integer'],
            [['filename', 'name', 'volume', 'effort', 'difficulty', 'bugs', 'intelligentContent', 'maintainabilityIndexWithoutComment', 'maintainabilityIndex', 'commentWeight', 'myerInterval'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filename' => 'Filename',
            'name' => 'Name',
            'loc' => 'Loc',
            'logicalLoc' => 'Logical Loc',
            'volume' => 'Volume',
            'length' => 'Length',
            'vocabulary' => 'Vocabulary',
            'effort' => 'Effort',
            'difficulty' => 'Difficulty',
            'time' => 'Time',
            'bugs' => 'Bugs',
            'intelligentContent' => 'Intelligent Content',
            'maintainabilityIndexWithoutComment' => 'Maintainability Index Without Comment',
            'maintainabilityIndex' => 'Maintainability Index',
            'commentWeight' => 'Comment Weight',
            'instability' => 'Instability',
            'afferentCoupling' => 'Afferent Coupling',
            'efferentCoupling' => 'Efferent Coupling',
            'noc' => 'Noc',
            'noca' => 'Noca',
            'nocc' => 'Nocc',
            'noc-anon' => 'Noc Anon',
            'noi' => 'Noi',
            'nom' => 'Nom',
            'cyclomaticComplexity' => 'Cyclomatic Complexity',
            'myerInterval' => 'Myer Interval',
            'myerDistance' => 'Myer Distance',
            'operators' => 'Operators',
            'lcom' => 'Lcom',
            'sysc' => 'Sysc',
            'rsysc' => 'Rsysc',
            'dc' => 'Dc',
            'rdc' => 'Rdc',
            'sc' => 'Sc',
            'rsc' => 'Rsc',
        ];
    }

    /**
     * @inheritdoc
     * @return ResearchFileCodeMetricsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ResearchFileCodeMetricsQuery(get_called_class());
    }
}
