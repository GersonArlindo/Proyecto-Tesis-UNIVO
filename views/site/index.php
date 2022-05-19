<?php
use yii\helpers\Url;
Yii::$app->language = 'es_ES';
$this->title = 'Dashboard';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <div class="row">
        <a href="<?php echo Url::toRoute(['/alumnos/index']); ?>" class="text-white">
          <div class="enlace col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>&nbsp;&nbsp;</h3>
                    <p> ESTUDIANTES</p>
                </div>
                <div class="icon">
                <i class="fa fa-graduation-cap"></i>
                </div>
                <p class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></p>
            </div>
        </a> 
        </div>
        <a href="<?php echo Url::toRoute(['/asesores/index']); ?>" class="text-white">
            <div class="enlace col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4" ">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>&nbsp;&nbsp;</h3>
                        <p> ASESORES </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                <p class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></p>
            </div>
        </a> 
        </div>
        <a href="<?php echo Url::toRoute(['/jurado/index']); ?>" class="text-white">
            <div class="enlace col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4" >
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>&nbsp;&nbsp;</h3>
                        <p> JURADOS </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <p class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></p>
                </div>
                </a>
            </div>
        
    </div>
    <div class="row">
        <a href="<?php echo Url::toRoute(['/-/index']); ?>" class="text-white">
        <div class="enlace col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4" >
            <div class="small-box bg-fuchsia">
                <div class="inner">
                    <h3>&nbsp;&nbsp;</h3>
                    <p> GRUPOS DE TESIS </p>
                </div>
                <div class="icon">
                <i class="fa fa-users"></i>
                </div>
                <p class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></p>
            </div>
            </a>
        </div>
        <a href="<?php echo Url::toRoute(['/usuarios/index']); ?>" class="text-white">
        <div class="enlace col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4" >
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>&nbsp;&nbsp;</h3>
                    <p class="text-white"> USUARIOS </p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-friends"></i>
                </div>
                <p class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></p>
            </div>
        </a>
        </div>
        
    </div>
</div>