<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TinTipoInvestigacion */

$this->title = 'Crear Tipo de Investigacion';
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Investigacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tin-tipo-investigacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
