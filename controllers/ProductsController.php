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
use app\models\Cat1;
use app\models\Cat2;
use app\models\Cat3;


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
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
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
            
            // get the contents of the multiple select items.
            // they come in
         
            if (!empty($post['Products']['p_cat3'])) {
                $post['Products']['p_cat3'] = implode(',', $post['Products']['p_cat3']);
            }

            if (!empty($post['Products']['p_cat2'])) {
                $post['Products']['p_cat2'] = implode(',', $post['Products']['p_cat2']);
            }

            if (!empty($post['Products']['p_cat1'])) {
                $post['Products']['p_cat1'] = implode(',', $post['Products']['p_cat1']);
            }

            if (!empty($post['Products']['p_color'])) {
                $post['Products']['p_color'] = serialize($post['Products']['p_color']);
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



                // upload image to folder
                if (!empty(UploadedFile::getInstance($model, 'img1'))) {
                    $model->imageFile1 = UploadedFile::getInstance($model, 'img1'); // get image

                    // get a random number as the image name
                    $img_name1 = $post['Products']['p_name'].'_'.mt_rand();
                    $img_path1 = $model->products_directory.$img_name1;
                    // save it to the variable 
                    $product_img_path1           = $img_path1.'.'.$model->imageFile1->extension;
                    $model->img1                 =  $product_img_path1;


                    // upload image to folder
                    if (!$model->upload1($img_name1)) { 

                    // todo
                    // find a way to add errrs to an array
                    }

                }else{
                    // $model->img = "img/products/no-image.jpg";
                    $no_image_arrayName1 = array("img/products/no-image.jpg");
                    $model->img1         = serialize($no_image_arrayName1);
                }

                // slug
                $model->p_name = str_replace("-", " ", $model->p_name);


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
        $images1    = $model->img1;

        // Explode the category strings to and array

        (empty($model->p_cat3) ?  $model->p_cat3: $model->p_cat3 = explode(",", $model->p_cat3));
        (empty($model->p_cat2) ?  $model->p_cat2: $model->p_cat2 = explode(",", $model->p_cat2));
        (empty($model->p_cat1) ?  $model->p_cat1: $model->p_cat1 = explode(",", $model->p_cat1));
        (empty($model->p_color) ?  $model->p_color: $model->p_color = unserialize($model->p_color));
        // $model->p_cat3 = explode(",", $model->p_cat3);
        // $model->p_cat2 = explode(",", $model->p_cat2);
        // $model->p_cat1 = explode(",", $model->p_cat1);

        if (Yii::$app->request->post()) {

            $post = Yii::$app->request->post();
            
            //    echo "<pre>";
            // print_r($post);
            // echo "<pre/>";
            // exit();

            if (!empty($post['Products']['p_cat3'])) {
                $post['Products']['p_cat3'] = implode(',', $post['Products']['p_cat3']);
            }

            if (!empty($post['Products']['p_cat2'])) {
                $post['Products']['p_cat2'] = implode(',', $post['Products']['p_cat2']);
            }

            if (!empty($post['Products']['p_cat1'])) {
                $post['Products']['p_cat1'] = implode(',', $post['Products']['p_cat1']);
            }

            if (!empty($post['Products']['p_color'])) {
                $post['Products']['p_color'] = serialize($post['Products']['p_color']);
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
                        $re_serialized_p_images = serialize(array_values($unserialized_p_images));
                        // Upload the image to the directory
                        $model->img = $re_serialized_p_images;
                    // exit();
                    }else{
                        // if there is no image to be saved, set the previous image path as the model attribute value. 
                        $model->img=$serialized_p_images;
                    }




                    // GET THE IMAGE UPLOADED
                    $image_instance1= $model->imageFile1 = UploadedFile::getInstance($model, 'img1'); // get image

                    // UPLOAD IMAGE TO FOLDER
                    if ($image_instance1) {
                      
                        // $img_name = mt_rand(); // get a random number as the image name
                        $img_name1 = $post['Products']['p_name'].'_'.mt_rand();
                        // Create the directory path where the image will be saved to
                        $img_path1 = $model->products_directory.$img_name1;
                        // save the directory path created above to the model to be saved
                        $uploaded_image_path1 = $img_path1.'.'.$model->imageFile1->extension;
                        // create into array

                        if ($model->upload1($img_name1) === false) { 
                            echo "アップロードできませんでした。";
                            exit();
                        }
                      
                        $model->img1 = $uploaded_image_path1;
                    // exit();
                    }else{
                        // if there is no image to be saved, set the previous image path as the model attribute value. 
                        $model->img1=$images1;
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


    

    // get the products in a catrgory 
    // i.e. cat 3
    public function actionCategory($cat)
    {
        $this->layout = "page";

        $z = array();
       
        //get cat name
        $modelCat3 = new Cat3();
        $cat_name = $modelCat3 -> getName($cat);
        // go through all products
        // search for the cat in the cat3 section

        $modelProd = new Products();
        $model = Products::find()->all();
        
        foreach ($model as $key => $value) {
            $c= $value->p_cat3;
            // explode the string and change them into integers
            $c = array_map('intval', explode(',', $c));


            // check if the category given is in the list of categories given
            if (in_array($cat, $c)) 
              { 
                    $calcDis        = $modelProd->calcDiscount($value->p_discount, $value->p_price);
                    //calculate discount
                    // $modelProd->p_price = $calcDis['p_price'];
                    $z[] = array( 
                                    'id'        => $value->id,
                                    'p_name'        => $value->p_name,
                                    'p_company'        => $value->p_company,
                                    'p_key_features' => $value->p_key_features,
                                    'p_price'       =>$calcDis['p_price'],
                                    'oldprice'       => $calcDis['old_price'],
                                    'p_discount'    => $value->p_discount,
                                    'p_cat1'        => $value->p_cat1,
                                    'p_cat2'        => $value->p_cat2,
                                    'p_cat3'        => $value->p_cat3,
                                    'p_sizes'       => $value->p_sizes,
                                    'p_url'         => $value->p_url,
                                    'p_color'       => $value->p_color,
                                    'p_description' => $value->p_description,
                                    'slug'          => $value->slug,
                                    'img'           => $value->img1,
                                    'stock'         => (empty($value->p_stock) ?  'Not in stock': 'In stock'),
                                    // 'img'           => explode(",", $value->img),
                                    // 'img'           => unserialize($value->img),
                    );
              } 
            
        }
        return $this->render('cat', [
            'z' => $z,
            'cat_name' => $cat_name->name,
            // 'cat1' => $cat1,
            // 'cat2' => $cat2,
            // 'cat3' => $cat3,
            // 'data' => $data,
        ]);
    }

    

    public function actionCategory9($cat)
    {
        $this->layout = "page";
       
       
        //get cat name
        $modelCat3 = new Cat3();
        $cat_name = $modelCat3 -> getName($cat);
        // go through all products
        // search for the cat in the cat3 section

        $modelProd = new Products();
        // $model = Products::find();
        $model2 = Products::find()->all();

        // $model->Where(['like', 'p_cat3', 5]);


        $model = Products::find()
        ->where(['LIKE', 'p_cat3', 05])
        ->all();

        echo "<pre>";
        print_r($model);
        echo "<pre/>";
        exit();

        exit();
        
        foreach ($model as $key => $value) {
           $c= $value->p_cat3;
           // explode the string and change them into integers
            $c = array_map('intval', explode(',', $c));


            // check if the category given is in the list of categories given
            if (in_array($cat, $c)) 
              { 
                    $calcDis        = $modelProd->calcDiscount($value->p_discount, $value->p_price);
                    //calculate discount
                    // $modelProd->p_price = $calcDis['p_price'];
                    $z[] = array( 
                                    'id'        => $value->id,
                                    'p_name'        => $value->p_name,
                                    'p_company'        => $value->p_company,
                                    'p_key_features' => $value->p_key_features,
                                    'p_price'       =>$calcDis['p_price'],
                                    'oldprice'       => $calcDis['old_price'],
                                    'p_discount'    => $value->p_discount,
                                    'p_cat1'        => $value->p_cat1,
                                    'p_cat2'        => $value->p_cat2,
                                    'p_cat3'        => $value->p_cat3,
                                    'p_sizes'       => $value->p_sizes,
                                    'p_url'         => $value->p_url,
                                    'p_color'       => $value->p_color,
                                    'p_description' => $value->p_description,
                                    'slug'          => $value->slug,
                                    'img'           => $value->img1,
                                    'stock'         => (empty($value->p_stock) ?  'Not in stock': 'In stock'),
                                    // 'img'           => explode(",", $value->img),
                                    // 'img'           => unserialize($value->img),
                    );
              } 
            
        }
        return $this->render('cat', [
            'z' => $z,
            'cat_name' => $cat_name->name,
            // 'cat1' => $cat1,
            // 'cat2' => $cat2,
            // 'cat3' => $cat3,
            // 'data' => $data,
        ]);
    }


      
    // public function actionSingle()
    public function actionSingle($slug)
    {
        $slug = explode('-', $slug);
        $id = $slug[0];
        $this->layout = "single";
        $model = $this->findModel($id);
        // $old_price = FALSE;

        $pimages=unserialize($model->img);
        
        (empty($model->p_color) ?  $colors=FALSE: $colors = unserialize($model->p_color));

        //calculate discount
        $calcDis = $model->calcDiscount($model->p_discount, $model->p_price);
        $model->p_price = $calcDis['p_price'];
        //stock
        $stock = (empty($model->p_stock) ?  'Not in stock': 'In stock');


        return $this->render('single', [
                'model' => $model,
                'pimages' => $pimages,
                'old_price' => $calcDis['old_price'],
                'colors' => $colors,
                'stock' => $stock,
        ]);
    }

} // end class
