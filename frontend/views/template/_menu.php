<?php
$titles = [ ];
foreach ($titles as $item => $url){
    if($title == $item){
        $this->params['breadcrumbs'][] = ['label' => Yii::t('app', $item)];
    } else {
        $this->params['breadcrumbs'][] = ['label' => Yii::t('app', $item), 'url' => [$url]];
    }
}

