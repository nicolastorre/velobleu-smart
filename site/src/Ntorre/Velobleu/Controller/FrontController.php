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

        $client = new GuzzleClient();
        $res = $client->request("GET", "https://www.velobleu.org/cartoV2/libProxyCarto.asp");

        $responseData = json_decode($res->getBody()->getContents());

        return $app['twig']->render('Front/index.html.twig', array(
            'data' => "test"
        ));
    }
}