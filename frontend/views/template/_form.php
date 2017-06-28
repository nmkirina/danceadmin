<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Album */
/* @var $form yii\widgets\ActiveForm */
$image = $model->imageFieldName;
?>

<div class="album-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php foreach($model->getAttributeList(true) as $field):?>
        <?= $form->field($model, $field) ?>
    <?php endforeach;?>
    
    <?php if(isset($image)):?>
        <!--$form->field($model, $image)->hiddenInput(['value' => $model->$image ? $model->$image : 'default value']);-->
        <?php if(($model->$image)):?>
            <img src="<?='uploads/thumbs/sm_' . $model->$image?>">
        <?php endif;?>

        <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
    <?php endif;?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
