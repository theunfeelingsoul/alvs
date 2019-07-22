<?php

namespace app\models;
use yii\web\UploadedFile;

use Yii;

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
 */
class Products extends \yii\db\ActiveRecord
{


    public $products_directory = 'img/products/';
    public $imageFile;
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
            [['p_key_features', 'p_description','img'], 'string'],
            // [['p_cat3'], 'integer'],
            [['p_cat3','p_cat2','p_cat1'], 'integer'],
       
            [['p_name', 'p_company', 'p_price', 'p_discount', 'p_sizes', 'p_url', 'p_color','slug'], 'string', 'max' => 255],
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
            'slug'              => 'Slug',
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




} //  end class
