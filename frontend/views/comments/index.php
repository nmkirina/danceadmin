<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Comments;
use frontend\models\Dances;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Comments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('app', 'Delete banned comments'), ['deletebanned'], ['class' => 'btn btn-warning']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model, $key, $index, $column){
            return ['class' => Comments::APPROVED_STATUS_LIST[$model->approved]['class']];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
              'label' => Yii::t('app', 'Dance'),
              'attribute' => 'danceid',
              'format' => 'raw',
              'value' => function($data){
            return Html::a(Comments::getDance($data->danceid), ['dance/view', 'id' => $data->danceid]);},
              'filter' => Dances::getList()
            ],
            'text',
            'created',
            [
              'attribute' => 'approved',
              'format' => 'raw',
              'value' => function($data){
                return "<span class='glyphicon glyphicon-". Comments::getApprovedStatus($data->approved) . "-sign'></span>";},
              'filter' => Comments::getApprovedStatus(),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
