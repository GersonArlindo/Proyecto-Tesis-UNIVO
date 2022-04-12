<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FacFacultad */

$this->title = 'Actualizar Registro';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detalle', 'url' => ['view', 'fac_codigo' => $model->fac_codigo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="fac-facultad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
