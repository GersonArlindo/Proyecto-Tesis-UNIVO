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
                        <td width="25%"><b>Codigo:</b></td>
                        <td width="25%"><?= "AL-".$model->alm_codigo ?></td>
                        <td width="25%"><b>Carrera:</b></td>
                        <td width="25%"> <?= $model->almCodcar->car_nombre ?></td>
                    </tr>
                    <tr>
                        <td><b>Nombre:</b></td>
                        <td><?= $model->alm_nombres ?></td>
                        <td><b>Apellido:</b></td>
                        <td> <?= $model->alm_apellidos ?></td>
                    </tr>
                    <tr>
                        <td><b>Telefono:</b></td>
                        <td><?= $model->alm_telefono ?></td>
                        <td><b>Carnet:</b></td>
                        <td> <?= $model->alm_carnet ?></td>
                    <tr>
                        <td><b>Direccion:</b></td>
                        <td> <?= $model->alm_direccion ?></td>
                        <td><b>Email:</b></td>
                        <td><?= '<a href="mailto:' . $model->alm_email . '">' . $model->alm_email . '</a>' ?></td>
                    </tr>
                    <tr>
                        <td><b>Fecha creacion:</b></td>
                        <td><?= date('d-m-Y H:i:m', strtotime($model->alm_fecha_ing)) ?></td>
                        <td><b>Fecha modificacion:</b></td>
                        <td><?= date('d-m-Y H:i:m', strtotime($model->alm_fecha_mod)) ?></td>
                    </tr>
                    <tr>
                        <td><b>Usuario:</b></td>
                        <td> <?= $model->alm_codusr ?></td>
                        <td><b>Año:</b></td>
                        <td> <?= $model->alm_anio ?></td>
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