<?php 
use yii\helpers\Html;
$this->render('_menu', ['title' => Yii::t('app', 'Albums')]);
        ?>

<div class="list-group">
  <?php foreach($albums as $album => $count):?>
    <?=  
        Html::a( 
                $album . ' <span class="badge badge-default badge-pill">' . $count . '</span>',
               ['gallery', 'id' => $album],
                ['class' => 'list-group-item list-group-item-action']
                );
    ?>
  <?php endforeach;?>
</div>