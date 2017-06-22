<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->render('_menu', ['title' => 'Galleries']);
$this->title = Yii::t('app', 'Galleries');
?>
<div class="gallery-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Gallery'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            '_id',
            'name',
            'album',
            [
                'format' => 'image',
                'value' => function($data){return $data->imageUrl;} 
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
