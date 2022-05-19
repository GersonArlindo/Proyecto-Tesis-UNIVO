<?php

namespace app\controllers;

use Yii;
use app\models\Grupo;
use app\models\CarCarrera;
use app\models\GrupoSearch;
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
                    'class' => VerbFilter::className(),
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
        return $this->render('view', [
            'model' => $this->findModel($grp_codigo),
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
            return $this->redirect(['view', 'grp_codigo' => $model->grp_codigo]);
        }
        $carreras = CarCarrera::find()->all();
        $listaCarreras = ArrayHelper::map($carreras, 'car_codigo', 'car_nombre');
        return $this->render('update', [
            'model' => $model,
            'carreras' => $listaCarreras
        ]);
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
