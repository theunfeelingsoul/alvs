<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Cat2;
use yii\helpers\ArrayHelper;

$cat2List = ArrayHelper::map(Cat2::find()->all(), 'id', 'name');
/* @var $this yii\web\View */
/* @var $model app\models\Cat3 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat3-form">

    <?php $form = ActiveForm::begin(); ?>

   

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'cat2_id')->dropdownList($cat2List,
                    ['multiple'=>'multiple','size'=>"20"]
                ); 
            ?>
        </div>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
