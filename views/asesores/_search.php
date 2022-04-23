<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AsesoresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ase-asesores-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ase_codigo') ?>

    <?= $form->field($model, 'ase_nombres') ?>

    <?= $form->field($model, 'ase_apellido') ?>

    <?= $form->field($model, 'ase_especialidad') ?>

    <?= $form->field($model, 'ase_anio') ?>

    <?php // echo $form->field($model, 'ase_carnet') ?>

    <?php // echo $form->field($model, 'ase_email') ?>

    <?php // echo $form->field($model, 'ase_telefono') ?>

    <?php // echo $form->field($model, 'ase_direccion') ?>

    <?php // echo $form->field($model, 'ase_fecha_ing') ?>

    <?php // echo $form->field($model, 'ase_fecha_mod') ?>

    <?php // echo $form->field($model, 'ase_codusr') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
