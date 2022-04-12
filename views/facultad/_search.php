<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FacultadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fac-facultad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fac_codigo') ?>

    <?= $form->field($model, 'fac_nombre') ?>

    <?= $form->field($model, 'fac_fecha_ing') ?>

    <?= $form->field($model, 'fac_fecha_mod') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
