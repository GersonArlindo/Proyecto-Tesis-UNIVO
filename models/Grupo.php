<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grp_grupo".
 *
 * @property int $grp_codigo
 * @property int $grp_codcar
 * @property string $grp_tema
 * @property int $grp_tipo
 * @property int $grp_estado
 * @property string|null $grp_fecha_ing
 * @property string|null $grp_fecha_mod
 *
 * @property CarCarrera $grpCodcar
 * @property TinTipoInvestigacion $grpTipo
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
            [['grp_codcar', 'grp_tipo', 'grp_estado'], 'integer'],
            [['grp_fecha_ing', 'grp_fecha_mod'], 'safe'],
            [['grp_tema'], 'string', 'max' => 1000],
            [['grp_codcar'], 'exist', 'skipOnError' => true, 'targetClass' => CarCarrera::class, 'targetAttribute' => ['grp_codcar' => 'car_codigo']],
            [['grp_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => TinTipoInvestigacion::class, 'targetAttribute' => ['grp_tipo' => 'tin_codigo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'grp_codigo' => 'Codigo',
            'grp_codcar' => 'Carrera',
            'grp_tema' => 'Tema',
            'grp_tipo' => 'Tipo de Investigacion',
            'grp_estado' => 'Estado',
            'grp_fecha_ing' => 'Fecha Ing',
            'grp_fecha_mod' => 'Fecha Mod',
        ];
    }

    /**
     * Gets query for [[GrpCodcar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrpCodcar()
    {
        return $this->hasOne(CarCarrera::class, ['car_codigo' => 'grp_codcar']);
    }

    /**
     * Gets query for [[GrpTipo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrpTipo()
    {
        return $this->hasOne(TinTipoInvestigacion::class, ['tin_codigo' => 'grp_tipo']);
    }
}
