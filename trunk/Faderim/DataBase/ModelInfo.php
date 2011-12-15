<?php
namespace Faderim\DataBase;
class ModelInfo
{
    private $table;
    private $data = Array();
    private $join = Array();
    private $ModelAnnotation;
    
    
    protected function __construct(\Faderim\Reflection\ModelAnotation $oModel) {
        $this->ModelAnnotation = $oModel;
    }

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
    
    public function getClassName() {
        return $this->ModelAnnotation->getClassName();
    }
    
    public function addDataJoin(\Faderim\Reflection\ModelPropertyAnotation $JoinAnnot) { 
        $sJoinName = $JoinAnnot->getJoin();
        $oJoin = new ModelDataJoin($sJoinName, $JoinAnnot->getId(),$this->ModelAnnotation->getPackage());
        $oJoin->addDataId($this);
        $this->join[$sJoinName] = $oJoin;       
    }
    
    public function getJoin($joinName) {
        return $this->join[$joinName];
    }
    
    /**
     *
     * @param type $name
     * @return ModelDataInfo
     */
    public function getDataFromName($name) {
        foreach($this->getData() as $Data) {
            if($name == $Data->getModelName()) {
                return $Data;
            }
        }
    }
        

    public function getData()
    {
        return $this->data;
    }
    
    public function getDataId() {
        $aData = Array();
        foreach($this->data as $oData) {
            if($oData->isId()) {
                $aData[] = $oData;
            }            
        }
        return $aData;
    }
    
    public function getInstance() 
    {
        return $this->ModelAnnotation->newInstance();        
    }
    
    public function getInstanceFromRes($oRes) {
        return $this->fetchFromRes($this->getInstance(), $oRes);
    }
    
    public function fetchFromRes($oModel,$oRes) {
        foreach($this->data as $oData) {
            $sCol = $oData->getColName();
            if(isset($oRes->$sCol)) {                
                $oModel->beanSetProperty($oData->getModelName(),$oRes->$sCol);                
            }            
        }
        return $oModel;        
        
    }

    static public function newFromClass($sClass)
    {
        $oReflec = new \Faderim\Reflection\ModelAnotation($sClass);        
        if($sInher = $oReflec->getInherited()) {
            return self::newFromClass($sInher);            
        }
        $oInfo = new ModelInfo($oReflec);
        $oInfo->setTable($oReflec->getTable());
        foreach($oReflec->getProperties() as /** @var ModelPropertyAnotation */$oReflec) {
            if($oReflec->isJoin()) {
                $oInfo->addDataJoin($oReflec);                               
            }
            else {
                $oInfo->addData(new \Faderim\DataBase\ModelDataInfo($oReflec->getColName(),$oReflec->getName(),$oReflec->getId()));    
            }            
        }
        return $oInfo;
    }
    
    

}