<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dances */

$this->title = Yii::t('app', 'Create Dances');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dances-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
