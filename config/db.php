<?php

return [
    'class'    => 'yii\db\Connection',
    'dsn'      => 'sqlite:'.realpath(__DIR__.'/../')."/database/tophotels.db",
    'username' => 'user',
    'password' => 'user',
    'charset'  => 'utf8',
];
