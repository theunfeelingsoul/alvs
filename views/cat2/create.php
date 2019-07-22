<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cat2 */

$this->title = 'Create Cat2';
$this->params['breadcrumbs'][] = ['label' => 'Cat2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
