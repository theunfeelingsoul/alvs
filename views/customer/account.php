<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
 ?>
<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">About Us</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <!-- block category -->
                <div class="block left-module">
                    <p class="title_block">Infomations</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                    <li class="active"><span></span>
                                        <?php echo Html::a('Personal Information', ['customer/account'], ['class' => '']) ?>
                                    </li>
                                    <li class=""><span></span>
                                        <?php echo Html::a('My Orders', [''], ['class' => '']) ?>
                                    </li>
                                    <li class=""><span></span>
                                        <?php echo Html::a('Address Book', ['customer/account'], ['class' => '']) ?>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <!-- ./block category  -->
                <!-- Banner silebar -->
                <div class="block left-module">
                    <div class="banner-opacity">
                        <a href="#"><img src="assets/data/slide-left.jpg" alt="ads-banner"></a>
                    </div>
                </div>
                <!-- ./Banner silebar -->
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- page heading-->
                <h2 class="page-heading">
                    <span class="page-heading-title2">Personal Information</span>
                </h2>
                <!-- Content page -->
                <div class="content-text clearfix">


                    <?php $form = ActiveForm::begin([
                        'action' => ['customer/update'],
                        // 'method' => 'get',
                    ]); ?>

                        <?= $form->field($model, 'f_name')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 's_name')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

                        <?php
                            echo $form->field($model, 'gender')->dropDownList(
                                        ['male' => 'Male', 'female' => 'Female']
                        ); ?>

                        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>


                        <div class="form-group">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>

                </div>
                <!-- ./Content page -->
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
<!-- ./page wapper-->