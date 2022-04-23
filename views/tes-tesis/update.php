<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TesTesis */

$this->title = 'Actualizar Tema de Tesis ' . $model->tes_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Temas de Tesis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tes_codigo, 'url' => ['view', 'tes_codigo' => $model->tes_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tes-tesis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
