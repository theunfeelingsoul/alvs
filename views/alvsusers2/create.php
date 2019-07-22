<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Alvsusers */

$this->title = 'Create Alvsusers';
$this->params['breadcrumbs'][] = ['label' => 'Alvsusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alvsusers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
