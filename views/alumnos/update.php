<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AlmAlumnos */

$this->title = 'Actualizar registro';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detalle', 'url' => ['view', 'alm_codigo' => $model->alm_codigo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="alm-alumnos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
