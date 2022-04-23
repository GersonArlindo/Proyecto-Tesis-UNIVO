<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AseAsesores */

$this->title = 'Update Ase Asesores: ' . $model->ase_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Ase Asesores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ase_codigo, 'url' => ['view', 'ase_codigo' => $model->ase_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ase-asesores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
