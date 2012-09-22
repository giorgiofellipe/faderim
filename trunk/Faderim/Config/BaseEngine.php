<?php
namespace Faderim\Config;

abstract class BaseEngine
{
    const DIR_CONFIG = 'config';

    public function parseEngine()
    {
        $oXpath = \Faderim\Reader\File::readAsXpath(self::DIR_CONFIG.'/'.$this->getFileConfig());
        $this->parseXpath($oXpath);
    }

    abstract protected function getFileConfig();

    abstract protected function parseXpath(\Faderim\Reader\XPath $xPath);

}