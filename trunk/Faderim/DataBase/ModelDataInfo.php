<?php
namespace Faderim\DataBase;
class ModelDataInfo extends ModelDataBase
{
    private $colName;

    public function __construct($colname,$modelName,$id = false) {
        parent::__construct($modelName, $id);
        $this->setColName($colname);
    }

    public function setColName($colname) {
        $this->colName = $colname;
    }

    public function getColName() {
        return $this->colName;
    }


}