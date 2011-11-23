<?php
namespace Faderim\DataBase;
class ModelDataInfo
{
    private $colName;
    private $modelName;
    private $id;

    public function __construct($colname,$modelName,$id = false) {
        $this->setColName($colname);
        $this->setModelName($modelName);
        $this->setIsId($id);
    }

    public function setColName($colname) {
        $this->colName = $colname;
    }

    public function getColName() {
        return $this->colName;
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


}
?>
