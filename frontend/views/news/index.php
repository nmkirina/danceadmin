<?php
echo $this->render('../template/index', ['title' => 'Dances', 
    'modelname' => 'Dance',
    'data' => [
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'text',
            [
                'format' => ['image'],
                'value' => function($data){return $data->imageUrl;} 
                
            ],
            'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]]);