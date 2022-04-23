<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ase_asesores".
 *
 * @property int $ase_codigo
 * @property string|null $ase_nombres
 * @property string $ase_apellido
 * @property string|null $ase_especialidad
 * @property int $ase_anio
 * @property string $ase_carnet
 * @property string $ase_email
 * @property string $ase_telefono
 * @property string $ase_direccion
 * @property string $ase_fecha_ing
 * @property string $ase_fecha_mod
 * @property int $ase_codusr
 *
 * @property GruGrupos[] $gruGrupos
 */
class AseAsesores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ase_asesores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ase_codigo', 'ase_apellido', 'ase_anio', 'ase_carnet', 'ase_email', 'ase_telefono', 'ase_direccion', 'ase_fecha_ing', 'ase_fecha_mod', 'ase_codusr'], 'required'],
            [['ase_codigo', 'ase_anio', 'ase_codusr'], 'integer'],
            [['ase_fecha_ing', 'ase_fecha_mod'], 'safe'],
            [['ase_nombres', 'ase_especialidad'], 'string', 'max' => 250],
            [['ase_apellido', 'ase_email'], 'string', 'max' => 100],
            [['ase_carnet'], 'string', 'max' => 50],
            [['ase_telefono'], 'string', 'max' => 9],
            [['ase_direccion'], 'string', 'max' => 255],
            [['ase_codigo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ase_codigo' => 'Ase Codigo',
            'ase_nombres' => 'Ase Nombres',
            'ase_apellido' => 'Ase Apellido',
            'ase_especialidad' => 'Ase Especialidad',
            'ase_anio' => 'Ase Anio',
            'ase_carnet' => 'Ase Carnet',
            'ase_email' => 'Ase Email',
            'ase_telefono' => 'Ase Telefono',
            'ase_direccion' => 'Ase Direccion',
            'ase_fecha_ing' => 'Ase Fecha Ing',
            'ase_fecha_mod' => 'Ase Fecha Mod',
            'ase_codusr' => 'Ase Codusr',
        ];
    }

    /**
     * Gets query for [[GruGrupos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGruGrupos()
    {
        return $this->hasMany(GruGrupos::className(), ['gru_codase' => 'ase_codigo']);
    }
}
