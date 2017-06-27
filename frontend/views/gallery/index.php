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
        <?= Html::a(Yii::t('app', 'Create Gallery'), ['upload'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'attribute' => 'album',
                'format' => 'text',
                'filter' => app\models\Gallery::getAlbumList(),
            ],
            [
                'format' => ['image', ['width' => '100', 'height' => '100']],
                'value' => function($data){return $data->imageUrl;} 
                
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
