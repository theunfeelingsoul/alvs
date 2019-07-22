<?php

namespace app\models;
use yii\web\UploadedFile;

use Yii;

use app\models\Cat1;
use app\models\Cat2;
use app\models\Cat3;
use app\models\Products;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $p_name
 * @property string $p_company
 * @property string $p_key_features
 * @property string $p_price
 * @property string $p_discount
 * @property string $p_cat1
 * @property string $p_cat2
 * @property string $p_cat3
 * @property string $p_sizes
 * @property string $p_url
 * @property string $p_color
 * @property string $p_description
 * @property string $slug
 * @property string $img
 * @property string $img1
 * @property string $p_stock
 * @property string $p_code
 * @property string $date_created
 */
class Products extends \yii\db\ActiveRecord
{


    public $products_directory = 'img/products/';
    public $imageFile;
    public $imageFile1;


    public $cat1;
    public $cat2;
    public $cat3;
    public $data = array();
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['p_key_features', 'p_description','img','date_created'], 'string'],
            // [['p_cat3'], 'integer'],
            [['p_cat3','p_cat2','p_cat1','p_stock','p_color'], 'integer'],
       
            [['p_name', 'p_company', 'p_price', 'p_discount', 'p_sizes', 'p_url','slug','p_code'], 'string', 'max' => 255],
            // [['p_name', 'p_company', 'p_price', 'p_discount', 'p_cat1', 'p_cat2', 'p_sizes', 'p_url', 'p_color'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'                => 'ID',
            'p_name'            => 'Product Name',
            'p_company'         => 'Product Company',
            'p_key_features'    => 'Key Features',
            'p_price'           => 'Price',
            'p_discount'        => 'Discount',
            'p_cat1'            => 'Category 1',
            'p_cat2'            => 'Category 2',
            'p_cat3'            => 'Category 3',
            'p_sizes'           => 'Sizes',
            'p_url'             => 'Url',
            'p_color'           => 'Color',
            'p_description'     => 'Description',
            'img'               => 'Images',
            'img1'              => 'Images1',
            'slug'              => 'Slug',
            'p_stock'           => 'Stock',
            'p_code'            => 'Product code',
        ];
    }


     /**
    * Saves the uploaded image to the a folder
    * If upload is succesful it returns true
    */
    public function upload($img_name)
    {   

        if ($this->imageFile->saveAs($this->products_directory . $img_name . '.' . $this->imageFile->extension)) {
            return true;
        }else{
            return false;
        }
       
    } // end upload()


     /**
    * Saves the uploaded image to the a folder
    * If upload is succesful it returns true
    */
    public function upload1($img_name)
    {   

        if ($this->imageFile1->saveAs($this->products_directory . $img_name . '.' . $this->imageFile1->extension)) {
            return true;
        }else{
            return false;
        }
       
    } // end upload()


    public function setCat()
    {

        // $model = new Products();
        // get all categories and their names
        $modelCat2 = new Cat2();
        // $cat = array();


        $cat1 = Cat1::find()->all();
        $cat2 = Cat2::find()->all();
        $cat3 = Cat3::find()->all();

        foreach ($cat3 as $key => $value) {
            $data[] = array('id' =>$value->id ,
                            'name' =>$value->name ,
                            'cat2_id' =>$value->cat2_id,
                            'cat2 name' =>$modelCat2->getName($value->cat2_id));
        }

        $cats = array(
                            'cat1' =>$cat1 , 
                            'cat2' =>$cat2 , 
                            'cat3' =>$cat3 , 
                            'data' =>$data , 

                        );


        return $cats;
    }


    public function calcDiscount($p_discount, $p_price)
    {

        $old_price = FALSE;
        //calculate discount
        if ($p_discount>0) {
            $dis= (100-(int)$p_discount)/100;
            $old_price = $p_price;
            $p_price = $p_price * $dis;
        }

        return $arrayName = array(
                            'old_price' =>$old_price , 
                            'p_price'   =>$p_price , 
                        );
    }




} //  end class
