<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GrupoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grupo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'grp_codigo') ?>

    <?= $form->field($model, 'grp_codcar') ?>

    <?= $form->field($model, 'grp_tema') ?>

    <?= $form->field($model, 'grp_tipo') ?>

    <?= $form->field($model, 'grp_estado') ?>

    <?php // echo $form->field($model, 'grp_fecha_ing') ?>

    <?php // echo $form->field($model, 'grp_fecha_mod') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
