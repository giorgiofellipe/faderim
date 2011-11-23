<?php
namespace Faderim\Core;
/**
* Titulo
* @package
* @subpackage Model
* @since
* @author
*/
abstract class BaseModel {

    
    public function __call($sMethod,$aArgs) {
        if(preg_match('/^([set|get]+)(\w+)$/',$sMethod,$aMatch)) {
            $sProperty = strtolower($aMatch[2]);
            if($aMatch[1]=='set') {
                $this->$sProperty = $aArgs[0];
            }
            else if($aMatch[1]=='get') {
                return $this->$sProperty;
            }
        }
   }


   public function beanGetProperty($sPropName) {
       return $this->$sPropName;
   }

   public function beanSetProperty($sPropName,$xValue) {
       return $this->$sPropName = $xValue;
   }


   public function __toString() {
       return get_class($this);
   }

   /**
   *
   */
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


   static public function getModelInfo()
   {
       $sClass = get_called_class();
       return \Faderim\DataBase\ModelInfo::newFromClass($sClass);
   }
}
?>