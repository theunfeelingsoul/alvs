<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Cat1;


$cat1List = ArrayHelper::map(Cat1::find()->all(), 'id', 'name');

/* @var $this yii\web\View */
/* @var $model app\models\Cat2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat2-form">

    <?php $form = ActiveForm::begin(); ?>

   <!--  </?= $form->field($model, 'cat1_id')->dropdownList($cat1List,
	        ['prompt'=>'Choose a category']
	    )->label(false);; 
	?> -->
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'cat1_id')->dropdownList($cat1List,
                    ['prompt'=>'Choose a category','multiple'=>'multiple','size'=>"20"]
                ); 
            ?>
        </div>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
