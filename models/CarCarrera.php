<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car_carrera".
 *
 * @property int $car_codigo
 * @property int $car_codfac
 * @property string|null $car_nombre
 * @property string $car_fecha_ing
 * @property string $car_fecha_mod
 *
 * @property AlmAlumnos[] $almAlumnos
 * @property FacFacultad $carCodfac
 */
class CarCarrera extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_carrera';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_codigo', 'car_codfac', 'car_fecha_ing', 'car_fecha_mod'], 'required'],
            [['car_codigo', 'car_codfac'], 'integer'],
            [['car_fecha_ing', 'car_fecha_mod'], 'safe'],
            [['car_nombre'], 'string', 'max' => 500],
            [['car_codigo'], 'unique'],
            [['car_codfac'], 'exist', 'skipOnError' => true, 'targetClass' => FacFacultad::class, 
            'targetAttribute' => ['car_codfac' => 'fac_codigo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'car_codigo' => 'Codigo',
            'car_codfac' => 'Facultad',
            'car_nombre' => 'Nombre',
            'car_fecha_ing' => 'Fecha Ingreso',
            'car_fecha_mod' => 'Fecha Modificacion',
        ];
    }

    /**
     * Gets query for [[AlmAlumnos]].
     *
     * @return \yii\db\ActiveQuery
     */
    /*public function getAlmAlumnos()
    {
        return $this->hasMany(AlmAlumnos::className(), ['alm_codcar' => 'car_codigo']);
    }*/

    /**
     * Gets query for [[CarCodfac]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarCodfac()
    {
        return $this->hasOne(FacFacultad::class, ['fac_codigo' => 'car_codfac']);
    }
}
