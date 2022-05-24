<?php
Yii::$app->language = 'es_ES';

use app\models\AlmAlumnos;
use app\models\CarCarrera;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use yii\bootstrap4\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OsigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<?php
//FIXME CREAR MODAL
Modal::begin([
    'options' => [
        'tabindex' => false
    ],
    'title' => 'Crear registro',
    'id' => 'create-modal-alumno',
    'size' => 'modal-lg'
]);
echo "<div id='createModalContent'></div>";
Modal::end();
?>

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <div class="tbl-cat-index">

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
                    'filter' => false
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'width' => '300px',
                    'attribute' => 'alm_nombres',
                    'vAlign' => 'middle',
                    'format' => 'html',
                    'value' => function ($model, $key, $index, $widget) {
                        return Html::a($model->alm_nombres. ' ' .$model->alm_apellidos,  ['view', 'alm_codigo' => $model->alm_codigo]);
                    },
                    'filter' => false
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
                    'filter' => false
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
                    'filter' => false
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
                    'filter' => false
                ],
                // [
                //     'class' => 'kartik\grid\ActionColumn',
                //     'urlCreator' => function ($action, AlmAlumnos $model, $key, $index, $column) {
                //         return Url::toRoute([$action, 'alm_codigo' => $model->alm_codigo]);
                //      }
                // ],
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
                        Html::button('<i class="fa fa-plus"></i> Agregar Estudiante', ['value' => Url::to('index.php?r=grupo/create-modal-alumno&grp_codigo='.$model->grp_codigo), 
                        'class' => 'btn btn-warning', 'id' => 'modalButton'
                        ]) .' &nbsp&nbsp '.
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