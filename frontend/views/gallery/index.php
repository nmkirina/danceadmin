<?php
echo $this->render('../template/index', ['title' => 'Galleries', 
    'modelname' => 'Gallery', 
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'fullurl:url',
            [
                'attribute' => 'album',
                'format' => 'text',
                'filter' => frontend\models\Gallery::getAlbumList(),
            ],
            [
                'format' => ['image'],
                'value' => function($data){return $data->imageUrl;} 
                
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
