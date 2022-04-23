<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JuradoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jurado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'jur_codigo') ?>

    <?= $form->field($model, 'jur_nombres') ?>

    <?= $form->field($model, 'jur_apellidos') ?>

    <?= $form->field($model, 'jur_especialidad') ?>

    <?= $form->field($model, 'jur_rol') ?>

    <?php // echo $form->field($model, 'jur_carnet') ?>

    <?php // echo $form->field($model, 'jur_telefono') ?>

    <?php // echo $form->field($model, 'jur_direccion') ?>

    <?php // echo $form->field($model, 'jur_email') ?>

    <?php // echo $form->field($model, 'jur_fecha_ing') ?>

    <?php // echo $form->field($model, 'jur_fecha_mod') ?>

    <?php // echo $form->field($model, 'jur_codusr') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
