<?php

Yii::$app->formatter->locale = 'en-US';
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Jurado */

$this->title = "Detalle";
$this->params['breadcrumbs'][] = ['label' => 'Jurados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $model->jur_nombres ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <tr>
                        <td><b>Codigo:</b></td>
                        <td colspan="4"><?= $model->jur_codigo ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><b>Nombres:</b></td>
                        <td width="35%"> <?= $model->jur_nombres ?></td>
                        <td width="15%"><b>Apellidos:</b></td>
                        <td width="35%"> <?= $model->jur_apellidos ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><b>Especialidad:</b></td>
                        <td width="35%"> <?= $model->jur_especialidad ?></td>
                        <td width="15%"><b>Rol:</b></td>
                        <td width="35%"> <?= $model->jur_rol ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><b>Carnet:</b></td>
                        <td width="35%"> <?= $model->jur_carnet ?></td>
                        <td width="15%"><b>Teléfono:</b></td>
                        <td width="35%"> <?= $model->jur_telefono ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><b>Dirección:</b></td>
                        <td width="35%"> <?= $model->jur_direccion ?></td>
                        <td width="15%"><b>Email:</b></td>
                        <td width="35%"> <?= $model->jur_email ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><b>Fecha creación:</b></td>
                        <td width="35%"><?= date('d-m-Y H:i:m', strtotime($model->jur_fecha_ing)) ?></td>
                        <td width="15%"><b>Fecha modificación:</b></td>
                        <td width="35%"><?= date('d-m-Y H:i:m', strtotime($model->jur_fecha_mod)) ?></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                <?php echo Html::a('<i class="fa fa-edit"></i> Editar', ['update', 'jur_codigo' => $model->jur_codigo], ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit record']) ?>
                <?php echo Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Cancelar']) ?>
            </div>
        </div>
    </div>
</div>

