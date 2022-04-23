<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AseAsesores;

/**
 * AsesoresSearch represents the model behind the search form of `app\models\AseAsesores`.
 */
class AsesoresSearch extends AseAsesores
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ase_codigo', 'ase_anio', 'ase_codusr'], 'integer'],
            [['ase_nombres', 'ase_apellido', 'ase_especialidad', 'ase_carnet', 'ase_email', 'ase_telefono', 'ase_direccion', 'ase_fecha_ing', 'ase_fecha_mod'], 'safe'],
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
        $query = AseAsesores::find();

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
            'ase_codigo' => $this->ase_codigo,
            'ase_anio' => $this->ase_anio,
            'ase_fecha_ing' => $this->ase_fecha_ing,
            'ase_fecha_mod' => $this->ase_fecha_mod,
            'ase_codusr' => $this->ase_codusr,
        ]);

        $query->andFilterWhere(['like', 'ase_nombres', $this->ase_nombres])
            ->andFilterWhere(['like', 'ase_apellido', $this->ase_apellido])
            ->andFilterWhere(['like', 'ase_especialidad', $this->ase_especialidad])
            ->andFilterWhere(['like', 'ase_carnet', $this->ase_carnet])
            ->andFilterWhere(['like', 'ase_email', $this->ase_email])
            ->andFilterWhere(['like', 'ase_telefono', $this->ase_telefono])
            ->andFilterWhere(['like', 'ase_direccion', $this->ase_direccion]);

        return $dataProvider;
    }
}
