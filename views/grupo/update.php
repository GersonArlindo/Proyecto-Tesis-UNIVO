<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Grupo */

$this->title = 'Actualizar Registro ';
$this->params['breadcrumbs'][] = ['label' => 'Grupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->grp_codigo, 'url' => ['view', 'grp_codigo' => $model->grp_codigo]];
$this->params['breadcrumbs'][] = 'A';
?>
<div class="grupo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'carreras' => $carreras
    ]) ?>

</div>
