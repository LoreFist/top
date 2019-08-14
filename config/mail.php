<?php
return [
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
];
