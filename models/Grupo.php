<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grp_grupo".
 *
 * @property int $grp_codigo
 * @property int $grp_codcar
 * @property string $grp_tema
 * @property string $grp_tipo
 * @property int $grp_estado
 * @property string|null $grp_fecha_ing
 * @property string|null $grp_fecha_mod
 *
 * @property CarCarrera $grpCodcar
 */
class Grupo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grp_grupo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grp_codcar', 'grp_tema', 'grp_tipo', 'grp_estado'], 'required'],
            [['grp_codcar', 'grp_estado'], 'integer'],
            [['grp_fecha_ing', 'grp_fecha_mod'], 'safe'],
            [['grp_tema'], 'string', 'max' => 1000],
            [['grp_tipo'], 'string', 'max' => 100],
            [['grp_codcar'], 'exist', 'skipOnError' => true, 'targetClass' => CarCarrera::className(), 'targetAttribute' => ['grp_codcar' => 'car_codigo']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'grp_codigo' => 'Código',
            'grp_codcar' => 'Carrera',
            'grp_tema' => 'Tema',
            'grp_tipo' => 'Tipo',
            'grp_estado' => 'Estado',
            'grp_fecha_ing' => 'Fecha Ingreso',
            'grp_fecha_mod' => 'Fecha Modificación',
        ];
    }

    /**
     * Gets query for [[GrpCodcar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrpCodcar()
    {
        return $this->hasOne(CarCarrera::className(), ['car_codigo' => 'grp_codcar']);
    }

    public  function getCarrera(){
        return $this->hasOne(CarCarrera::className(), ['car_codigo' => 'grp_codcar'])->one()->car_nombre;
    }
}
