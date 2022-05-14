<?php
Yii::$app->language = 'es_ES';

use app\models\AlmAlumnos;
use app\models\CarCarrera;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OsigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado de Estudiantes';
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
                    'attribute' => 'alm_codigo',
                    'value' => function ($model, $key, $index, $widget) {
                        return Html::tag('span', 'AL- '.$model->alm_codigo, ['class' => 'badge bg-purple']);
                    },
                    'filter' => false,
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'width' => '300px',
                    'attribute' => 'alm_codcar',
                    'header' => 'Carrera',
                    'vAlign' => 'middle',
                    'format' => 'html',
                    'value' => 'almCodcar.car_nombre',
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
                    'width' => '300px',
                    'attribute' => 'alm_nombres',
                    'vAlign' => 'middle',
                    'format' => 'html',
                    'value' => function ($model, $key, $index, $widget) {
                        return Html::a($model->alm_nombres,  ['view', 'alm_codigo' => $model->alm_codigo]);
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(AlmAlumnos::find()->orderBy('alm_nombres')->all(), 'alm_nombres', 'alm_nombres'),
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
                    'attribute' => 'alm_carnet',
                    'vAlign' => 'middle',
                    'format' => 'html',
                    'value' => function ($model, $key, $index, $widget) {
                        return Html::a($model->alm_carnet,  ['view', 'alm_codigo' => $model->alm_codigo]);
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(AlmAlumnos::find()->orderBy('alm_carnet')->all(), 'alm_carnet', 'alm_carnet'),
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
                    'attribute' => 'alm_telefono',
                    'vAlign' => 'middle',
                    'format' => 'html',
                    'value' => function ($model, $key, $index, $widget) {
                        return Html::a($model->alm_telefono,  ['view', 'alm_codigo' => $model->alm_codigo]);
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(AlmAlumnos::find()->orderBy('alm_telefono')->all(), 'alm_telefono', 'alm_telefono'),
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
                    'attribute' => 'alm_email',
                    'vAlign' => 'middle',
                    'format' => 'html',
                    'value' => function ($model, $key, $index, $widget) {
                        return Html::a($model->alm_email,  ['view', 'alm_codigo' => $model->alm_codigo]);
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(AlmAlumnos::find()->orderBy('alm_email')->all(), 'alm_email', 'alm_email'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
                // [
                //     'class' => 'kartik\grid\DataColumn',
                //     'attribute' => 'car_fecha_ing',
                //     'headerOptions' => ['class' => 'kv-sticky-column'],
                //     'contentOptions' => ['class' => 'kv-sticky-column'],
                //     'vAlign' => 'middle',
                //     'hAlign' => 'right',
                //     'width' => '250px',
                //     'filterType' => GridView::FILTER_DATE,
                //     'filterWidgetOptions' => ([
                //         'model' => $dataProvider,
                //         'attribute' => 'car_fecha_ing',
                //         'convertFormat' => true,
                //         'pluginOptions' => [
                //             'format' => 'yyyy-M-dd',
                //             'autoWidget' => true,
                //             'autoclose' => true,
                //             'todayHighlight' => true,
                //         ],
                //     ]),
                // ],
                // [
                //     'class' => 'kartik\grid\DataColumn',
                //     'attribute' => 'car_fecha_mod',
                //     'headerOptions' => ['class' => 'kv-sticky-column'],
                //     'contentOptions' => ['class' => 'kv-sticky-column'],
                //     'vAlign' => 'middle',
                //     'hAlign' => 'right',
                //     'width' => '250px',
                //     'filterType' => GridView::FILTER_DATE,
                //     'filterWidgetOptions' => ([
                //         'model' => $dataProvider,
                //         'attribute' => 'car_fecha_mod',
                //         'convertFormat' => true,
                //         'pluginOptions' => [
                //             'format' => 'yyyy-M-dd',
                //             'autoWidget' => true,
                //             'autoclose' => true,
                //             'todayHighlight' => true,
                //         ],
                //     ]),
                // ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'urlCreator' => function ($action, AlmAlumnos $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'alm_codigo' => $model->alm_codigo]);
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
                    'heading' => 'Alumnos',
                ],
                'persistResize' => false,
            ]);
            ?>
        </div>
    </div>
</div>