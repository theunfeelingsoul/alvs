<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Siteimgcat;

/* @var $this yii\web\View */
/* @var $model app\models\Siteimg */
/* @var $form yii\widgets\ActiveForm */

$catList = ArrayHelper::map(Siteimgcat::find()->all(), 'id', 'cat');
?>

<div class="siteimg-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'page_cat')->dropdownList($catList,
            ['prompt'=>'Choose a category']
        ); 
    ?>


	<div class="form-group">
        <?= $form->field($model, 'img')->fileInput() ?>
    </div>
    <div class="row">              
      <?php 
          // only show if its empty
          if (!empty($model->img)) {
              foreach ($xx as $key => $value) {?>
                <div class="col-md-6 prod_update_img_box">
                  <div class="row">
                    <?= Html::img('@web/'.$value, ['alt'=>'', 'class'=>'prod_update_img','height'=>'100'])?>
                  </div>
                  <div class="row">
                    <br>

                    <?= Html::a('Delete', ['siteimg/deleteimg', 'id' => $key."-".$model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                    ]) ?>

                  </div>
                  
                </div>
                
             <?php  }
          }
         
          ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
