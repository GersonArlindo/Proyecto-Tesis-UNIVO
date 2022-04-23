<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TesTesis */

$this->title = 'Create Tes Tesis';
$this->params['breadcrumbs'][] = ['label' => 'Tes Tesis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tes-tesis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
