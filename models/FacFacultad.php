<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fac_facultad".
 *
 * @property int $fac_codigo
 * @property string|null $fac_nombre
 * @property string $fac_fecha_ing
 * @property string $fac_fecha_mod
 *
 * @property CarCarrera[] $carCarreras
 */
class FacFacultad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fac_facultad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fac_codigo', 'fac_fecha_ing', 'fac_fecha_mod'], 'required'],
            [['fac_codigo'], 'integer'],
            [['fac_fecha_ing', 'fac_fecha_mod'], 'safe'],
            [['fac_nombre'], 'string', 'max' => 250],
            [['fac_codigo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fac_codigo' => 'Código',
            'fac_nombre' => 'Nombre de la Facultad',
            'fac_fecha_ing' => 'Fecha Ingreso',
            'fac_fecha_mod' => 'Fecha Modificacion',
        ];
    }

    /**
     * Gets query for [[CarCarreras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarCarreras()
    {
        return $this->hasMany(CarCarrera::class, ['car_codfac' => 'fac_codigo']);
    }
}
