<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alm_alumnos".
 *
 * @property int $alm_codigo
 * @property int $alm_codcar
 * @property int $alm_codcil
 * @property string|null $alm_carnet
 * @property string|null $alm_nombres
 * @property string|null $alm_apellidos
 * @property int|null $alm_anio
 * @property string $alm_telefono
 * @property string $alm_email
 * @property string $alm_direccion
 * @property string $alm_fecha_ing
 * @property string $alm_fecha_mod
 * @property int $alm_codusr
 *
 * @property CarCarrera $almCodcar
 * @property CilCiclo $almCodcil
 * @property GruGrupos[] $gruGrupos
 */
class AlmAlumnos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alm_alumnos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alm_codigo', 'alm_codcar', 'alm_codcil', 'alm_telefono', 'alm_email', 'alm_direccion', 'alm_fecha_ing', 'alm_fecha_mod', 'alm_codusr'], 'required'],
            [['alm_codigo', 'alm_codcar', 'alm_codcil', 'alm_anio', 'alm_codusr'], 'integer'],
            [['alm_fecha_ing', 'alm_fecha_mod'], 'safe'],
            [['alm_carnet'], 'string', 'max' => 12],
            [['alm_nombres', 'alm_apellidos'], 'string', 'max' => 250],
            [['alm_telefono'], 'string', 'max' => 9],
            [['alm_email'], 'string', 'max' => 50],
            [['alm_direccion'], 'string', 'max' => 255],
            [['alm_codigo'], 'unique'],
            [['alm_codcar'], 'exist', 'skipOnError' => true, 'targetClass' => CarCarrera::class, 'targetAttribute' => ['alm_codcar' => 'car_codigo']],
            [['alm_codcil'], 'exist', 'skipOnError' => true, 'targetClass' => CilCiclo::class, 'targetAttribute' => ['alm_codcil' => 'cil_codigo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'alm_codigo' => 'Codigo',
            'alm_codcar' => 'Carrera',
            'alm_codcil' => 'Ciclo',
            'alm_carnet' => 'Carnet',
            'alm_nombres' => 'Nombres',
            'alm_apellidos' => 'Apellidos',
            'alm_anio' => 'Año',
            'alm_telefono' => 'Telefono',
            'alm_email' => 'Correo',
            'alm_direccion' => 'Direccion',
            'alm_fecha_ing' => 'Alm Fecha Ing',
            'alm_fecha_mod' => 'Alm Fecha Mod',
            'alm_codusr' => 'Usuario',
        ];
    }

    /**
     * Gets query for [[AlmCodcar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlmCodcar()
    {
        return $this->hasOne(CarCarrera::class, ['car_codigo' => 'alm_codcar']);
    }

    /**
     * Gets query for [[AlmCodcil]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlmCodcil()
    {
        return $this->hasOne(CilCiclo::class, ['cil_codigo' => 'alm_codcil']);
    }

    /**
     * Gets query for [[GruGrupos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGruGrupos()
    {
        return $this->hasMany(GruGrupos::class, ['gru_codalm' => 'alm_codigo']);
    }
}
