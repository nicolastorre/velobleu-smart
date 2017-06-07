<?php

$app['frontController'] = function() use($app) {
    return new Ntorre\Velobleu\Controller\FrontController();
};