<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Siteimg */

$this->title = 'Create Siteimg';
$this->params['breadcrumbs'][] = ['label' => 'Siteimgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siteimg-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
