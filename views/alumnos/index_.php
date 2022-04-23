<?php

use app\models\AlmAlumnos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlumnosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'AlmAlumnos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alm-alumnos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create AlmAlumnos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'alm_codigo',
            'alm_codcar',
            'alm_codcil',
            'alm_carnet',
            'alm_nombres',
            //'alm_apellidos',
            //'alm_anio',
            //'alm_telefono',
            //'alm_email:email',
            //'alm_direccion',
            //'alm_fecha_ing',
            //'alm_fecha_mod',
            //'alm_codusr',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, AlmAlumnos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'alm_codigo' => $model->alm_codigo]);
                 }
            ],
        ],
    ]); ?>


</div>
