<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FacFacultad;

/**
 * FacultadSearch represents the model behind the search form of `app\models\FacFacultad`.
 */
class FacultadSearch extends FacFacultad
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fac_codigo'], 'integer'],
            [['fac_nombre', 'fac_fecha_ing', 'fac_fecha_mod'], 'safe'],
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
        $query = FacFacultad::find();

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
            'fac_codigo' => $this->fac_codigo,
            'fac_fecha_ing' => $this->fac_fecha_ing,
            'fac_fecha_mod' => $this->fac_fecha_mod,
        ]);

        $query->andFilterWhere(['like', 'fac_nombre', $this->fac_nombre]);

        return $dataProvider;
    }
}
