<?php

// Repository
$app['stationRepository'] = function () use($app) {
    return new Ntorre\Velobleu\Repository\StationRepository($app['db']);
};

// Service
$app['veloBleuService'] = function() {
    return new Ntorre\Velobleu\Service\VeloBleuService();
};

// Controller
$app['frontController'] = function() use($app) {
    return new Ntorre\Velobleu\Controller\FrontController();
};
$app['apiController'] = function() use($app) {
    return new Ntorre\Velobleu\Controller\ApiController(array('stationRepository' => $app['stationRepository']));
};
$app['cronController'] = function() use($app) {
    return new Ntorre\Velobleu\Controller\CronController(array('stationRepository' => $app['stationRepository']));
};