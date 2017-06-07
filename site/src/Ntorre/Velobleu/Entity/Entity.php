<?php
namespace Ntorre\Velobleu\Entity;


/**
 * Class Entity
 * @package Ntorre\Velobleu\Entity
 */
abstract class Entity
{
    /**
     * Return object properties
     *
     * @return array
     */
    public function getProperties() {
        return get_object_vars($this);
    }
}