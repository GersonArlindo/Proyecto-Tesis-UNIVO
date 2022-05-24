<?php

use app\models\TinTipoInvestigacion;
use kartik\daterange\DateRangePicker;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Grupo */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Editar registro</h3>
            </div>
            <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); ?>
            <div class="card-body">
                <form role="form">

                    <div class="row">
                        <div class="col-md-12">
                            <?= Html::activeLabel($model, 'grp_tema', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'grp_tema', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?= Html::activeLabel($model, 'grp_codcar', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'grp_codcar', ['showLabels' => false])->dropDownList($carreras, ['prompt'=>'--Seleccione--']) ?>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                            <?= Html::activeLabel($model, 'grp_tipo', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'grp_tipo', ['showLabels' => false])->widget(Select2::class, [
                                'data' => ArrayHelper::map(TinTipoInvestigacion::find()->all(), 'tin_codigo', 'tin_nombre'),
                                'language' => 'es',
                                'options' => ['placeholder' => '- Seleccionar Categoria -'],
                                'pluginOptions' => ['allowClear' => true],
                            ]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'grp_estado', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'grp_estado', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Guardar' : '<i class="fa fa-save"></i> Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        <?= Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
                    </div>
                </form>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>










