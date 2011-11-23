<?php
namespace Faderim\DataBase;
abstract class Storage
{
    /**
    * @var ModelInfo
    */
    private $ModelInfo;
    private $Model;
    private $Connection;

    public function setModelInfo(\Faderim\DataBase\ModelInfo $ModelInfo) {
        $this->ModelInfo = $ModelInfo;
    }

    public function setModel(\Faderim\Core\BaseModel $Model) {
        $this->Model = $Model;
    }

    public function getModel() {
        return $this->Model;
    }

    public function setConnection(\Faderim\DataBase\BaseConnection $Con)
    {
        $this->Connection = $Con;
    }

    public function getConnection()
    {
        return $this->Connection;
    }

    public function getModelInfo()
    {
        return $this->ModelInfo;
    }

    abstract public function insert();
    abstract public function save();
    abstract public function delete();
}