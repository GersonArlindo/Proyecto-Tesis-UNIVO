<?php

namespace app\controllers;

use app\models\AlmAlumnos;
use app\models\AlumnosSearch;
use Exception;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlumnosController implements the CRUD actions for AlmAlumnos model.
 */
class AlumnosController extends Controller
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
     * Lists all AlmAlumnos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AlumnosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AlmAlumnos model.
     * @param int $alm_codigo Alm Codigo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($alm_codigo)
    {
        return $this->render('view', [
            'model' => $this->findModel($alm_codigo),
        ]);
    }

    /**
     * Creates a new AlmAlumnos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AlmAlumnos();

        if ($model->load($this->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
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
            return $this->redirect(['view', 'alm_codigo' => $model->alm_codigo]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AlmAlumnos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $alm_codigo Alm Codigo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($alm_codigo)
    {
        $model = $this->findModel($alm_codigo);

        if ($model->load($this->request->post())) {
            $model->alm_fecha_mod = date('Y-m-d H:i:s');

            if (!$model->save()) {
                print_r($model->getErrors());
                die();
            }

            return $this->redirect(['view', 'alm_codigo' => $model->alm_codigo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AlmAlumnos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $alm_codigo Alm Codigo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($alm_codigo)
    {
        $this->findModel($alm_codigo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AlmAlumnos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $alm_codigo Alm Codigo
     * @return AlmAlumnos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($alm_codigo)
    {
        if (($model = AlmAlumnos::findOne(['alm_codigo' => $alm_codigo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
