<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tin_tipo_investigacion".
 *
 * @property int $tin_codigo
 * @property string|null $tin_nombre
 * @property string|null $tin_fecha_ing
 * @property string|null $tin_fecha_mod
 * @property int|null $tin_user
 *
 * @property TesTesis[] $tesTeses
 */
class TinTipoInvestigacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tin_tipo_investigacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tin_codigo'], 'required'],
            [['tin_codigo', 'tin_user'], 'integer'],
            [['tin_fecha_ing', 'tin_fecha_mod'], 'safe'],
            [['tin_nombre'], 'string', 'max' => 250],
            [['tin_codigo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tin_codigo' => 'Codigo',
            'tin_nombre' => 'Nombre',
            'tin_fecha_ing' => 'Fecha Ingreso',
            'tin_fecha_mod' => 'Fecha Modificacion',
            'tin_user' => 'User',
        ];
    }

    /**
     * Gets query for [[TesTeses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTesTeses()
    {
        return $this->hasMany(TesTesis::className(), ['tes_codtin' => 'tin_codigo']);
    }
}
