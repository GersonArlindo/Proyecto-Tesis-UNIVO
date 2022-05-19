<?php

namespace app\controllers;

use app\models\FacFacultad;
use app\models\FacultadSearch;
use Exception;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FacultadController implements the CRUD actions for FacFacultad model.
 */
class FacultadController extends Controller
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
     * Lists all FacFacultad models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FacultadSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FacFacultad model.
     * @param int $fac_codigo Fac Codigo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($fac_codigo)
    {
        return $this->render('view', [
            'model' => $this->findModel($fac_codigo),
        ]);
    }

    /**
     * Creates a new FacFacultad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new FacFacultad();
        if ($model->load($this->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->fac_codigo = $this->CreateCode();
                $model->fac_fecha_ing = date('Y-m-d H:i:s');
                $model->fac_fecha_mod = date('Y-m-d H:i:s');
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
            return $this->redirect(['view', 'fac_codigo' => $model->fac_codigo]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    //FUNCION PARA CREAR ID DE Facultades
    function CreateCode()
    {
        $facultad = FacFacultad::find()->orderBy(['fac_codigo' => SORT_DESC])->one();
        if (empty($facultad->fac_codigo)) $codigo = 0;
        else $codigo = $facultad->fac_codigo;

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
     * Updates an existing FacFacultad model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $fac_codigo Fac Codigo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($fac_codigo)
    {
        $model = $this->findModel($fac_codigo);

        if ($model->load($this->request->post())) {
            $model->fac_fecha_mod = date('Y-m-d H:i:s');
            
            if (!$model->save()){
               print_r($model->getErrors());
               die(); 
            }

            return $this->redirect(['view', 'fac_codigo' => $model->fac_codigo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FacFacultad model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $fac_codigo Fac Codigo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($fac_codigo)
    {
        $this->findModel($fac_codigo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FacFacultad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $fac_codigo Fac Codigo
     * @return FacFacultad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($fac_codigo)
    {
        if (($model = FacFacultad::findOne(['fac_codigo' => $fac_codigo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
