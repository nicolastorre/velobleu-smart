<?php

use Symfony\Component\HttpFoundation\Request;

$app->get('/', 'frontController:indexAction')->bind('front');
$app->get('/api/velobleu/station', 'apiController:indexAction')->bind('api_velobleu_station');
