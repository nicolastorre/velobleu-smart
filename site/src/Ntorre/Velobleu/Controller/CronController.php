<?php
namespace Ntorre\Velobleu\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Ntorre\Velobleu\Entity\Station;


/**
 * Class CronController
 * @package Ntorre\Velobleu\Controller
 */
class CronController extends DefaultController
{
    /**
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function veloBleuStateAction(Request $request, Application $app) {

        $responseData = $app['veloBleuService']->getAllStation();
        foreach($responseData->stand as $stand) {
            $station = new Station();
            $station->setIdStation($stand->id);
            $station->setDatetime(date("Y-m-d H:i:s"));
            $station->setDisp($stand->disp);
            $station->setNeutral($stand->neutral);
            $station->setTotalCapacity($stand->tc);
            $station->setAvailableCapacity($stand->ac);
            $station->setAvailableBike($stand->ab);
            $station->setAvailableParking($stand->ap);

            $this->repository['stationRepository']->save($station);
        }

        return $app->json(array('error' => false, 'response' => 'Velo bleu station data saved!'));
    }
}