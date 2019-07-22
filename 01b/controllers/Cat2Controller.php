<?php

namespace app\controllers;

use Yii;
use app\models\Cat2;
use app\models\Cat2Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Cat2Controller implements the CRUD actions for Cat2 model.
 */
class Cat2Controller extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Cat2 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Cat2Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cat2 model.
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
     * Creates a new Cat2 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cat2();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }


        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if (Yii::$app->request->post()) {

            $post = Yii::$app->request->post();
            
            if (!empty($post['Cat2']['cat1_id'])) {
                $post['Cat2']['cat1_id'] = implode(',', $post['Cat2']['cat1_id']);
            }

            if ($model->load($post)) {
                if ($model->save(false)) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }else{
                echo "<pre>";
                print_r($model->getErrors());
                echo "</pre>";
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cat2 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // Explode the category strings to and array
        (empty($model->cat1_id) ?  $model->cat2_id: $model->cat1_id = explode(",", $model->cat1_id));

        if (Yii::$app->request->post()) {

            $post = Yii::$app->request->post();

          
            
            if (!empty($post['Cat2']['cat1_id'])) {
                
                $post['Cat2']['cat1_id'] = implode(',',$post['Cat2']['cat1_id']);

            }

            if ($model->load($post)) {
                // save model
                    if ($model->save(false)) {
                    
                        // return $this->redirect(['view', 'id' => $model->id]);
                        return $this->redirect(['view', 'id' => $model->id]);
                        exit();
                    }else{
                        echo "<pre>";
                        print_r($model->getErrors());
                        echo "</pre>";
                    }
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cat2 model.
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
     * Finds the Cat2 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cat2 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cat2::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
