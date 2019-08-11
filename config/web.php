<?php

$params = require __DIR__.'/params.php';
$db     = require __DIR__.'/db.php';

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
                '/site'                                 => 'site/index',
                '/'                                     => 'requests/help',
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
        'mailer'       => [
            'class'            => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport'        => [
                'class'      => 'Swift_SmtpTransport',
                'host'       => 'smtp.gmail.com',
                'username'   => 'sdfghj1234567sdfg@gmail.com',
                'password'   => 'qwertyuiopoiuytrewq',
                'port'       => '587',
                'encryption' => 'tls',
            ],
        ],
        'db'           => $db['localhost'],
        'dict'         => $db['dict'],

    ],
    'params'     => $params,
];

return $config;
