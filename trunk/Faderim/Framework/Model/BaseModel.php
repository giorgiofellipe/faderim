<?php
namespace Faderim\Framework\Model;
/**
* Titulo
* @package
* @subpackage Model
* @since
* @author
*/
abstract class BaseModel implements \Faderim\Json\JsonSerializable {
    
   private static $infoModel = Array();
   
   private $_persistido = false;
    
   
   private function callProperty($ToCall,$name,$type,$args = Array()) {
       if($aMatch = $this->extractClassFromString($name)) {
           $ToCallNew = $this->callProperty($ToCall, $aMatch[1], 'get');
           return $this->callProperty($ToCallNew, $aMatch[2], $type,$args);
       }
       return call_user_func_array(Array($ToCall,$type.ucfirst($name)),$args);       
   }
   
   public function setPersistido($per) {
       $this->_persistido = $per;
   }
   
   public function getJoin($name) {
       if(!isset($this->$name)) {           
           $this->$name = $this->getModelInfo()->getJoin($name)->newInstance();
       }
       if($this->_persistido) {
           $this->$name->storage()->get();
       }
       return $this->$name;
   }


   public function beanGetProperty($name) {
       return $this->callProperty($this, $name, 'get');
   }

   public function beanSetProperty($name,$value) {
       return $this->callProperty($this, $name, 'set',Array($value));
   }
   
   private function extractClassFromString($method) {
        preg_match('/(\w*)\.(.*)/',$method,$aMatch);
        if(count($aMatch) > 0) {
            return $aMatch;
        }
        else {
            return false;
        }       
   }
        

   public function __toString() {
       return get_class($this);
   }

   public function storage() {
       $oStore = self::getStorage();
       $oStore->setModel($this);
       return $oStore;
   }

   /**
   * @todo Retornar a conexão de acordo com o setado no modelo
   */
   public static function getStorage() {
       $oStore = new \Faderim\DataBase\RelationalStorage();
       $oStore->setModelInfo(self::getModelInfo());
       $oStore->setConnection(\Faderim\Core\Engine::getInstance()->getConnection(false));
       return $oStore;
   }

   

   /**
    *
    * @return \Faderim\DataBase\ModelInfo
    */
   static public function getModelInfo()
   {
       $sClass = get_called_class();
       if(!isset(self::$infoModel[$sClass])) {
           self::$infoModel[$sClass] = \Faderim\DataBase\ModelInfo::newFromClass($sClass);       
       }
       return self::$infoModel[$sClass];
   }
   
   public function getJsonFormat() {
       $ModelInfo = $this->getModelInfo();
       $aData = Array();
       foreach($ModelInfo->getData() as $t) {
           $sName = $t->getModelName();
           $aData[$sName] = $this->beanGetProperty($sName);          
       }
       return $aData;
   }
}