<?php
$titles = [
    Yii::t('app', 'Photo list') => 'albums', 
    Yii::t('app', 'Galleries') => 'index', 
    ];
foreach ($titles as $item => $url){
    if($title == $item){
        $this->params['breadcrumbs'][] = ['label' => Yii::t('app', $item)];
    } else {
        $this->params['breadcrumbs'][] = ['label' => Yii::t('app', $item), 'url' => [$url]];
    }
}

