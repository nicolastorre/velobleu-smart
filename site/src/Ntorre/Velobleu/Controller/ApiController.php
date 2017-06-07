<?php
namespace Ntorre\Velobleu\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use GuzzleHttp\Client as  GuzzleClient;


/**
 * Class ApiController
 * @package Ntorre\Velobleu\Controller
 */
class ApiController
{
    /**
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function indexAction(Request $request, Application $app) {

        $responseData = $app['veloBleuService']->getAllStation();

        return $app->json($responseData);
    }
}