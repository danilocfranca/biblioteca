<?php

namespace app\modules\admin\controllers;

use app\models\Custo;
use app\models\Livro;
use app\models\Locatario;
use Yii;
use app\models\Emprestimo;
use app\models\EmprestimoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmprestimoController implements the CRUD actions for Emprestimo model.
 */
class EmprestimoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Emprestimo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmprestimoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Emprestimo model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Emprestimo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Emprestimo();
        $livro = Livro::livrosDisponiveis();
        $locatario = Locatario::find()->all();
        $custo = Custo::find()->where(['descricao' => 'valor_emprestimo'])->one();

        if ($model->load(Yii::$app->request->post())) {
            $model->data_prevista_devolucao = date('Y-m-d', strtotime(str_replace('/','-',$model->data_prevista_devolucao)));
            $model->data_retirada = date('Y-m-d');
            $model->valor_emprestimo = $custo->valor;
            $model->save();

            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'livro' => $livro,
            'locatario' => $locatario,
            'custo' => $custo
        ]);
    }

    /**
     * Updates an existing Emprestimo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $livro = $model->livro;
        $locatario = $model->locatario;
        $custo = Custo::find()->where(['descricao' => 'valor_emprestimo'])->one();
        $multa = Custo::find()->where(['descricao' => 'valor_multa'])->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'livro' => [$livro],
            'locatario' => [$locatario],
            'custo' => $custo,
            'multa' => $multa
        ]);
    }

    /**
     * Deletes an existing Emprestimo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Emprestimo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Emprestimo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Emprestimo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
