<?php
echo $this->render('../template/index', ['title' => 'Album', 
    'modelname' => 'Album',
    'dataProvider' => $dataProvider,
    'columns' =>  [
            ['class' => 'yii\grid\SerialColumn'],

            '_id',
            'description',
            'date',

            ['class' => 'yii\grid\ActionColumn'],
        ]]);