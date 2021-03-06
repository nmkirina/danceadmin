<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Album */

$this->title = Yii::t('app', Yii::t('app', 'Create') . ' ' . Yii::t('app', ucfirst($model->collectionName()[1])));
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', ucfirst($model->collectionName()[1])), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
