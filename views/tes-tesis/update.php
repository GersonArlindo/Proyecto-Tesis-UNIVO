<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TesTesis */

$this->title = 'Actualizar registro';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detalle', 'url' => ['view', 'tes_codigo' => $model->tes_codigo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="tes-tesis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
