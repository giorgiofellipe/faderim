<?php
namespace Faderim\Reflection;
class ModelAnotation extends ParseAnotation {

    public function __construct($sClass)
    {
        $oReflection = new \ReflectionClass($sClass);
        $this->setReflector($oReflection);
    }

    /**
    * Retorna o nome da tabela a ser utilizada pelo modelo
    */
    public function getTable() {
        return $this->parseAnotation('table');
    }

    /**
    * @return ModelPropertyAnotation[]
    */
    public function getProperties() {
        $aEmpty = Array();
        $aReflection = $this->Reflector->getProperties();
        foreach($aReflection as $oPropertyReflec) {
            $aEmpty[] = new ModelPropertyAnotation($oPropertyReflec);
        }
        return $aEmpty;
    }




}



    //abstract function getAnnotations();

