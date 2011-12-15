<?php
namespace Faderim\DataBase;
abstract class ModelDataBase
{
    private $modelName;
    private $id;

    public function __construct($modelName,$id = false) {
        $this->setModelName($modelName);
        $this->setIsId($id);
    }


    public function setModelName($modelName) {
        $this->modelName = $modelName;
    }

    public function getModelName() {
        return $this->modelName;
    }

    public function setIsId($id) {
        $this->id = $id;
    }
    
    public function isId() {
        return (bool) $this->id;
    }
}