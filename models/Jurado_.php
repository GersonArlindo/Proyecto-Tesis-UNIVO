<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jur_jurados".
 *
 * @property int $jur_codigo
 * @property string|null $jur_nombres
 * @property string|null $jur_apellidos
 * @property string|null $jur_especialidad
 * @property int|null $jur_rol
 * @property string $jur_carnet
 * @property string $jur_telefono
 * @property string $jur_direccion
 * @property string $jur_email
 * @property string $jur_fecha_ing
 * @property string $jur_fecha_mod
 * @property int $jur_codusr
 *
 * @property GruGrupos[] $gruGrupos
 */
class Jurado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jur_jurados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jur_carnet', 'jur_telefono', 'jur_direccion', 'jur_email'], 'required'],
            [['jur_codigo', 'jur_rol', 'jur_codusr'], 'integer'],
            [['jur_fecha_ing', 'jur_fecha_mod'], 'datetime'],
            [['jur_nombres', 'jur_apellidos', 'jur_especialidad'], 'string', 'max' => 250],
            [['jur_carnet', 'jur_email'], 'string', 'max' => 50],
            [['jur_telefono'], 'string', 'max' => 9],
            [['jur_direccion'], 'string', 'max' => 255],
            [['jur_codigo'], 'unique'],
            [['jur_fecha_ing', 'jur_fecha_mod'], 'default', 'value' => date('Y-m-d HH:mm:ss')],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jur_codigo' => 'Código',
            'jur_nombres' => 'Nombres',
            'jur_apellidos' => 'Apellidos',
            'jur_especialidad' => 'Especialidad',
            'jur_rol' => 'Rol',
            'jur_carnet' => 'Carnet',
            'jur_telefono' => 'Teléfono',
            'jur_direccion' => 'Dirección',
            'jur_email' => 'Email',
            'jur_fecha_ing' => 'Fecha Ingreso',
            'jur_fecha_mod' => 'Fecha Modificación',
            'jur_codusr' => 'Codusr',
        ];
    }

    /**
     * Gets query for [[GruGrupos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGruGrupos()
    {
        return $this->hasMany(GruGrupos::class, ['gru_codjur' => 'jur_codigo']);
    }
}
