<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TesTesis */

$this->title = $model->tes_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Temas de Tesis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $model->test_tema ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <tr>
                        <td width="16%"><b>Codigo:</b></td>
                        <td width="34%"><?= $model->tes_codigo ?></td>
                        <td width="16%"><b>Nombre:</b></td>
                        <td width="34%"> <?= $model->test_tema ?></td>
                    </tr>
                    <tr>
                        <td><b>Fecha creacion:</b></td>
                        <td><?= date('d-m-Y H:i:m', strtotime($model->tes_fecha_ing)) ?></td>
                        <td><b>Fecha modificacion:</b></td>
                        <td><?= date('d-m-Y H:i:m', strtotime($model->tes_fecha_mod)) ?></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                    <?php echo Html::a('<i class="fa fa-edit"></i> Editar', ['update', 'tes_codigo' => $model->tes_codigo], ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit record']) ?>
                <?php echo Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Cancelar']) ?>
            </div>
        </div>
    </div>
</div>
