<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ResearchFileCodeMetrics;

/**
 * ResearchFileCodeMetricsSearch represents the model behind the search form about `frontend\models\ResearchFileCodeMetrics`.
 */
class ResearchFileCodeMetricsSearch extends ResearchFileCodeMetrics
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'loc', 'logicalLoc', 'length', 'vocabulary', 'time', 'instability', 'afferentCoupling', 'efferentCoupling', 'noc', 'noca', 'nocc', 'noi', 'nom', 'cyclomaticComplexity', 'myerDistance', 'operators', 'lcom', 'sysc', 'rsysc', 'dc', 'rdc', 'sc', 'rsc'], 'integer'],
            [['filename', 'name', 'volume', 'effort', 'difficulty', 'bugs', 'intelligentContent', 'maintainabilityIndexWithoutComment', 'maintainabilityIndex', 'commentWeight', 'myerInterval'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ResearchFileCodeMetrics::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'loc' => $this->loc,
            'logicalLoc' => $this->logicalLoc,
            'length' => $this->length,
            'vocabulary' => $this->vocabulary,
            'time' => $this->time,
            'instability' => $this->instability,
            'afferentCoupling' => $this->afferentCoupling,
            'efferentCoupling' => $this->efferentCoupling,
            'noc' => $this->noc,
            'noca' => $this->noca,
            'nocc' => $this->nocc,
            'noi' => $this->noi,
            'nom' => $this->nom,
            'cyclomaticComplexity' => $this->cyclomaticComplexity,
            'myerDistance' => $this->myerDistance,
            'operators' => $this->operators,
            'lcom' => $this->lcom,
            'sysc' => $this->sysc,
            'rsysc' => $this->rsysc,
            'dc' => $this->dc,
            'rdc' => $this->rdc,
            'sc' => $this->sc,
            'rsc' => $this->rsc,
        ]);

        $query->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'volume', $this->volume])
            ->andFilterWhere(['like', 'effort', $this->effort])
            ->andFilterWhere(['like', 'difficulty', $this->difficulty])
            ->andFilterWhere(['like', 'bugs', $this->bugs])
            ->andFilterWhere(['like', 'intelligentContent', $this->intelligentContent])
            ->andFilterWhere(['like', 'maintainabilityIndexWithoutComment', $this->maintainabilityIndexWithoutComment])
            ->andFilterWhere(['like', 'maintainabilityIndex', $this->maintainabilityIndex])
            ->andFilterWhere(['like', 'commentWeight', $this->commentWeight])
            ->andFilterWhere(['like', 'myerInterval', $this->myerInterval]);

        return $dataProvider;
    }
}
