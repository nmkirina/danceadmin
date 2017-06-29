<?php
return [
    'class' => [
    'mongodb' => [
            'class' => '\yii\mongodb\Connection',
            'dsn' => 'mongodb://localhost:27017/dance',
            'enableLogging' => true,
            'enableProfiling' => true,
        ],
    ]
];

