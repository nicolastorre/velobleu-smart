<?php
namespace Ntorre\Velobleu\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class ApiController
 * @package Ntorre\Velobleu\Controller
 */
class ApiController extends DefaultController
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

    /**
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function stat2daysByStationAction(Request $request, Application $app, $id) {

        $stationStatList = $this->repository['stationRepository']->findById_station($id);
        foreach($stationStatList as &$stationStat) {
            $stationStat = $stationStat->toArray();
        }

        return $app->json($stationStatList);
    }
}