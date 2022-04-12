<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CarCarrera */

$this->title = 'Actualizar Registro';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detalle', 'url' => ['view', 'car_codigo' => $model->car_codigo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="car-carrera-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
