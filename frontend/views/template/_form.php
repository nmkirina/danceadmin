<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Album */
/* @var $form yii\widgets\ActiveForm */
$image = $model->imageFieldName;
?>

<div class="album-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php foreach($model->getAttributeList(true) as $field):?>
        <?php if(in_array($field, Yii::$app->params['textFields'])):?>
            <?= $form->field($model, $field)->textarea(); ?>
        <?php elseif(in_array($field, Yii::$app->params['dateFields'])):?> 
          <?= $form->field($model, $field)->widget(\yii\jui\DatePicker::classname(), [
            'language' => 'ru',
            'dateFormat' => 'yyyy-MM-dd',
        ]) ?>  
        <?php elseif(in_array($field, Yii::$app->params['yearsFields'])):?>
            <?= $form->field($model, $field)->dropDownList($model->yearsList()); ?>            
        <?php elseif($field == 'active'):?>
            <?= $form->field($model, $field)->radioList([0 => 'Активный участник', 1 => 'Неактивный участник']); ?>
        <?php elseif($field != 'fullurl'):?>
            <?= $form->field($model, $field); ?>
        <?php endif;?>    
    <?php endforeach;?>
    
    <?php if(isset($image)):?>
        <?php if(($model->$image)):?>
            <img src="<?='/thumbs/sm_' . $model->$image?>">
        <?php endif;?>
            <?= $form->field($model, 'imageFiles[]')->widget(FileInput::classname(), 
                    ['options' => ['accept' => 'image/*']]);?>
    <?php endif;?>

    <div class="form-group">
        <?= Html::submitButton(
                $model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), 
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
