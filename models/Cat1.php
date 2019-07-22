<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat1".
 *
 * @property int $id
 * @property string $name
 */
class Cat1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
        ];
    }

    public function getNameById($id)
    {
        $model = Cat1::findOne($id);
        return $model->name;
    }
}
