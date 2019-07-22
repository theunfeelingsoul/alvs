<?php

namespace app\controllers;

use Yii;
use app\models\Products;
use app\models\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\helpers\Url;


/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
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

            // 'access' => [
            //     'class' => AccessControl::className(),
            //     'only' => ['login', 'logout', 'signup'],
            //     'rules' => [
            //         [
            //             'allow' => true,
            //             'actions' => ['login', 'signup','index'],
            //             'roles' => ['?'],
            //         ],
            //         [
            //             'allow' => true,
            //             'actions' => ['index'],
            //             'roles' => ['@'],
            //         ],
            //     ],
            // ],
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = "main";
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = "main";
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = "main";
        $model = new Products();



        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if (Yii::$app->request->post()) {

            $post = Yii::$app->request->post();
            
            if (!empty($post['Products']['p_cat3'])) {
                $post['Products']['p_cat3'] = implode(',', $post['Products']['p_cat3']);
            }

            if (!empty($post['Products']['p_cat2'])) {
                $post['Products']['p_cat2'] = implode(',', $post['Products']['p_cat2']);
            }

            if (!empty($post['Products']['p_cat1'])) {
                $post['Products']['p_cat1'] = implode(',', $post['Products']['p_cat1']);
            }


            

          
            if ($model->load($post)) {


                // upload image to folder
                if (!empty(UploadedFile::getInstance($model, 'img'))) {
                    $model->imageFile = UploadedFile::getInstance($model, 'img'); // get image

                    // get a random number as the image name
                    $img_name = $post['Products']['p_name'].'_'.mt_rand();
                    $img_path = $model->products_directory.$img_name;
                    // save it to the variable 
                    $product_img_path           = $img_path.'.'.$model->imageFile->extension;
                    $product_img_path_arrayName = array($product_img_path);
                    $model->img                 = serialize($product_img_path_arrayName);


                    // upload image to folder
                    if (!$model->upload($img_name)) { 

                    // todo
                    // find a way to add errrs to an array
                    }

                }else{
                    // $model->img = "img/products/no-image.jpg";
                    $no_image_arrayName = array("img/products/no-image.jpg");
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
         
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Products model.
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
        $this->layout = "main";
        $model                  = $this->findModel($id);
        $serialized_p_images    = $model->img;

        // Explode the category strings to and array

        (empty($model->p_cat3) ?  $model->p_cat3: $model->p_cat3 = explode(",", $model->p_cat3));
        (empty($model->p_cat2) ?  $model->p_cat2: $model->p_cat2 = explode(",", $model->p_cat2));
        (empty($model->p_cat1) ?  $model->p_cat1: $model->p_cat1 = explode(",", $model->p_cat1));
        // $model->p_cat3 = explode(",", $model->p_cat3);
        // $model->p_cat2 = explode(",", $model->p_cat2);
        // $model->p_cat1 = explode(",", $model->p_cat1);

        if (Yii::$app->request->post()) {

            $post = Yii::$app->request->post();
            
            if (!empty($post['Products']['p_cat3'])) {
                $post['Products']['p_cat3'] = implode(',', $post['Products']['p_cat3']);
            }

            if (!empty($post['Products']['p_cat2'])) {
                $post['Products']['p_cat2'] = implode(',', $post['Products']['p_cat2']);
            }

            if (!empty($post['Products']['p_cat1'])) {
                $post['Products']['p_cat1'] = implode(',', $post['Products']['p_cat1']);
            }

                if ($model->load($post)) {

                    // GET THE IMAGE UPLOADED
                    $image_instance= $model->imageFile = UploadedFile::getInstance($model, 'img'); // get image

                    // UPLOAD IMAGE TO FOLDER
                    if ($image_instance) {
                      
                        // $img_name = mt_rand(); // get a random number as the image name
                        $img_name = $post['Products']['p_name'].'_'.mt_rand();
                        // Create the directory path where the image will be saved to
                        $img_path = $model->products_directory.$img_name;
                        // save the directory path created above to the model to be saved
                        $uploaded_image_path = $img_path.'.'.$model->imageFile->extension;
                        // create into array

                        if ($model->upload($img_name) === false) { 
                            echo "アップロードできませんでした。";
                            exit();
                        }
                        //explode present images
                        // $model_array_images = explode(" ", $model_comma_seperated_images);
                        $unserialized_p_images = unserialize($serialized_p_images);
                        // push new image into array
                        array_push($unserialized_p_images,$uploaded_image_path);
                        //impode array to string
                        // $imploded_model_array_images = implode(",", $model_array_images);
                        $re_serialized_p_images = serialize($unserialized_p_images);
                        // Upload the image to the directory
                        $model->img = $re_serialized_p_images;
                    // exit();
                    }else{
                        // if there is no image to be saved, set the previous image path as the model attribute value. 
                        $model->img=$serialized_p_images;
                    }

                   

                    // save model
                    if ($model->save(false)) {
                    
                        // return $this->redirect(['view', 'id' => $model->id]);
                        return $this->redirect(['products/view', 'id' => $model->id]);
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
                'xx' => unserialize($serialized_p_images)  ,
            ]);
    }

    // delete image in update product
    public function actionDeleteimg($id)
    {
        // explode the value
        // it has the image key position and the id or the record
        $id = explode("-", $id);
        // get data from db
        $model = Products::find()
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


    public function actionCategory($cat=5)
    {
        $this->layout = "page";

        // go through all products
        // search for the cat in the cat3 section

        $model = Products::find()
        // ->select('p_cat3')
        // ->indexBy('id')  
        ->all();
        
        foreach ($model as $key => $value) {
           echo  $c= $value->p_cat3;

            // $c = explode(',', $c);
            $c = array_map('intval', explode(',', $c));

            // echo "<pre>";
            // print_r($c);
            // echo "<pre/>";

            // var_dump($c);
            // exit();


            // $z=array();
            if (in_array($cat, $c)) 
              { 
                echo "dcd";
                // $found_p_cat3[] = $p_cat3; 
                    $z[] = array( 
                                    'p_name'        => $value->p_name,
                                    'p_company'        => $value->p_company,
                                    'p_key_features' => $value->p_key_features,
                                    'p_price'       => $value->p_price,
                                    'p_discount'    => $value->p_discount,
                                    'p_cat1'        => $value->p_cat1,
                                    'p_cat2'        => $value->p_cat2,
                                    'p_cat3'        => $value->p_cat3,
                                    'p_sizes'       => $value->p_sizes,
                                    'p_url'         => $value->p_url,
                                    'p_color'       => $value->p_color,
                                    'p_description' => $value->p_description,
                                    'slug'          => $value->slug,
                                    // 'img'           => $value->img,
                                    'img'           => explode(",", $value->img),
                    );
              } 
            
        }

        // echo "<pre>";
        // print_r($z);
        // echo "<pre/>";
        // exit();
        return $this->render('cat', [
            'z' => $z,
        ]);
    }


    // public function actionSingle()
    public function actionS()
    {
        $id=1;
        $this->layout = "single";
        $model = $this->findModel(13);

        $pimages = explode(",", $model->img);

        return $this->render('single', [
                'model' => $model,
                'pimages' => $pimages,
        ]);
    }

    /**
     * Deletes an existing Products model.
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
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionDetail($slug=false)
    {
        $model = new Products();
        $this->layout = "page";
    
        return $this->render('detail', [
            'model' => $model,
        ]);
    }


} // end class
