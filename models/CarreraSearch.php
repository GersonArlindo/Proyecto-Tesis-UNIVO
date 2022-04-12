<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CarCarrera;

/**
 * CarreraSearch represents the model behind the search form of `app\models\CarCarrera`.
 */
class CarreraSearch extends CarCarrera
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_codigo', 'car_codfac'], 'integer'],
            [['car_nombre', 'car_fecha_ing', 'car_fecha_mod'], 'safe'],
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
        $query = CarCarrera::find();

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
            'car_codigo' => $this->car_codigo,
            'car_codfac' => $this->car_codfac,
            'car_fecha_ing' => $this->car_fecha_ing,
            'car_fecha_mod' => $this->car_fecha_mod,
        ]);

        $query->andFilterWhere(['like', 'car_nombre', $this->car_nombre]);

        return $dataProvider;
    }
}
