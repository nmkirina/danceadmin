<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Dances */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dances-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, '_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'photo') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'start_year') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
