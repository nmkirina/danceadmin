<?php $this->render('_menu', ['title' => 'Photo list'])?>

<?= dosamigos\gallery\Gallery::widget(['items' => $items]);?>