<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->render('_menu', ['title' => $modelname]);
$this->title = Yii::t('app', $modelname);
?>
<div class="gallery-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create ' . $modelname), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget($data); ?>
</div>