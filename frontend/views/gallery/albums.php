<?php $this->render('_menu', ['title' => Yii::t('app', 'Photo list')])?>
<ul class="list-group">
    <?php foreach($albums as $album):?>
        <li class="list-group-item justify-content-between">
            <a><?= $album?></a>
            <span class="badge badge-default badge-pill">12</span>
        </li>
    <?php endforeach;?>
</ul>

<div class="list-group">
  <?php foreach($albums as $album):?>
    <button type="button" class="list-group-item list-group-item-action">
      <?= $album?>
    </button>
  <?php endforeach;?>
</div>