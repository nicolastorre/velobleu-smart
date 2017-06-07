<?php
namespace Ntorre\Velobleu\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class DefaultController
 * @package Ntorre\Velobleu\Controller
 */
abstract class DefaultController
{

    /**
     * @var array
     */
    protected $repository;

    /**
     * @param array $repository
     */
    public function __construct(Array $repository = array()) {
        $this->repository = $repository;
    }
}