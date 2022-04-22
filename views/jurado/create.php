<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jurado */

$this->title = 'Crear Jurado';
$this->params['breadcrumbs'][] = ['label' => 'Jurados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jurado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
