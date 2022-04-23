<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AseAsesores */

$this->title = $model->ase_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Ase Asesores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ase-asesores-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ase_codigo' => $model->ase_codigo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ase_codigo' => $model->ase_codigo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ase_codigo',
            'ase_nombres',
            'ase_apellido',
            'ase_especialidad',
            'ase_anio',
            'ase_carnet',
            'ase_email:email',
            'ase_telefono',
            'ase_direccion',
            'ase_fecha_ing',
            'ase_fecha_mod',
            'ase_codusr',
        ],
    ]) ?>

</div>
