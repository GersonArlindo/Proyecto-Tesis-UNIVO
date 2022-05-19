<?php

namespace app\controllers;

use app\models\AseAsesores;
use app\models\AsesoresSearch;
use Exception;
use Yii;
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
                    'class' => VerbFilter::class,
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

        if ($model->load($this->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->ase_codigo = $this->CreateCode();
                $model->ase_fecha_ing = date('Y-m-d H:i:s');
                $model->ase_fecha_mod = date('Y-m-d H:i:s');
                $model->ase_codusr = \Yii::$app->user->identity->id;
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
            return $this->redirect(['view', 'ase_codigo' => $model->ase_codigo]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    //FUNCION PARA CREAR ID DE ASESORES
    function CreateCode()
    {
        $asesor = AseAsesores::find()->orderBy(['ase_codigo' => SORT_DESC])->one();
        if (empty($asesor->ase_codigo)) $codigo = 0;
        else $codigo = $asesor->ase_codigo;

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
