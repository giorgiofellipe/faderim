<?php
namespace Faderim\Config;


class Persistence extends BaseEngine
{
    private $fileConfig;

    protected function getFileConfig()
    {
        return 'persistence/'.$this->fileConfig;
    }

    public function setFileConfig($sFileName)
    {
        $this->fileConfig = $sFileName;
    }

    protected function parseXpath(\Faderim\Reader\XPath $xPath)
    {
        $sCnxName = $xPath->queryFirstValue('//connection/@name');
        $sType    = $xPath->queryFirstValue('//connection/type');
        $sHost    = $xPath->queryFirstValue('//connection/host');
        $sPort    = $xPath->queryFirstValue('//connection/port');
        $sUser    = $xPath->queryFirstValue('//connection/user');
        $sPass    = $xPath->queryFirstValue('//connection/password');
        $sData    = $xPath->queryFirstValue('//connection/database');
        $bDefault = $xPath->queryFirstValue('//connection/default');
        $oCnx = \Faderim\DataBase\BaseConnection::factory($sType,$sHost,$sPort,$sUser,$sPass,$sData);
        \Faderim\Core\Engine::getInstance()->addConnection($sCnxName,$oCnx,$bDefault);
    }
}