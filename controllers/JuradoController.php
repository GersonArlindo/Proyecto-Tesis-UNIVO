<?php

namespace app\controllers;

use app\models\Jurado;
use app\models\JuradoSearch;
use Exception;
use Yii;
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
                    'class' => VerbFilter::class,
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

        if ($model->load($this->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->jur_codigo = $this->CreateCode();
                $model->jur_fecha_ing = date('Y-m-d H:i:s');
                $model->jur_fecha_mod = date('Y-m-d H:i:s');
                $model->jur_codusr = \Yii::$app->user->identity->id;
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
            return $this->redirect(['view', 'jur_codigo' => $model->jur_codigo]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    //FUNCION PARA CREAR ID DE ALUMNOS
    function CreateCode()
    {
        $jurado = Jurado::find()->orderBy(['jur_codigo' => SORT_DESC])->one();
        if (empty($jurado->jur_codigo)) $codigo = 0;
        else $codigo = $jurado->jur_codigo;

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
