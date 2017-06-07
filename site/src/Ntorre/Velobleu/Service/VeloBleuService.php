<?php
namespace Ntorre\Velobleu\Service;

use GuzzleHttp\Client as  GuzzleClient;


/**
 * Class VeloBleuService
 * @package Ntorre\Velobleu\Controller
 */
class VeloBleuService
{
    /**
     * @return mixed
     */
    public function getAllStation() {

        $client = new GuzzleClient();
        $res = $client->request("GET", "https://www.velobleu.org/cartoV2/libProxyCarto.asp");

        $responseData = json_decode($res->getBody()->getContents());

        return $responseData;
    }
}