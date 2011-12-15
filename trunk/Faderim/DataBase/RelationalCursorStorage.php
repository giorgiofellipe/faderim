<?php
namespace Faderim\DataBase;
/**
 * Description of RelationalCursorStorage
 *
 * @author Ricardo
 */
class RelationalCursorStorage implements \Iterator
{
    private $Sql;
    private $ModelInfo;
    private $Model;
    
    
    private $currentRow;
    private $rowNumber = 0;
    
    public function __construct(Sql $oCon, ModelInfo $oInfo)
    {
        $this->Sql = $oCon;
        $this->ModelInfo = $oInfo;        
        $this->createSelect();               
    }
    
    public function setModel($Model) {
       $this->Model = $Model;        
    }
    
    private function createSelect() 
    {
        $aCols =  Array();
        foreach($this->ModelInfo->getData() as /** @var \Faderim\DataBase\ModelDataInfo */$Model) {            
            $aCols[] = $Model->getColName();
        }
        $this->Sql->mountSelect($this->ModelInfo->getTable(),$aCols);        
    }
    
    public function filter($sColuna,$sOperador,$sValor) 
    {
        $this->Sql->addCondition($this->ModelInfo->getDataFromName($sColuna)->getColName(), $sOperador, $sValor);
        return $this;        
    }
    
    public function filterByRel($sNameRel,\Faderim\Framework\Model\BaseModel $oModel) {
        $ModelInfo = $oModel->getModelInfo()->getDataId();
        foreach($ModelInfo as $oData) {
            $sModelName = $oData->getModelName();
            $xVal = $oModel->beanGetProperty($sModelName);
            if(empty($xVal)) {
                throw new \Exception('Invalid value for col '.$sModelName);                
            }
            $this->filter($sNameRel.'.'.$sModelName,'=',$xVal);  
            
          
        }
        return $this;
    }
    
    public function order() 
    {
        return $this;        
    }
    
    public function offset() 
    {
        return $this;
    }
    
    public function limit() 
    {
        return $this;
    }
    
    
    public function valid() 
    {
        return $this->current() !== false;
    }
    
    public function next() 
    {
        $this->currentRow = $this->fetch();
        $this->rowNumber++;
    }
    
    public function key() 
    {
        return $this->rowNumber;
    }
    
    public function rewind() 
    {
        $this->currentRow = null;
        $this->rowNumber  = 0;
        $this->init();
        $this->next();
    }
    
    public function current() 
    {
        return $this->currentRow;
    }
    
    protected function init() 
    {
        $this->Sql->execute();       
    }    
    
    
    protected function fetch() 
    {
        $oRes = $this->Sql->fetch();
        if($oRes) {
            if(isset($this->Model)) {
                $ret = $this->ModelInfo->fetchFromRes($this->Model,$oRes);
            }
            else {
                $ret = $this->ModelInfo->getInstanceFromRes($oRes);    
            }            
            $ret->setPersistido(true);
            return $ret;            
        }
        return false;
    }
}