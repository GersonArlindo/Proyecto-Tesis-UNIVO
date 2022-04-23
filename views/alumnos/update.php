<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AlmAlumnos */

$this->title = 'Update Alm Alumnos: ' . $model->alm_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Alm Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->alm_codigo, 'url' => ['view', 'alm_codigo' => $model->alm_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alm-alumnos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
