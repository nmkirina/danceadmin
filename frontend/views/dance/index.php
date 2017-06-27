<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Dances');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dances-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Dances'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            '_id',
            'name',
            [
                'format' => ['image', ['width' => '100', 'height' => '100']],
                'value' => function($data){return $data->imageUrl;} 
                
            ],
            'description',
            'start_year',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
