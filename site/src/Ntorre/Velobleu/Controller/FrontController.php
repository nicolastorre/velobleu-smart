<?php
namespace Ntorre\Velobleu\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use GuzzleHttp\Client as  GuzzleClient;


/**
 * Class FrontController
 * @package Ntorre\Velobleu\Controller
 */
class FrontController
{
    /**
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function indexAction(Request $request, Application $app) {

        return $app['twig']->render('Front/index.html.twig', array(
            'data' => "test"
        ));
    }
}