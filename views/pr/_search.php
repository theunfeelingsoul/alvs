<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'p_name') ?>

    <?= $form->field($model, 'p_company') ?>

    <?= $form->field($model, 'p_key_features') ?>

    <?= $form->field($model, 'p_price') ?>

    <?php // echo $form->field($model, 'p_discount') ?>

    <?php // echo $form->field($model, 'p_cat1') ?>

    <?php // echo $form->field($model, 'p_cat2') ?>

    <?php // echo $form->field($model, 'p_cat3') ?>

    <?php // echo $form->field($model, 'p_sizes') ?>

    <?php // echo $form->field($model, 'p_url') ?>

    <?php // echo $form->field($model, 'p_color') ?>

    <?php // echo $form->field($model, 'p_description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
