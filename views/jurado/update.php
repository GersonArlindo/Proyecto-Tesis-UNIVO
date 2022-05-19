<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jurado */

$this->title = 'Actualizar Registro';
$this->params['breadcrumbs'][] = ['label' => 'Jurados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detalles', 'url' => ['view', 'jur_codigo' => $model->jur_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jurado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
