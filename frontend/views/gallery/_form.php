<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-form">
    <?php $image = $model->imageFieldName;?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'album')->dropDownList($model->getAlbumList()); ?>
    <?= $form->field($model, 'name')->hiddenInput(['value' => $model->$image ? $model->$image : 'default value']);?>
    <?php if($model->name):?>
        <img src="<?='uploads/thumbs/sm_' . $model->$image?>">
    <?php endif;?>
    
    <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
