<?php
namespace Ntorre\Velobleu\Repository;

use Doctrine\DBAL\Connection;
use Silex\Application;

/**
 * Class Repository
 * @package Kernel
 */
abstract class DefaultRepository
{
    /**
     * Database connection
     *
     * @var \Doctrine\DBAL\Connection
     */
    protected $db;

    /**
     * @var array
     */
    protected $repository;

    /**
     * @var mixed
     */
    protected $objectName;

    /**
     * @var mixed
     */
    protected $tableName;

    /**
     * Constructor
     *
     * @param \Doctrine\DBAL\Connection The database connection object
     */
    public function __construct(Connection $db, Array $repository = array()) {
        $this->db = $db;
        $this->repository = $repository;
        $this->objectName = str_replace('Repository', 'Entity', substr(get_class($this),0,-10));
        $this->tableName = str_replace('Repository', 'Entity', str_replace('\\','_',substr(get_class($this),0,-10)));
    }

    /**
     * Return a list of all articles, sorted by date (most recent first).
     *
     * @return array A list of all articles.
     */
    public function findAll() {
        $sql = "select * from ".$this->tableName." order by id desc";
        $result = $this->db->fetchAll($sql);

        // Convert query result to an array of objects
        $objectList = array();
        foreach ($result as $row) {
            $id = $row['id'];
            $objectList[$id] = $this->buildDomainObject($row);
        }

        return $objectList;
    }

    /**
     * Dispatches magic methods (findBy[Property]())
     *
     * @param string $methodName The name of the magic method
     * @param string $arguments The arguments of the magic method
     * @throws \Exception
     * @return mixed
     * @api
     */
    public function __call($methodName, $arguments) {
        if (substr($methodName, 0, 6) === 'findBy' && strlen($methodName) > 7) {
            $propertyName = lcfirst(substr($methodName, 6));
            $sql = "select * from ".$this->tableName." where ".$propertyName." = :propertyValue order by id desc";
            $result = $this->db->fetchAll($sql, array('propertyValue' => $arguments[0]));

            // Convert query result to an array of objects
            $objectList = array();
            foreach ($result as $row) {
                $id = $row['id'];
                $objectList[$id] = $this->buildDomainObject($row);
            }
            return $objectList;
        } elseif (substr($methodName, 0, 9) === 'findOneBy' && strlen($methodName) > 10) {
            $propertyName = lcfirst(substr($methodName, 9));
            $sql = "select * from ".$this->tableName." where id = :id";
            $row = $this->db->fetchAssoc($sql, array('id' => $arguments[0]));
            if ($row)
                return $this->buildDomainObject($row);
            else
                throw new \Exception("No ".$this->objectName." matching  ". $propertyName ." ". $arguments[0]);
        } elseif (substr($methodName, 0, 7) === 'countBy' && strlen($methodName) > 8) {
            $propertyName = lcfirst(substr($methodName, 7));
            $sql = "select COUNT(id) from ".$this->tableName." where ".$propertyName." = :propertyValue order by id desc";
            $result = current($this->db->fetchAssoc($sql, array('propertyValue' => $arguments[0])));
            return $result;
        }
        throw new \Exception('The method "' . $methodName . '" is not supported by the repository.', 1233180480);
    }

    /**
     * Insert or update entity
     *
     * @param $object
     */
    public function save($object) {

        $data = $object->getProperties();

        if ($object->getId()) {
            // The object has already been saved : update it
            $this->db->update($this->tableName, $data, array('id' => $object->getId()));
        } else {
            // The object has never been saved : insert it
            $this->db->insert($this->tableName, $data);
            // Get the id of the newly created object and set it on the entity.
            $id = $this->db->lastInsertId();
            $object->setId($id);
        }
    }

    /**
     * Delete entity
     *
     * @param $id
     */
    public function delete($id) {
        // Delete the article
        $this->db->delete($this->tableName, array('id' => $id));
    }

    /**
     * Builds a domain object from a DB row.
     * Must be overridden by child classes.
     */
    protected abstract function buildDomainObject($row);
}