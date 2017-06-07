<?php

use Symfony\Component\HttpFoundation\Request;

$app->get('/', 'frontController:indexAction')->bind('front');
$app->get('/api/velobleu/station', 'apiController:indexAction')->bind('api_velobleu_station');
$app->get('/cron/velobleu/station', 'cronController:veloBleuStateAction')->bind('cron_velobleu_station');
