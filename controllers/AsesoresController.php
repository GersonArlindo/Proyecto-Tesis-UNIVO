<?php

namespace app\controllers;

use app\models\AseAsesores;
use app\models\AsesoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AsesoresController implements the CRUD actions for AseAsesores model.
 */
class AsesoresController extends Controller
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
     * Lists all AseAsesores models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AsesoresSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AseAsesores model.
     * @param int $ase_codigo Ase Codigo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ase_codigo)
    {
        return $this->render('view', [
            'model' => $this->findModel($ase_codigo),
        ]);
    }

    /**
     * Creates a new AseAsesores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AseAsesores();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ase_codigo' => $model->ase_codigo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AseAsesores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ase_codigo Ase Codigo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ase_codigo)
    {
        $model = $this->findModel($ase_codigo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ase_codigo' => $model->ase_codigo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AseAsesores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ase_codigo Ase Codigo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ase_codigo)
    {
        $this->findModel($ase_codigo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AseAsesores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ase_codigo Ase Codigo
     * @return AseAsesores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ase_codigo)
    {
        if (($model = AseAsesores::findOne(['ase_codigo' => $ase_codigo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
