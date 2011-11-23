<?php
namespace Faderim\DataBase;
class ModelInfo
{
    private $table;
    private $data = Array();

    public function setTable($table)
    {
        $this->table = $table;
    }

    public function getTable()
    {
        return $this->table;
    }

    public function addData(ModelDataInfo $oData)
    {
        $this->data[] = $oData;
    }

    public function getData()
    {
        return $this->data;
    }

    static public function newFromClass($sClass)
    {
        $oReflec = new \Faderim\Reflection\ModelAnotation($sClass);
        $oInfo = new ModelInfo();
        $oInfo->setTable($oReflec->getTable());
        foreach($oReflec->getProperties() as /** @var ModelPropertyAnotation */$oReflec) {
            $oInfo->addData(new \Faderim\DataBase\ModelDataInfo($oReflec->getName(),$oReflec->getName(),false));

        }
        return $oInfo;
        //print_r($t);
    }

}
?>
