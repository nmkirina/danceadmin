<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Album */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => ucfirst( Yii::t('app', $model->collectionName()[1])),
]) . $model->_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', ucfirst($model->collectionName()[1]) . 's'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->_id, 'url' => ['view', 'id' => (string)$model->_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="album-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
