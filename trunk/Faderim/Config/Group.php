<?php
namespace Faderim\Config;
class Group {
    private $className;

    public function __construct($className) {
        $this->setClassName($className);
        $this->read();
    }

    public function setClassName($sClassName) {
        $this->className = $sClassName;
    }

    public function getClassName() {
        return $this->className;
    }

    protected function read() {

        $sDirName = $this->getClassName();
        $sDirPath = BaseEngine::DIR_CONFIG.'/'.$sDirName;
        $iterator = new \DirectoryIterator($sDirPath);

        foreach($iterator as $oFile) {
            if(!$oFile->isDot() and $oFile->isFile()) {
                $this->parseConfig($oFile->getFileName());
            }
        }
    }

    protected function parseConfig($sFileConfig) {
        $sClass = __NAMESPACE__.'\\'.$this->getClassName();
        $oClass = new $sClass();
        $oClass->setFileConfig($sFileConfig);
        $oClass->parseEngine();

    }
}