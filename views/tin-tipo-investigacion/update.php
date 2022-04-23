<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TinTipoInvestigacion */

$this->title = 'Editar Tipo de Investigacion: ' . $model->tin_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Investigacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tin_codigo, 'url' => ['view', 'tin_codigo' => $model->tin_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tin-tipo-investigacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
