<?php

// Doctrine (db)
$app['db.options'] = array(
    'driver'   => 'pdo_mysql',
    'charset'  => 'utf8',
    'host'     => '127.0.0.1',  // Mandatory for PHPUnit testing
    'port'     => '3306',
    'dbname'   => 'velobleu',
    'user'     => 'velobleu',
    'password' => 'velobleu',
);

// enable the debug mode
$app['debug'] = true;

// Cron token
$app['cron.token'] = "2R4hI05TTyOVy2l3vZ33gcvZcqG7TwAw";