<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AseAsesores */

$this->title = 'Actualizar registro';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detalle', 'url' => ['view', 'ase_codigo' => $model->ase_codigo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ase-asesores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
