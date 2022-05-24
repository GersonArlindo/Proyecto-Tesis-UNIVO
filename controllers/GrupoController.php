<?php

namespace app\controllers;

use app\models\AlmAlumnos;
use app\models\AlumnosSearch;
use Yii;
use app\models\Grupo;
use app\models\CarCarrera;
use app\models\GrupoSearch;
use Exception;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GrupoController implements the CRUD actions for Grupo model.
 */
class GrupoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Grupo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GrupoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

//        print_r($searchModel);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Grupo model.
     * @param int $grp_codigo Grp Codigo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($grp_codigo)
    {
        $searchModel = new AlumnosSearch();
        $searchModel->alm_codgrp = $grp_codigo;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('view', [
            'model' => $this->findModel($grp_codigo),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Grupo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Grupo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('succes', 'Registro creado exitosamente. ');
                return $this->redirect(['view', 'grp_codigo' => $model->grp_codigo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        $carreras = CarCarrera::find()->all();
        $listaCarreras = ArrayHelper::map($carreras, 'car_codigo', 'car_nombre');
        return $this->render('create', [
            'model' => $model,
            'carreras' => $listaCarreras
        ]);
    }

    public function actionCreateModalAlumno($grp_codigo)
    {
        $id = $this->findModel($grp_codigo);
        $model = new AlmAlumnos();

        if ($model->load($this->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->alm_codgrp = $grp_codigo;
                $model->alm_codigo = $this->CreateCode();
                $model->alm_fecha_ing = date('Y-m-d H:i:s');
                $model->alm_fecha_mod = date('Y-m-d H:i:s');
                $model->alm_codusr = \Yii::$app->user->identity->id;
                if (!$model->save()) {
                    throw new Exception(implode('<br />', \yii\helpers\ArrayHelper::getColumn($model->getErrors(), 0, false)));
                }
                $transaction->commit();
            } catch (Exception $e) {
                $transaction->rollBack();
                $controller = Yii::$app->controller->id . "/" . Yii::$app->controller->action->id;
                CoreController::getErrorLog(\Yii::$app->user->identity->id, $e, $controller); 
                return $this->redirect(['index']);
            }
            Yii::$app->session->setFlash('succes', 'Registro creado exitosamente. ');
            return $this->redirect(['view', 'grp_codigo'=>$grp_codigo]);
        } else {
            return $this->renderAjax('_modal_form_alumno', [
                'model' => $model,
                'id' => $id,
            ]);
        }
    }

    /**
     * Updates an existing Grupo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $grp_codigo Grp Codigo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($grp_codigo)
    {
        $model = $this->findModel($grp_codigo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'grp_codigo'=> $model->grp_codigo]);
        }
        $carreras = CarCarrera::find()->all();
        $listaCarreras = ArrayHelper::map($carreras, 'car_codigo', 'car_nombre');
        return $this->render('update', [
            'model' => $model,
            'carreras' => $listaCarreras
        ]);
    }

    //FUNCION PARA CREAR ID DE ALUMNOS
    function CreateCode()
    {
        $estudiante = AlmAlumnos::find()->orderBy(['alm_codigo' => SORT_DESC])->one();
        if (empty($estudiante->alm_codigo)) $codigo = 0;
        else $codigo = $estudiante->alm_codigo;

        $int = intval(preg_replace('/[^0-9]+/', '', $codigo), 10);
        $id = $int + 1;

        $numero = $id;
        $tmp = "";
        if ($id < 10) {
            $tmp .= "000";
            $tmp .= $id;
        } elseif ($id >= 10 && $id < 100) {
            $tmp .= "00";
            $tmp .= $id;
        } elseif ($id >= 100 && $id < 1000) {
            $tmp .= "0";
            $tmp .= $id;
        } else {
            $tmp .= $id;
        }
        $result = str_replace($id, $tmp, $numero);
        return $result;
    }

    /**
     * Deletes an existing Grupo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $grp_codigo Grp Codigo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($grp_codigo)
    {
        $this->findModel($grp_codigo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Grupo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $grp_codigo Grp Codigo
     * @return Grupo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($grp_codigo)
    {
        if (($model = Grupo::findOne(['grp_codigo' => $grp_codigo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
