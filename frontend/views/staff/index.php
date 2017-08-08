<?php
echo $this->render('../template/index', ['title' => 'Staff', 
    'modelname' => 'Staff',
    'dataProvider' => $dataProvider,
    'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'fullurl:url',
            [
                'format' => ['image'],
                'value' => function($data){return $data->imageUrl;} 
                
            ],
            'start_date',
            'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
