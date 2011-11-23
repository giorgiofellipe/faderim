<?php
namespace Faderim\Reader;

class File {

    /**
    * Return a file content
    *
    * @param mixed $sEnder
    * @return string
    */
    static function readAsString($sFileEnder)
    {
        return file_get_contents(self::getFileName($sFileEnder));
    }

    /**
    * put your comment there...
    * @return DomDocument
    */
    static function readAsXml($sFileEnder)
    {
        $oDom = new \DOMDocument();
        $oDom->loadXML(self::readAsString($sFileEnder));
        return $oDom;
    }

    static function readAsXpath($sFileEnder)
    {
        $oDom = self::readAsXml($sFileEnder);
        $oXpath = new Xpath($oDom);
        return $oXpath;
    }


    static function getFileName($sEnder)
    {
        return str_replace("\\",'/',$sEnder);
    }
}
?>