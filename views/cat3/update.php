<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cat3 */

$this->title = 'Update Cat3: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cat3s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat3-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
