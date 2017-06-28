<?php
echo $this->render('../template/index', ['title' => 'Dances', 
    'modelname' => 'Dance',
    'data' => [
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'format' => ['image'],
                'value' => function($data){return $data->imageUrl;} 
                
            ],
            'description',
            'start_year',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]]);