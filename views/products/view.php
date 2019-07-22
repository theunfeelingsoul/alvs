<?php
echo $model->date_created;
echo "<br>";
echo date('Y-m-d H:i:s');
echo "<br>";
$datetime1 = new DateTime($model->date_created);//start time
$datetime2 = new DateTime(date('Y-m-d H:i:s'));//end time
$interval = $datetime1->diff($datetime2);
echo $interval->format('%Y years %m months %d days %H hours %i minutes %s seconds');//00 years 0 months 0 days 08 hours 0 minutes 0 seconds
echo "<br>";
echo $interval->format('%s seconds');//00 years 0 months 0 days 08 hours 0 minutes 0 seconds

echo "<br>";
echo $datetime2->diff($datetime1)->s;
echo "<br>";
$datetime1 = date_create($model->date_created);
$datetime2 = date_create();

$datetime1 = date_create($model->date_created);
$datetime2 = date_create('now');
$interval = date_diff($datetime1, $datetime2);
echo $interval->format('%R%a days');

exit();

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'img',
            'p_name',
            'p_company',
            'p_key_features:ntext',
            'p_price',
            'slug',
            'p_discount',
            'p_cat1',
            'p_cat2',
            'p_cat3',
            'p_sizes',
            'p_url:url',
            'p_color',
            'p_description:ntext',
            'date_created',
        ],
    ]) ?>

</div>
