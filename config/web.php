<?php

$params = require __DIR__.'/params.php';
$db     = require __DIR__.'/db.php';
$dict   = require __DIR__.'/dict.php';
$mail   = require __DIR__.'/mail.php';

$config = [
    'id'         => 'basic',
    'basePath'   => dirname(__DIR__),
    'bootstrap'  => ['log'],
    'aliases'    => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'rfec#$RQGAERvgw45earsdvw23wdqcqwf23hgb3w#$HBE',
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager'   => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules'           => [
                '/'                                     => 'request/help',
                '/savenostandard'                       => 'request/savenostandard',
                '/saveextend'                           => 'request/saveextend',
                '/getcity'                              => 'request/getcity',
                '/admin/page/<page:\d+>/<per-page:\d+>' => 'admin/index',
                '/admin/<id:\d+>'                       => 'admin/view',
                '/admin'                                => 'admin/index',
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
            ],
        ],
        'mailer'       => $mail,
        'db'           => $db,
        'dict'         => $dict,

    ],
    'params'     => $params,
];

return $config;
