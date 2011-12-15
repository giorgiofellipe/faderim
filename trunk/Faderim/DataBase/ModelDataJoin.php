<?php
namespace Faderim\DataBase;

/**
 * Description of ModelDataJoin
 *
 * @author Ricardo
 */
class ModelDataJoin extends ModelDataBase
{
    private $packageName;
    public function __construct($modelName, $id = false,$packageName = false)
    {
        parent::__construct($modelName, $id);
        $this->setPackageName($packageName);
    }

    
    public function getPackageName()     {
        return $this->packageName;
    }

    public function setPackageName($packageName)
    {
        $this->packageName = $packageName;
    }
    
    public function newInstance() {
        $sClassName = '\\'.$this->getPackageName().'\\'.$this->getModelName();
        return new $sClassName();
    }

        
    
    public function addDataId(ModelInfo $ModelInfo) {    
        $sClassJoin = $this->getPackageName().'\\'.$this->getModelName();        
        /**
         * @var $oData ModelInfo
         */
        $oData = call_user_func(Array($sClassJoin,'getModelInfo'));
        $aDataId = $oData->getDataId();
        foreach($aDataId as $oNewData) {
            $ModelInfo->addData(new ModelDataInfo($oNewData->getColName(),$this->getModelName().'.'.$oNewData->getModelName(),$this->isId()));
        }        
}
}

