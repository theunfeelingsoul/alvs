<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Cat1;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Cat2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cat2s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat2-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cat2', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            'cat1_id',
            array(
                'attribute' => 'cat1_id',
                'format' => 'raw',
                'value'=>function ($data) {
                    $model = new Cat1();
                    if (empty(!$data['cat1_id'])) {
                        return $model->getNameById($data['cat1_id']);
                    }
                    return "none";
                },

            ),


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
