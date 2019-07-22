<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Cat1;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Cat1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cat1s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat1-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cat1', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',    
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
