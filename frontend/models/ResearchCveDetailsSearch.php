<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ResearchCveDetails;

/**
 * ResearchCveDetailsSearch represents the model behind the search form about `frontend\models\ResearchCveDetails`.
 */
class ResearchCveDetailsSearch extends ResearchCveDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['product', 'cve', 'vulnerability', 'conf', 'integrity', 'availability', 'description'], 'safe'],
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
        $query = ResearchCveDetails::find();

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
        ]);

        $query->andFilterWhere(['like', 'product', $this->product])
            ->andFilterWhere(['like', 'cve', $this->cve])
            ->andFilterWhere(['like', 'vulnerability', $this->vulnerability])
            ->andFilterWhere(['like', 'conf', $this->conf])
            ->andFilterWhere(['like', 'integrity', $this->integrity])
            ->andFilterWhere(['like', 'availability', $this->availability])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
