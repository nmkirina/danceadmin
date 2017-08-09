<?php
use yii\helpers\Html;

echo $this->render('_menu', ['title' => Yii::t('app','Create')]);
?>
<div class="gallery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
