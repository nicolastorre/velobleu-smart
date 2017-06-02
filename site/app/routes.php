<?php

use Symfony\Component\HttpFoundation\Request;
use GuzzleHttp\Client as  GuzzleClient;

// Get all users
$app->get('/', function () use ($app) {

    $client = new GuzzleClient();
    $res = $client->request("GET", "https://www.velobleu.org/cartoV2/libProxyCarto.asp");

    $responseData = json_decode($res->getBody()->getContents());

    return $app->json($responseData);
})->bind('api_velobleu');