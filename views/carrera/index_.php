<?php

use app\models\CarCarrera;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarreraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Car Carreras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-carrera-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Car Carrera', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'car_codigo',
            'car_codfac',
            'car_nombre',
            'car_fecha_ing',
            'car_fecha_mod',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, CarCarrera $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'car_codigo' => $model->car_codigo]);
                 }
            ],
        ],
    ]); ?>


</div>
