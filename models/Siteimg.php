<?php

namespace app\models;
use yii\web\UploadedFile;
use Yii;
use app\models\Siteimg;
/**
 * This is the model class for table "site_img".
 *
 * @property int $id
 * @property string $page_cat
 * @property string $img
 */
class Siteimg extends \yii\db\ActiveRecord
{
    public $site_img_directory = 'img/site-images/';
    public $imageFile;
    


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_img';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_cat', 'img'], 'required'],
            [['page_cat'], 'integer'],
            [['img'], 'string'],
          
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_cat' => 'Page Cat',
            'img' => 'Img',
        ];
    }

         /**
    * Saves the uploaded image to the a folder
    * If upload is succesful it returns true
    */
    public function upload($img_name)
    {   

        if ($this->imageFile->saveAs($this->site_img_directory . $img_name . '.' . $this->imageFile->extension)) {
            return true;
        }else{
            return false;
        }
       
    } // end upload()

} // end class
