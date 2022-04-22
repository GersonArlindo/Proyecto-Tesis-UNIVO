<?php

use kartik\daterange\DateRangePicker;
use kartik\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jurado */
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


                <?= $form->field($model, 'jur_codigo')->hiddenInput()->label(false) ?>

                    <div class="row">
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'jur_nombres', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'jur_nombres', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'jur_apellidos', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'jur_apellidos', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'jur_especialidad', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'jur_especialidad', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'jur_rol', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'jur_rol', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'jur_carnet', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'jur_carnet', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'jur_telefono', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'jur_telefono', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'jur_direccion', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'jur_direccion', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'jur_email', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'jur_email', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
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

