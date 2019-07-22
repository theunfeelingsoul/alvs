<?php

namespace app\controllers;
use Yii;
use app\models\Alvsusers;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class CustomerController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }



    public function actionCreate()
    {
    	$this->layout = "page";

    	$model = new Alvsusers();


        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionAccount()
    {
        $this->layout = "page";

        // $model = new Model();

        $id = Yii::$app->user->identity->id;
        // $model = $this->findModel($id);
        $model = Alvsusers::find()
        ->where(['id' => $id])
        ->one(); 



        return $this->render('account', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing Alvsusers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {
        $this->layout = "page";
        if (Yii::$app->request->post()) {
           
            $id = $_POST['Alvsusers']['id'];


            $model = Alvsusers::findOne($id);
           
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['customer/account']);
            }
            // echo "<pre>";
            // print_r($model ->errors);
            // echo "<pre/>";
        }
    }



















} //  end class
