<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat2".
 *
 * @property int $id
 * @property string $name
 * @property int $cat1_id
 */
class Cat2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat1_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'        => 'ID',
            'name'      => 'Name',
            'cat1_id'   => 'Category 1 ID',
        ];
    }


    public function getName($id){
         $cat2 = Cat2::find()
        ->where(['id' => $id])
        ->one(); 

        return $cat2['name'];
    }

}
