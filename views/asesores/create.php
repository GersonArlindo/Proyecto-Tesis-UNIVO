<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AseAsesores */

$this->title = 'Create Ase Asesores';
$this->params['breadcrumbs'][] = ['label' => 'Ase Asesores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ase-asesores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
