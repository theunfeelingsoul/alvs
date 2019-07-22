<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cat1 */

$this->title = 'Create Cat1';
$this->params['breadcrumbs'][] = ['label' => 'Cat1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
