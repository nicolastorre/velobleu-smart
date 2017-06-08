<?php

use Symfony\Component\HttpFoundation\Request;

$app->get('/', 'frontController:indexAction')->bind('front');
$app->get('/api/velobleu/station', 'apiController:indexAction')->bind('api_velobleu_station');
$app->get('/api/stat/station/{id}', 'apiController:stat2daysByStationAction')->bind('api_velobleu_stat_idstation');
$app->get('/cron/velobleu/station/{token}', 'cronController:veloBleuStateAction')->bind('cron_velobleu_station');
