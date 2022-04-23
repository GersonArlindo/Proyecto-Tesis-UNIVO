<?php

namespace app\controllers;

use app\models\TinTipoInvestigacion;
use app\models\TinTipoInvestigacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TinTipoInvestigacionController implements the CRUD actions for TinTipoInvestigacion model.
 */
class TinTipoInvestigacionController extends Controller
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
     * Lists all TinTipoInvestigacion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TinTipoInvestigacionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TinTipoInvestigacion model.
     * @param int $tin_codigo Tin Codigo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($tin_codigo)
    {
        return $this->render('view', [
            'model' => $this->findModel($tin_codigo),
        ]);
    }

    /**
     * Creates a new TinTipoInvestigacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TinTipoInvestigacion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'tin_codigo' => $model->tin_codigo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TinTipoInvestigacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $tin_codigo Tin Codigo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($tin_codigo)
    {
        $model = $this->findModel($tin_codigo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'tin_codigo' => $model->tin_codigo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TinTipoInvestigacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $tin_codigo Tin Codigo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($tin_codigo)
    {
        $this->findModel($tin_codigo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TinTipoInvestigacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $tin_codigo Tin Codigo
     * @return TinTipoInvestigacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($tin_codigo)
    {
        if (($model = TinTipoInvestigacion::findOne(['tin_codigo' => $tin_codigo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
