<?php
namespace Ntorre\Velobleu\Repository;

use Ntorre\velobleu\Entity\Station;

/**
 * Class ArticleRepository
 * @package Portfolio\Domain\Repository
 */
class StationRepository extends DefaultRepository
{
    /**
     * Build object Station
     *
     * @param $row
     * @return Station
     */
    protected function buildDomainObject($row) {

        $object = new Station();
        $object->setId($row['id']);
        $object->setIdStation($row['id_station']);
        $object->setDatetime($row['datetime']);
        $object->setDisp($row['disp']);
        $object->setNeutral($row['neutral']);
        $object->setTotalCapacity($row['total_capacity']);
        $object->setAvailableCapacity($row['available_capacity']);
        $object->setAvailableBike($row['available_bike']);
        $object->setAvailableParking($row['available_parking']);

        return $object;
    }

}