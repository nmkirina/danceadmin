<?php
echo $this->render('../template/index', ['title' => 'Galleries', 
    'modelname' => 'Gallery', 'data' => [
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
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
    ]]);
