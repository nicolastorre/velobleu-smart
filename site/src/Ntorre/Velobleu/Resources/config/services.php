<?php

// Controller
$app['frontController'] = function() use($app) {
    return new Ntorre\Velobleu\Controller\FrontController();
};
$app['apiController'] = function() use($app) {
    return new Ntorre\Velobleu\Controller\ApiController();
};

// Service
$app['veloBleuService'] = function() {
    return new Ntorre\Velobleu\Service\VeloBleuService();
};