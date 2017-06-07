<?php
namespace Ntorre\Velobleu\Entity;


/**
 * Class Article
 * @package Portfolio\Domain\Model
 */
class Station extends Entity
{

    /**
     * Station id.
     *
     * @var integer
     */
    protected $id;
    /**
     * Station id_station.
     *
     * @var string
     */
    protected $id_station;
    /**
     * Station datetime.
     *
     * @var int
     */
    protected $datetime;
    /**
     * Station disp.
     *
     * @var bool
     */
    protected $disp;
    /**
     * Station neutral.
     *
     * @var bool
     */
    protected $neutral;
    /**
     * Station total capacity.
     *
     * @var int
     */
    protected $total_capacity;
    /**
     * Station available capacity.
     *
     * @var int
     */
    protected $available_capacity;
    /**
     * Station available bike.
     *
     * @var int
     */
    protected $available_bike;
    /**
     * Station available parking.
     *
     * @var int
     */
    protected $available_parking;

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getIdStation()
    {
        return $this->id_station;
    }

    /**
     * @param string $id_station
     */
    public function setIdStation($id_station)
    {
        $this->id_station = $id_station;
    }

    /**
     * @return int
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @param int $datetime
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @return bool
     */
    public function isDisp()
    {
        return $this->disp;
    }

    /**
     * @param bool $disp
     */
    public function setDisp($disp)
    {
        $this->disp = $disp;
    }

    /**
     * @return bool
     */
    public function isNeutral()
    {
        return $this->neutral;
    }

    /**
     * @param bool $neutral
     */
    public function setNeutral($neutral)
    {
        $this->neutral = $neutral;
    }

    /**
     * @return int
     */
    public function getTotalCapacity()
    {
        return $this->total_capacity;
    }

    /**
     * @param int $total_capacity
     */
    public function setTotalCapacity($total_capacity)
    {
        $this->total_capacity = $total_capacity;
    }

    /**
     * @return int
     */
    public function getAvailableCapacity()
    {
        return $this->available_capacity;
    }

    /**
     * @param int $available_capacity
     */
    public function setAvailableCapacity($available_capacity)
    {
        $this->available_capacity = $available_capacity;
    }

    /**
     * @return int
     */
    public function getAvailableBike()
    {
        return $this->available_bike;
    }

    /**
     * @param int $available_bike
     */
    public function setAvailableBike($available_bike)
    {
        $this->available_bike = $available_bike;
    }

    /**
     * @return int
     */
    public function getAvailableParking()
    {
        return $this->available_parking;
    }

    /**
     * @param int $available_parking
     */
    public function setAvailableParking($available_parking)
    {
        $this->available_parking = $available_parking;
    }
}