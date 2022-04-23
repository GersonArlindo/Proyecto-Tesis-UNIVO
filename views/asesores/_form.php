<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AseAsesores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ase-asesores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ase_codigo')->textInput() ?>

    <?= $form->field($model, 'ase_nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ase_apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ase_especialidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ase_anio')->textInput() ?>

    <?= $form->field($model, 'ase_carnet')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ase_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ase_telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ase_direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ase_fecha_ing')->textInput() ?>

    <?= $form->field($model, 'ase_fecha_mod')->textInput() ?>

    <?= $form->field($model, 'ase_codusr')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
