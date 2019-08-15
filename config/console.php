<?php

$params = require(__DIR__.'/params.php');
$db     = require(__DIR__.'/db.php');
$mail   = require __DIR__.'/mail.php';

$config = [
    'id'                  => 'basic-console',
    'basePath'            => dirname(__DIR__),
    'bootstrap'           => ['log'],
    'controllerNamespace' => 'app\commands',
    'components'          => [
        'cache'  => [
            'class' => 'yii\caching\FileCache',
        ],
        'log'    => [
            'flushInterval' => 1,
            'targets'       => [
                [
                    'exportInterval' => 1,
                    'class'          => 'yii\log\FileTarget',
                    'levels'         => ['error', 'warning'],
                    'logVars'        => [],
                ],
            ],
        ],
        'db'     => $db,
        'mailer' => $mail,
    ],
    'params'              => $params,
];

if (YII_ENV_DEV) {
    $config['bootstrap'][]    = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
