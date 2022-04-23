<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tes_tesis".
 *
 * @property int $tes_codigo
 * @property string|null $test_tema
 * @property int $tes_codtin
 * @property string $tes_fecha_ing
 * @property string $tes_fecha_mod
 *
 * @property GruGrupos[] $gruGrupos
 * @property TinTipoInvestigacion $tesCodtin
 */
class TesTesis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tes_tesis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tes_codigo', 'tes_codtin', 'tes_fecha_ing', 'tes_fecha_mod'], 'required'],
            [['tes_codigo', 'tes_codtin'], 'integer'],
            [['tes_fecha_ing', 'tes_fecha_mod'], 'safe'],
            [['test_tema'], 'string', 'max' => 500],
            [['tes_codigo'], 'unique'],
            [['tes_codtin'], 'exist', 'skipOnError' => true, 'targetClass' => TinTipoInvestigacion::className(), 'targetAttribute' => ['tes_codtin' => 'tin_codigo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tes_codigo' => 'Codigo',
            'test_tema' => 'Tema',
            'tes_codtin' => 'Tipo Investigacion',
            'tes_fecha_ing' => 'Fecha Ingreso',
            'tes_fecha_mod' => 'Fecha Modificacion',
        ];
    }

    /**
     * Gets query for [[GruGrupos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGruGrupos()
    {
        return $this->hasMany(GruGrupos::class, ['gru_codtes' => 'tes_codigo']);
    }

    /**
     * Gets query for [[TesCodtin]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTesCodtin()
    {
        return $this->hasOne(TinTipoInvestigacion::class, ['tin_codigo' => 'tes_codtin']);
    }
}
