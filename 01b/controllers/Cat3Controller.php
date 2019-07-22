<?php

namespace app\controllers;

use Yii;
use app\models\Cat3;
use app\models\Cat3Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Cat3Controller implements the CRUD actions for Cat3 model.
 */
class Cat3Controller extends Controller
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
     * Lists all Cat3 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Cat3Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cat3 model.
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
     * Creates a new Cat3 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate()
    // {
    //     $model = new Cat3();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }

    public function actionCreate()
    {
        $model = new Cat3();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }


        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if (Yii::$app->request->post()) {

            $post = Yii::$app->request->post();
            
            if (!empty($post['Cat3']['cat2_id'])) {
                $post['Cat3']['cat2_id'] = implode(',', $post['Cat3']['cat2_id']);
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
     * Updates an existing Cat3 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }

    //     return $this->render('update', [
    //         'model' => $model,
    //     ]);
    // }

     public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        // Explode the category strings to and array
        (empty($model->cat2_id) ?  $model->cat2_id: $model->cat2_id = explode(",", $model->cat2_id));

        if (Yii::$app->request->post()) {

            $post = Yii::$app->request->post();

          
            
            if (!empty($post['Cat3']['cat2_id'])) {
                
                $post['Cat3']['cat2_id'] = implode(',',$post['Cat3']['cat2_id']);

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
     * Deletes an existing Cat3 model.
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
     * Finds the Cat3 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cat3 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cat3::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
