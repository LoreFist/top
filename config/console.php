<?php

$params = require __DIR__.'/params.php';
$db     = require __DIR__.'/db.php';
$mail   = require __DIR__.'/mail.php';

$config = [
    'id'                  => 'basic-console',
    'basePath'            => dirname(__DIR__),
    'bootstrap'           => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases'             => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
    'components'          => [
        'cache'  => [
            'class' => 'yii\caching\FileCache',
        ],
        'log'    => [
            'targets' => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db'     => $db,
        'mailer' => $mail,
    ],
    'params'              => $params,
];

return $config;
