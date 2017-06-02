<?php

use Symfony\Component\HttpFoundation\Request;

// Get all users
$app->get('/', function () use ($app) {

    $responseData = array("Hello world");


    return $app->json($responseData);
})->bind('api_users');