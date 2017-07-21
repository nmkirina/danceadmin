<?php
echo $this->render('../template/index', ['title' => 'History', 
    'modelname' => 'History',
    'dataProvider' => $dataProvider,
    'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'year',
            'text',
            'name',
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
