<?php

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

ErrorHandler::register();
ExceptionHandler::register();

// Doctrine
$app->register(new Silex\Provider\DoctrineServiceProvider());

// ServiceControllerService Provider
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

// Twig
$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../src/Ntorre/Velobleu/Resources/views/'));

// Services
require_once __DIR__.'/../src/Ntorre/Velobleu/Resources/config/services.php';

if(!$app['debug']) {
    $app->error(function (\Exception $e, Request $request, $code) {
        switch ($code) {
            case 404:
                $message = 'The requested page could not be found.';
                break;
            default:
                $message = 'We are sorry, but something went terribly wrong.';
        }

        return new Response($message);
    });
}