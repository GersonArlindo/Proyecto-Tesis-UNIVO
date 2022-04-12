<?php
Yii::$app->language = 'es_ES';

use app\models\CarCarrera;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OsigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado de Carreras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <div class="tbl-cat-index">

            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); 
            ?>
            <?php
            $gridColumns = [
                [
                    'class' => 'kartik\grid\SerialColumn',
                    'contentOptions' => ['class' => 'kartik-sheet-style'],
                    'width' => '36px',
                    'header' => '#',
                    'headerOptions' => ['class' => 'kartik-sheet-style']
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'width' => '80px',
                    'format' => 'raw',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'attribute' => 'car_codigo',
                    'value' => function ($model, $key, $index, $widget) {
                        return Html::tag('span', $model->car_codigo, ['class' => 'badge bg-purple']);
                    },
                    'filter' => false,
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'width' => '300px',
                    'attribute' => 'car_codfac',
                    'vAlign' => 'middle',
                    'format' => 'html',
                    'value' => function ($model, $key, $index, $widget) {
                        return Html::a($model->car_codfac,  ['view', 'car_codfac' => $model->car_codfac]);
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(CarCarrera::find()->orderBy('car_codfac')->all(), 'car_codfac', 'car_codfac'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'width' => '300px',
                    'attribute' => 'car_nombre',
                    'vAlign' => 'middle',
                    'format' => 'html',
                    'value' => function ($model, $key, $index, $widget) {
                        return Html::a($model->car_nombre,  ['view', 'car_codigo' => $model->car_codigo]);
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(CarCarrera::find()->orderBy('car_nombre')->all(), 'car_nombre', 'car_nombre'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'car_fecha_ing',
                    'headerOptions' => ['class' => 'kv-sticky-column'],
                    'contentOptions' => ['class' => 'kv-sticky-column'],
                    'vAlign' => 'middle',
                    'hAlign' => 'right',
                    'width' => '250px',
                    'filterType' => GridView::FILTER_DATE,
                    'filterWidgetOptions' => ([
                        'model' => $dataProvider,
                        'attribute' => 'car_fecha_ing',
                        'convertFormat' => true,
                        'pluginOptions' => [
                            'format' => 'yyyy-M-dd',
                            'autoWidget' => true,
                            'autoclose' => true,
                            'todayHighlight' => true,
                        ],
                    ]),
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'car_fecha_mod',
                    'headerOptions' => ['class' => 'kv-sticky-column'],
                    'contentOptions' => ['class' => 'kv-sticky-column'],
                    'vAlign' => 'middle',
                    'hAlign' => 'right',
                    'width' => '250px',
                    'filterType' => GridView::FILTER_DATE,
                    'filterWidgetOptions' => ([
                        'model' => $dataProvider,
                        'attribute' => 'car_fecha_mod',
                        'convertFormat' => true,
                        'pluginOptions' => [
                            'format' => 'yyyy-M-dd',
                            'autoWidget' => true,
                            'autoclose' => true,
                            'todayHighlight' => true,
                        ],
                    ]),
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'urlCreator' => function ($action, CarCarrera $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'car_codigo' => $model->car_codigo]);
                     }
                ],
            ];

            $exportmenu = ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns,
                'exportConfig' => [
                    ExportMenu::FORMAT_TEXT => false,
                    ExportMenu::FORMAT_HTML => false,
                ],
            ]);


            echo GridView::widget([
                'id' => 'kv-carrera',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => $gridColumns,
                'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                'pjax' => true, // pjax is set to always true for this demo
                // set your toolbar
                'toolbar' =>  [
                    [
                        'content' =>
                        Html::a('<i class="fas fa-plus"></i> Agregar', ['create'], [
                            'class' => 'btn btn-success',
                            'data-pjax' => 0,
                        ]) . ' ' .
                            Html::a('<i class="fas fa-redo"></i>', ['index'], [
                                'class' => 'btn btn-outline-success',
                                'data-pjax' => 0,
                            ]),
                        'options' => ['class' => 'btn-group mr-2']
                    ],
                    $exportmenu,
                    '{toggleData}',
                   
                    
                ],
                'toggleDataContainer' => ['class' => 'btn-group mr-2'],
                // set export properties
                // parameters from the demo form
                'bordered' => true,
                'striped' => true,
                'condensed' => true,
                'responsive' => true,
                'hover' => true,
                //'showPageSummary'=>$pageSummary,
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => 'Carreras',
                ],
                'persistResize' => false,
            ]);
            ?>
        </div>
    </div>
</div>