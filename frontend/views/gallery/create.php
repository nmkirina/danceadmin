<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gallery */
$this->render('_menu', ['title' => 'Create Gallery']);
$this->params['breadcrumbs'][] = Yii::t('app', 'Create gallery');
$this->title = Yii::t('app', 'Create Gallery');
?>
<div class="gallery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
