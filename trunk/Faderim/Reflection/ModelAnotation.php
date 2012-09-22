<?php

namespace Faderim\Reflection;

class ModelAnotation extends ParseAnotation {

    private $className;

    public function __construct($sClass) {
        $this->className = $sClass;
        $oReflection = new \ReflectionClass($this->className);
        $this->setReflector($oReflection);
    }

    public function getClassName() {
        return $this->className;
    }

    public function getInherited() {
        $sAnno = $this->ParseAnotation('inherit');
        if ($sAnno) {
            return $this->Reflector->getNamespaceName() . '\\' . $sAnno;
        } else {
            return false;
        }
    }

    public function getPackage() {
        $iPos = strrpos($this->className, '\\');
        if (!$iPos) {
            return null;
        }
        return substr($this->className, 0, $iPos);
    }

    public function newInstance() {
        return $this->Reflector->newInstance();
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
        foreach ($aReflection as $oPropertyReflec) {
            $aEmpty[] = new ModelPropertyAnotation($oPropertyReflec);
        }
        return $aEmpty;
    }

}
