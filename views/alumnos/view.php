<?php

use yii\helpers\Html;

Yii::$app->formatter->locale = 'en-US';
$this->title = 'Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $model->alm_nombres ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <tr>
                        <td width="16%"><b>Codigo:</b></td>
                        <td width="34%"><?= $model->alm_codigo ?></td>
                        <td width="16%"><b>Carrera:</b></td>
                        <td width="34%"> <?= $model->almCodcar->car_nombre ?></td>
                        <td width="16%"><b>Ciclo:</b></td>
                        <td width="34%"> <?= $model->almCodcil->cil_nombre ?></td>
                    </tr>
                    <tr>
                        <td width="16%"><b>Nombre:</b></td>
                        <td width="34%"><?= $model->alm_nombres ?></td>
                        <td width="16%"><b>Apellido:</b></td>
                        <td width="34%"> <?= $model->alm_apellidos ?></td>
                        <td width="16%"><b>Año:</b></td>
                        <td width="34%"> <?= $model->alm_anio ?></td>
                    </tr>
                    <tr> 
                        <td width="16%"><b>Telefono:</b></td>
                        <td width="34%"><?= $model->alm_telefono ?></td>
                        <td width="16%"><b>Email:</b></td>
                        <td width="34%"> <?= $model->alm_email ?></td>
                    </tr>
                    <tr>
                        <td width="16%"><b>Email:</b></td>
                        <td width="34%"> <?= $model->alm_direccion ?></td>
                    </tr>
                    <tr>
                        <td><b>Fecha creacion:</b></td>
                        <td><?= date('d-m-Y H:i:m', strtotime($model->alm_fecha_ing)) ?></td>
                        <td><b>Fecha modificacion:</b></td>
                        <td><?= date('d-m-Y H:i:m', strtotime($model->alm_fecha_mod)) ?></td>
                        <td width="16%"><b>Usuario:</b></td>
                        <td width="34%"> <?= $model->alm_codusr ?></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                    <?php echo Html::a('<i class="fa fa-edit"></i> Editar', ['update', 'alm_codigo' => $model->alm_codigo], ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit record']) ?>
                <?php echo Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Cancelar']) ?>
            </div>
        </div>
    </div>
</div>
