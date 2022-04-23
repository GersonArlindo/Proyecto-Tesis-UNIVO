<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TesTesis;

/**
 * TesTesisSearch represents the model behind the search form of `app\models\TesTesis`.
 */
class TesTesisSearch extends TesTesis
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tes_codigo', 'tes_codtin'], 'integer'],
            [['test_tema', 'tes_fecha_ing', 'tes_fecha_mod'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = TesTesis::find();

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
            'tes_codigo' => $this->tes_codigo,
            'tes_codtin' => $this->tes_codtin,
            'tes_fecha_ing' => $this->tes_fecha_ing,
            'tes_fecha_mod' => $this->tes_fecha_mod,
        ]);

        $query->andFilterWhere(['like', 'test_tema', $this->test_tema]);

        return $dataProvider;
    }
}
