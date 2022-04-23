<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TinTipoInvestigacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tin Tipo Investigacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tin-tipo-investigacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tin Tipo Investigacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tin_codigo',
            'tin_nombre',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TinTipoInvestigacion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'tin_codigo' => $model->tin_codigo]);
                 }
            ],
        ],
    ]); ?>


</div>
