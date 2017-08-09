<?php $this->render('_menu', ['title' => Yii::t('app', 'Photo list')])?>
<ul>
<?php foreach ($albums as $album):?>
    <li class="album-link">
        <a id="<?= $album['album']; ?>"><?= $album['album']; ?></a>
        <div class="album-items">
            <?= dosamigos\gallery\Gallery::widget(['items' => $album['items']]);?>
        </div>
    </li>
<?php endforeach;?>
</ul>
<script>
//    $('a').click(function(){
//        $(this).next().toggle();
//    })
</script>