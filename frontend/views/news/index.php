<?php
echo $this->render('../template/index', ['title' => 'News', 
    'modelname' => 'News',
    'dataProvider' => $dataProvider,
    'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'text',
            'fullurl:url',
            [
                'format' => ['image'],
                'value' => function($data){return $data->imageUrl;} 
                
            ],
            'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);