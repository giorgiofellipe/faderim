<?php
namespace Faderim\Config;
class EngineStart extends BaseEngine
{
    const XPATH_AUTOLOAD = '//config/autoload';

    protected function parseXpath(\Faderim\Reader\XPath $xPath) {
        $aValues = $xPath->queryAllValue(self::XPATH_AUTOLOAD);
        foreach($aValues as $sEngineAtual) {
            $this->startGroup($sEngineAtual);
        }
    }

    protected function startGroup($sNome) {       
        $oGroup = new Group($sNome);
    }

    protected function getFileConfig() {
        return 'startup.xml';
    }

}
