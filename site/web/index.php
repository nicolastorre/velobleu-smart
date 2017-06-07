<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

if("velobleu.local" === $_SERVER['SERVER_NAME']) {
    require __DIR__ . '/../app/config/dev.php';
} else {
    require __DIR__ . '/../app/config/prod.php';
}

require __DIR__.'/../app/app.php';
require __DIR__ . '/../app/routing.php';

$app->run();