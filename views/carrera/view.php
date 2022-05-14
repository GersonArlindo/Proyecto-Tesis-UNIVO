<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TinTipoInvestigacion */

$this->title = $model->car_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Carreras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $model->car_nombre ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <tr>
                        <th width="16%"><b>Codigo:</b></th>
                        <td width="34%"><?= $model->car_codigo ?></td>
                        <th width="16%"><b>Nombre:</b></th>
                        <td width="34%"> <?= $model->car_nombre ?></td>
                    </tr>
                    <tr>
                        <td><b>Facultad:</b></td>
                        <td><?= $model->carCodfac->fac_nombre ?></td>
                    </tr>
                    <tr>
                        <td><b>Fecha creacion:</b></td>
                        <td><?= date('d-m-Y H:i:m', strtotime($model->car_fecha_ing)) ?></td>
                        <td><b>Fecha modificacion:</b></td>
                        <td><?= date('d-m-Y H:i:m', strtotime($model->car_fecha_mod)) ?></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                    <?php echo Html::a('<i class="fa fa-edit"></i> Editar', ['update', 'car_codigo' => $model->car_codigo], ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit record']) ?>
                <?php echo Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Cancelar']) ?>
            </div>
        </div>
    </div>
</div>