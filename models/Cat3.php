<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat3".
 *
 * @property int $id
 * @property string $name
 * @property int $cat2_id
 */
class Cat3 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat3';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat2_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'cat2_id' => 'Cat2 ID',
        ];
    }


    public function getName($id){

        $model = Cat3::find()
        ->select('name')
        ->where(['id' => $id])
        ->one();

        return $model;
    }




} // end class
