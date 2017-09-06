<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Comments;

/* @var $this yii\web\View */
/* @var $model frontend\models\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'text') ?>

    <?= $form->field($model, 'approved')->radioList(Comments::getApprovedStatus()); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
