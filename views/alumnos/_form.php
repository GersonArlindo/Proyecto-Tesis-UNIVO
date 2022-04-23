<?php

use app\models\AlmAlumnos;
use app\models\CarCarrera;
use app\models\CilCiclo;
use kartik\daterange\DateRangePicker;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use kartik\widgets\SwitchInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Crear / Editar registro</h3>
            </div>
            <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); ?>
            <div class="card-body">
                <form role="form">
                    <div class="row">
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'alm_codigo', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'alm_codigo', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'alm_carnet', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'alm_carnet', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'alm_codcar', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'alm_codcar', ['showLabels' => false])->widget(Select2::class, [
                                'data' => ArrayHelper::map(CarCarrera::find()->all(), 'car_codigo', 'car_nombre'),
                                'language' => 'es',
                                'options' => ['placeholder' => '- Seleccionar Categoria -'],
                                'pluginOptions' => ['allowClear' => true],
                            ]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'alm_codcil', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'alm_codcil', ['showLabels' => false])->widget(Select2::class, [
                                'data' => ArrayHelper::map(CilCiclo::find()->all(), 'cil_codigo', 'cil_nombre'),
                                'language' => 'es',
                                'options' => ['placeholder' => '- Seleccionar Categoria -'],
                                'pluginOptions' => ['allowClear' => true],
                            ]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'alm_nombres', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'alm_nombres', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'alm_apellidos', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'alm_apellidos', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= Html::activeLabel($model, 'alm_anio', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'alm_anio', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= Html::activeLabel($model, 'alm_telefono', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'alm_telefono', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= Html::activeLabel($model, 'alm_email', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'alm_email', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                        <div class="col-md-12">
                            <?= Html::activeLabel($model, 'alm_direccion', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'alm_direccion', ['showLabels' => false])->textarea(['autofocus' => true]) ?>
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
