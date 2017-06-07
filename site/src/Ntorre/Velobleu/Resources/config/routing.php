<?php

use Symfony\Component\HttpFoundation\Request;

$app->get('/', 'frontController:indexAction')->bind('front');
//
//// Get all users
//$app->get('/', function () use ($app) {
//
//
//})->bind('api_velobleu');