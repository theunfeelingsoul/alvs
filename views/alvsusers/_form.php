<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Alvsusers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alvsusers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'f_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's_name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <!-- </?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?> -->

    <!-- </?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?> -->

    <?php
        echo $form->field($model, 'role')->dropDownList(
                ['admin' => 'Admin', 'customer' => 'Customer'],
                ['prompt' => 'please choose']
    ); ?>

    <!-- </?= $form->field($model, 'hash')->textarea(['rows' => 6]) ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
