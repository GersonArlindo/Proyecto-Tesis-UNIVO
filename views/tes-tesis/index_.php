<?php

use app\models\TesTesis;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TesTesisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tes Tesis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tes-tesis-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tes Tesis', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tes_codigo',
            'test_tema',
            'tes_codtin',
            'tes_fecha_ing',
            'tes_fecha_mod',
            //'tes_codusr',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TesTesis $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'tes_codigo' => $model->tes_codigo]);
                 }
            ],
        ],
    ]); ?>


</div>
