<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlvsusersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alvsusers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alvsusers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Alvsusers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'f_name',
            's_name',
            'email:email',
            // 'location',
            //'phone',
            //'password',
            //'auth_key',
            'role',
            //'hash:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
