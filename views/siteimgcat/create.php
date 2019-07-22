<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Siteimgcat */

$this->title = 'Create Siteimgcat';
$this->params['breadcrumbs'][] = ['label' => 'Siteimgcats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siteimgcat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
