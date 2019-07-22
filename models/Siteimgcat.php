<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site_img_cat".
 *
 * @property int $id
 * @property string $cat
 */
class Siteimgcat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_img_cat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat'], 'required'],
            [['cat'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat' => 'Cat',
        ];
    }
}
