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
                <h3 class="card-title"><?= $model->ase_nombres ?></h3>
            </div>
            <div class="card-body">
            <table class="table table-sm table-striped table-hover table-bordered">
                    <tr>
                        <td width="16%"><b>Nombre:</b></td>
                        <td width="34%"> <?= $model->ase_nombres ?></td>
                        <td width="16%"><b>Apellido: </b></td>
                        <td width="34%"> <?= $model->ase_apellido ?></td>
                    </tr>
                    <tr>
                        <td><b>Codigo: </b></td>
                        <td><?= $model->ase_codigo ?></td>
                        <td><b>Carnet: </b></td>
                        <td><?= $model->ase_carnet ?></td>
                    </tr>
                    <tr>
                        <td><b>Telefono: </b></td>
                        <td><?= $model->ase_telefono ?></td>
                        <td><b>Direccion: </b></td>
                        <td><?= $model->ase_direccion ?></td>
                    </tr>
                    <tr>
                        <td><b>Especialidad: </b></td>
                        <td><?= $model->ase_especialidad ?></td>
                        <td><b>Correo: </b></td>
                        <td><?= $model->ase_email ?></td>
                    </tr>
                    <tr>
                        <td><b>Fecha creacion:</b></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($model->ase_fecha_ing)) ?></td>
                        <td><b>Fecha modificacion:</b></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($model->ase_fecha_mod)) ?></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                    <?php echo Html::a('<i class="fa fa-edit"></i> Editar', ['update', 'ase_codigo' => $model->ase_codigo], ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit record']) ?>
                <?php echo Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Cancelar']) ?>
            </div>
        </div>
    </div>
</div>
