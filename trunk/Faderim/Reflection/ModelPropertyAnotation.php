<?php
namespace Faderim\Reflection;
class ModelPropertyAnotation extends ParseAnotation {
    CONST ANOTATION_ID = 'id';
    CONST ANOTATION_COLNAME = 'colname';

    public function __construct(\ReflectionProperty $oReflection)
    {
        $this->setReflector($oReflection);
    }

    public function getName() {
        return $this->Reflector->getName();
    }
    
    public function getId() {
        return $this->ParseAnotation(self::ANOTATION_ID,false);
    }
    
    public function getColName() {
        $sColName = $this->ParseAnotation(self::ANOTATION_COLNAME);
        if(!$sColName) {
            return $this->getName();
        }
        return $sColName;
    }
    
    public function getJoin() {
        return $this->ParseAnotation('join');
    }
    
    public function isJoin() {
        return ($this->getJoin()!==false);
    }


}



    //abstract function getAnnotations();

