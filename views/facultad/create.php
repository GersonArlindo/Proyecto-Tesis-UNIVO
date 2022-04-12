<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FacFacultad */

$this->title = 'Crear Facultad';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fac-facultad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
