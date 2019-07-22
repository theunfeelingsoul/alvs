<?php use yii\helpers\Html;  
use yii\bootstrap\ActiveForm;
?>
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Authentication</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">Authentication</span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content">
            <div class="row">
               
                <div class="col-sm-6 col-md-offset-3">
                    <div class="box-authentication">
                        <?php $form = ActiveForm::begin([
					        'action' => ['alvsusers/create'],
					        // 'method' => 'get',
					    ]); ?>
                            <h3>Already registered?</h3> 
                          
							<?= $form->field($model, 'f_name')->textInput(['maxlength' => true]) ?>

							<?= $form->field($model, 's_name')->textInput(['maxlength' => true]) ?>

							<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

							<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

							<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

						


                            <div class="form-group">
                                <!-- <button id="submitSearch" class="btn btn-primary btn-lg btn-block" type="submit">Login</button> -->
                                <?= Html::submitButton('<i class="fa fa-lock"></i> Sign In', ['class' => 'button', 'name' => 'login-button']) ?>
                            </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./page wapper