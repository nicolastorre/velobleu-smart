<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\HttpFoundation\Request;

ErrorHandler::register();
ExceptionHandler::register();

// Doctrine
$app->register(new Silex\Provider\DoctrineServiceProvider());

$app->register(new Silex\Provider\ServiceControllerServiceProvider());

// Twig
$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../src/Ntorre/Velobleu/Resources/views/'));

require_once __DIR__.'/../src/Ntorre/Velobleu/Resources/config/services.php';