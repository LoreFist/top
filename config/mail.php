<?php
$params = require __DIR__.'/params.php';
return [
    'class'            => 'yii\swiftmailer\Mailer',
    'useFileTransport' => false,
    'transport'        => [
        'class'      => 'Swift_SmtpTransport',
        'host'       => 'smtp.gmail.com',
        'username'   =>  $params['admin_email'],
        'password'   => 'qwertyuiopoiuytrewq',
        'port'       => '587',
        'encryption' => 'tls',
    ],
];
