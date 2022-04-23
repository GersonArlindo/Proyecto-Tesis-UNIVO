<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AlumnosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alm-alumnos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'alm_codigo') ?>

    <?= $form->field($model, 'alm_codcar') ?>

    <?= $form->field($model, 'alm_codcil') ?>

    <?= $form->field($model, 'alm_carnet') ?>

    <?= $form->field($model, 'alm_nombres') ?>

    <?php // echo $form->field($model, 'alm_apellidos') ?>

    <?php // echo $form->field($model, 'alm_anio') ?>

    <?php // echo $form->field($model, 'alm_telefono') ?>

    <?php // echo $form->field($model, 'alm_email') ?>

    <?php // echo $form->field($model, 'alm_direccion') ?>

    <?php // echo $form->field($model, 'alm_fecha_ing') ?>

    <?php // echo $form->field($model, 'alm_fecha_mod') ?>

    <?php // echo $form->field($model, 'alm_codusr') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
