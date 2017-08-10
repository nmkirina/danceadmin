<?php $this->render('_menu', ['title' => Yii::t('app', $album)])?>
<?= dosamigos\gallery\Gallery::widget(['items' => $items]);?>