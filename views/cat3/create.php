<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cat3 */

$this->title = 'Create Cat3';
$this->params['breadcrumbs'][] = ['label' => 'Cat3s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat3-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
