<?php $this->render('_menu', ['title' => 'Photo list'])?>
<?php foreach ($albums as $album):?>
    <a><?= $album['album']; ?></a>
    <?= dosamigos\gallery\Gallery::widget(['items' => $album['items']]);?>
<?php endforeach;?>