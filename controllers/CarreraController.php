<?php

namespace app\controllers;

use app\models\CarCarrera;
use app\models\CarreraSearch;
use app\controllers\CoreController;
use Exception;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * CarreraController implements the CRUD actions for CarCarrera model.
 */
class CarreraController extends Controller
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
     * Lists all CarCarrera models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CarreraSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CarCarrera model.
     * @param int $car_codigo Car Codigo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($car_codigo)
    {
        return $this->render('view', [
            'model' => $this->findModel($car_codigo),
        ]);
    }

    /**
     * Creates a new CarCarrera model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CarCarrera();
        if ($model->load($this->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->car_codigo = $this->CreateCode();
                $model->car_fecha_ing = date('Y-m-d H:i:s');
                $model->car_fecha_mod = date('Y-m-d H:i:s');
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
            return $this->redirect(['view', 'car_codigo' => $model->car_codigo]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    //FUNCION PARA CREAR ID DE Carreras
    function CreateCode()
    {
        $carrera = CarCarrera::find()->orderBy(['car_codigo' => SORT_DESC])->one();
        if (empty($carrera->car_codigo)) $codigo = 0;
        else $codigo = $carrera->car_codigo;

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
     * Updates an existing CarCarrera model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $car_codigo Car Codigo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($car_codigo)
    {
        $model = $this->findModel($car_codigo);

        if ($model->load($this->request->post())) {
            $model->car_fecha_mod = date('Y-m-d H:i:s');

            if (!$model->save()) {
                print_r($model->getErrors());
                die();
            }

            return $this->redirect(['view', 'car_codigo' => $model->car_codigo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CarCarrera model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $car_codigo Car Codigo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($car_codigo)
    {
        $this->findModel($car_codigo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CarCarrera model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $car_codigo Car Codigo
     * @return CarCarrera the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($car_codigo)
    {
        if (($model = CarCarrera::findOne(['car_codigo' => $car_codigo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
