<?php

namespace Faderim\Reflection;

class ParseAnotation {

    /**
     * @var Reflector
     */
    protected $Reflector;
    private $doc;

    protected function setReflector(\Reflector $oReflection) {
        $this->Reflector = $oReflection;
        $this->setDoc($oReflection->getDocComment());
    }

    public function setDoc($sDoc) {
        $this->doc = $sDoc;
    }

    public function getDoc() {
        return $this->doc;
    }

    protected function parseAnotation($sAnnotationName, $bDefault = false) {
        if (preg_match('/\@' . $sAnnotationName . ' (.+)/i', $this->getDoc(), $aMatch)) {
            return trim($aMatch[1]);
        }
        return $bDefault;
    }

}
