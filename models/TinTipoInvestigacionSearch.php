<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TinTipoInvestigacion;

/**
 * TinTipoInvestigacionSearch represents the model behind the search form of `app\models\TinTipoInvestigacion`.
 */
class TinTipoInvestigacionSearch extends TinTipoInvestigacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tin_codigo'], 'integer'],
            [['tin_nombre'], 'safe'],
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
        $query = TinTipoInvestigacion::find();

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
            'tin_codigo' => $this->tin_codigo,
        ]);

        $query->andFilterWhere(['like', 'tin_nombre', $this->tin_nombre]);

        return $dataProvider;
    }
}
