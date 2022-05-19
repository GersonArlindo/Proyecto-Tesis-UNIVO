<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AlmAlumnos */

$this->title = 'Crear Registro';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alm-alumnos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
