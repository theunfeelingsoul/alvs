<?php

namespace app\controllers;

use Yii;
use app\models\Siteimg;
use app\models\SiteimgSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SiteimgController implements the CRUD actions for Siteimg model.
 */
class SiteimgController extends Controller
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
     * Lists all Siteimg models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SiteimgSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Siteimg model.
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
     * Creates a new Siteimg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Siteimg();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }



        if ($model->load(Yii::$app->request->post())) {


            // upload image to folder
            if (!empty(UploadedFile::getInstance($model, 'img'))) {
                $model->imageFile = UploadedFile::getInstance($model, 'img'); // get image

                // get a random number as the image name
                $img_name = mt_rand();
                $img_path = $model->site_img_directory.$img_name;
                // save it to the variable 
                $img_path           = $img_path.'.'.$model->imageFile->extension;
                $img_path_arrayName = array($img_path);
                $model->img                 = serialize($img_path_arrayName);


                // upload image to folder
                if (!$model->upload($img_name)) { 

                // todo
                // find a way to add errrs to an array
                }

            }else{
                // $model->img = "img/products/no-image.jpg";
                $no_image_arrayName = array("img/site-images/no-slide.jpg");
                $model->img         = serialize($no_image_arrayName);
            }
        

            // save model
            if ($model->save(false)) {
               
                // return $this->redirect(['view', 'id' => $model->id]);
               return $this->redirect(['view', 'id' => $model->id]);
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
     * Updates an existing Siteimg model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdates($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

     public function actionUpdate($id)
    {
        // $this->layout   = "admin";
        $model          = $this->findModel($id);
        $model_imgname  = $model->img;
        $serialized_site_images    = $model->img;

        if ($model->load(Yii::$app->request->post())) {

            // GET THE IMAGE UPLOADED
            $image_instance= $model->imageFile = UploadedFile::getInstance($model, 'img'); // get image

            // UPLOAD IMAGE TO FOLDER
            if ($image_instance) {
              
                $img_name = mt_rand(); // get a random number as the image name
                // Create the directory path where the image will be saved to
                $img_path = $model->site_img_directory.$img_name;
                $uploaded_image_path  = $img_path.'.'.$model->imageFile->extension;

                // Upload the image to the directory
                if ($model->upload($img_name) === false) { 
                    echo "アップロードできませんでした。";
                    exit();
                }

                if (!empty($serialized_site_images)) {
                    
                    $unserialized_site_images = unserialize($serialized_site_images);
                    // push new image into array
                    array_push($unserialized_site_images,$uploaded_image_path);
                    //impode array to string
                    // $imploded_model_array_images = implode(",", $model_array_images);
                    $re_serialized_p_images = serialize(array_values($unserialized_site_images));

                     // Upload the image to the directory
                $model->img = $re_serialized_p_images;
                }else{
                     $uploaded_image_path = array($uploaded_image_path);
                    $model->img = serialize($uploaded_image_path);
                }
               
            
            // exit();
            }else{
                // if there is no image to be saved, set the previous image path as the model attribute value. 
                $model->img=$model_imgname;
            }



            // save model
            if ($model->save(false)) {
            
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                echo "<pre>";
                print_r($model->getErrors());
                echo "</pre>";
            }
                
           
        } else {
            return $this->render('update', [
                'model' => $model,
                'xx' => unserialize($serialized_site_images)  ,
            ]);
        }
    }

    /**
     * Deletes an existing Siteimg model.
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




     // delete image in update product
    public function actionDeleteimg($id)
    {
        // explode the value
        // it has the image key position and the id or the record
        $id = explode("-", $id);
        // get data from db
        $model = Siteimg::find()
        ->where(['id' => $id[1]])
        ->one(); 

        // unserialize
        $imgs = unserialize($model->img);
        // delete image in folder
        unlink(Yii::$app->basePath . '/web/' . $imgs[$id[0]]);  
        // unset image in array
        unset($imgs[$id[0]]);
        // serialize and save data
        $model->img = serialize($imgs);

        // save model
        if ($model->save(false)) {
           
           return $this->redirect(['update', 'id' => $id[1]]);
        }else{
            echo "<pre>";
            print_r($model->getErrors());
            echo "</pre>";
        }
    } // end function


    /**
     * Finds the Siteimg model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Siteimg the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Siteimg::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
