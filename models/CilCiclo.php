<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cil_ciclo".
 *
 * @property int $cil_codigo
 * @property string|null $cil_nombre
 * @property int|null $cil_anio
 * @property string $cil_fecha_ing
 * @property string $cil_fecha_mod
 * @property int $cil_codusr
 *
 * @property AlmAlumnos[] $almAlumnos
 */
class CilCiclo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cil_ciclo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cil_codigo', 'cil_fecha_ing', 'cil_fecha_mod', 'cil_codusr'], 'required'],
            [['cil_codigo', 'cil_anio', 'cil_codusr'], 'integer'],
            [['cil_fecha_ing', 'cil_fecha_mod'], 'safe'],
            [['cil_nombre'], 'string', 'max' => 100],
            [['cil_codigo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cil_codigo' => 'Cil Codigo',
            'cil_nombre' => 'Cil Nombre',
            'cil_anio' => 'Cil Anio',
            'cil_fecha_ing' => 'Cil Fecha Ing',
            'cil_fecha_mod' => 'Cil Fecha Mod',
            'cil_codusr' => 'Cil Codusr',
        ];
    }

    /**
     * Gets query for [[AlmAlumnos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlmAlumnos()
    {
        return $this->hasMany(AlmAlumnos::className(), ['alm_codcil' => 'cil_codigo']);
    }
}
