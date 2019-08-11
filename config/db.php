<?php

return [
    'localhost' => [
        'class'    => 'yii\db\Connection',
        'dsn'      => 'sqlite:'.realpath(__DIR__.'/../')
            ."/tophotels.db",
        'username' => 'user',
        'password' => 'user',
        'charset'  => 'utf8',
    ],
    'dict'      => [
        'class'            => 'yii\db\Connection',
        'connectionString' => 'pgsql:host=db.tophotels.site;port=6432;dbname=dict',
        'username'         => 'dict_reader',
        'password'         => 'dict_reader',
        'charset'          => 'utf8',
    ],
];
