<?php
namespace Faderim\Reflection;
class ModelPropertyAnotation extends ParseAnotation {

    public function __construct(\ReflectionProperty $oReflection)
    {
        $this->setReflector($oReflection);
    }

    public function getName() {
        return $this->Reflector->getName();
    }


}



    //abstract function getAnnotations();

