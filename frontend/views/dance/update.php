<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dances */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Dances',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => (string)$model->_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="dances-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
