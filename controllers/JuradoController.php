<?php

namespace app\controllers;

use app\models\Jurado;
use app\models\JuradoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JuradoController implements the CRUD actions for Jurado model.
 */
class JuradoController extends Controller
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
     * Lists all Jurado models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new JuradoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Jurado model.
     * @param int $jur_codigo Jur Codigo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($jur_codigo)
    {
        return $this->render('view', [
            'model' => $this->findModel($jur_codigo),
        ]);
    }

    /**
     * Creates a new Jurado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Jurado();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save(false)) {
                return $this->redirect(['view', 'jur_codigo' => $model->jur_codigo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Jurado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $jur_codigo Jur Codigo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($jur_codigo)
    {
        $model = $this->findModel($jur_codigo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'jur_codigo' => $model->jur_codigo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Jurado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $jur_codigo Jur Codigo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($jur_codigo)
    {
        $this->findModel($jur_codigo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Jurado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $jur_codigo Jur Codigo
     * @return Jurado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($jur_codigo)
    {
        if (($model = Jurado::findOne(['jur_codigo' => $jur_codigo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
