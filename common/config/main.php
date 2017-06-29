<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                    '<controller:[\w-]+>/<action:[\w-]+>' => '<controller>/<action>',
                    '<controller:[\w-]+>' => '<module>/<controller>',
            ],
        ],
    ],
];
