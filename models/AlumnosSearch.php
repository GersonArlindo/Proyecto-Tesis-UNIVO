<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AlmAlumnos;

/**
 * AlumnosSearch represents the model behind the search form of `app\models\AlmAlumnos`.
 */
class AlumnosSearch extends AlmAlumnos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alm_carnet', 'alm_codgrp', 'alm_nombres', 'alm_apellidos', 'alm_telefono', 'alm_email', 'alm_direccion', 'alm_fecha_ing', 'alm_fecha_mod'], 'safe'],
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
        $query = AlmAlumnos::find();

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
            'alm_codigo' => $this->alm_codigo,
            'alm_codcar' => $this->alm_codcar,
            'alm_codgrp' => $this->alm_codgrp,
            'alm_anio' => $this->alm_anio,
            'alm_fecha_ing' => $this->alm_fecha_ing,
            'alm_fecha_mod' => $this->alm_fecha_mod,
            'alm_codusr' => $this->alm_codusr,
        ]);

        $query->andFilterWhere(['like', 'alm_carnet', $this->alm_carnet])
            ->andFilterWhere(['like', 'alm_nombres', $this->alm_nombres])
            ->andFilterWhere(['like', 'alm_apellidos', $this->alm_apellidos])
            ->andFilterWhere(['like', 'alm_telefono', $this->alm_telefono])
            ->andFilterWhere(['like', 'alm_email', $this->alm_email])
            ->andFilterWhere(['like', 'alm_direccion', $this->alm_direccion]);

        return $dataProvider;
    }
}
