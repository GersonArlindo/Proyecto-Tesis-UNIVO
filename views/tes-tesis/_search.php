<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;




/* @var $this yii\web\View */
/* @var $model app\models\TesTesisSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tes-tesis-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tes_codigo') ?>

    <?= $form->field($model, 'test_tema') ?>

    <?= $form->field($model, 'tes_codtin') ?>

    <?= $form->field($model, 'tes_fecha_ing') ?>

    <?= $form->field($model, 'tes_fecha_mod') ?>

    <?php // echo $form->field($model, 'tes_codusr') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
