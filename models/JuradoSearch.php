<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jurado;

/**
 * JuradoSearch represents the model behind the search form of `app\models\Jurado`.
 */
class JuradoSearch extends Jurado
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jur_codigo', 'jur_rol', 'jur_codusr'], 'integer'],
            [['jur_nombres', 'jur_apellidos', 'jur_especialidad', 'jur_carnet', 'jur_telefono', 'jur_direccion', 'jur_email', 'jur_fecha_ing', 'jur_fecha_mod'], 'safe'],
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
        $query = Jurado::find();

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
            'jur_codigo' => $this->jur_codigo,
            'jur_rol' => $this->jur_rol,
            'jur_fecha_ing' => $this->jur_fecha_ing,
            'jur_fecha_mod' => $this->jur_fecha_mod,
            'jur_codusr' => $this->jur_codusr,
        ]);

        $query->andFilterWhere(['like', 'jur_nombres', $this->jur_nombres])
            ->andFilterWhere(['like', 'jur_apellidos', $this->jur_apellidos])
            ->andFilterWhere(['like', 'jur_especialidad', $this->jur_especialidad])
            ->andFilterWhere(['like', 'jur_carnet', $this->jur_carnet])
            ->andFilterWhere(['like', 'jur_telefono', $this->jur_telefono])
            ->andFilterWhere(['like', 'jur_direccion', $this->jur_direccion])
            ->andFilterWhere(['like', 'jur_email', $this->jur_email]);

        return $dataProvider;
    }
}
