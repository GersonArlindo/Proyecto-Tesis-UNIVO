<?php

use app\models\FacFacultad;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FacultadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fac Facultads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fac-facultad-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Fac Facultad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fac_codigo',
            'fac_nombre',
            'fac_fecha_ing',
            'fac_fecha_mod',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, FacFacultad $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'fac_codigo' => $model->fac_codigo]);
                 }
            ],
        ],
    ]); ?>
</div>
