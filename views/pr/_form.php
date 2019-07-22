<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Cat3;
use app\models\Cat2;
use app\models\Cat1;

$cat3List = ArrayHelper::map(Cat3::find()->all(), 'id', 'name');
$cat2List = ArrayHelper::map(Cat2::find()->all(), 'id', 'name');
$cat1List = ArrayHelper::map(Cat1::find()->all(), 'id', 'name');

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            
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

                            <?= Html::a('Delete', ['products/deleteimg', 'id' => $key."-".$model->id], [
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
            <hr>
            

        </div>
       
       <div class="col-md-8">

            <div class="row">
              <div class="col-md-6">
                <?= $form->field($model, 'p_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'p_company')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'p_price')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'p_discount')->textInput(['maxlength' => true]) ?>

              </div>
              <div class="col-md-6">
                
              <?= $form->field($model, 'p_url')->textInput(['maxlength' => true]) ?>

              <?= $form->field($model, 'p_color')->textInput(['maxlength' => true]) ?>

              <?= $form->field($model, 'p_sizes')->textInput(['maxlength' => true]) ?>
              </div>
            </div>
           <div class="row">
               <div class="col-md-4">
                    <?= $form->field($model, 'p_cat1')->dropdownList($cat1List,
                            ['prompt'=>'Choose a category','multiple'=>'multiple','size'=>'20']
                        ); 
                    ?>
               </div>

               <div class="col-md-4">
                    <?= $form->field($model, 'p_cat2')->dropdownList($cat2List,
                            ['prompt'=>'Choose a category','multiple'=>'multiple','size'=>'20']
                        ); 
                    ?>
               </div>

               <div class="col-md-4">
                    <?= $form->field($model, 'p_cat3')->dropdownList($cat3List,
                            ['prompt'=>'Choose a category','multiple'=>'multiple','size'=>'20']
                        ); 
                    ?>
               </div>
           </div>
       </div>
   </div>

   <hr>
   <div class="row">
       <div class="col-md-6">
            <?= $form->field($model, 'p_key_features')->textarea(['rows' => 12]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'p_description')->textarea(['rows' => 12]) ?>
        </div>
   </div>
    

    

  

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
