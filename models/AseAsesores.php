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
 * @property string $ase_email
 * @property string $ase_telefono
 * @property string $ase_direccion
 * @property string $ase_fecha_ing
 * @property string $ase_fecha_mod
 * @property int $ase_codusr
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
            [['ase_codigo', 'ase_apellido', 'ase_email', 'ase_telefono', 'ase_direccion', 'ase_fecha_ing', 'ase_fecha_mod', 'ase_codusr'], 'required'],
            [['ase_codigo', 'ase_codusr'], 'integer'],
            [['ase_fecha_ing', 'ase_fecha_mod'], 'safe'],
            [['ase_nombres', 'ase_especialidad'], 'string', 'max' => 250],
            [['ase_apellido', 'ase_email'], 'string', 'max' => 100],
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
            'ase_codigo' => 'Codigo',
            'ase_nombres' => 'Nombres',
            'ase_apellido' => 'Apellidos',
            'ase_especialidad' => 'Especialidad',
            'ase_email' => 'Email',
            'ase_telefono' => 'Telefono',
            'ase_direccion' => 'Direccion',
            'ase_fecha_ing' => 'Fecha Ing',
            'ase_fecha_mod' => 'Fecha Mod',
            'ase_codusr' => 'Codusr',
        ];
    }
}
