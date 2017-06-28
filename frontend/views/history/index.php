<?php
echo $this->render('../template/index', ['title' => 'Dances', 
    'modelname' => 'Dance',
    'data' => [
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'year',
            'text',
            'name',
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]]);
