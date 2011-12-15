<?php
namespace Faderim\Reader;

class XPath {
    /**
    * @var DOMXPath
    */
    private $XPath;

    /**
    * Construtor, � necess�rio informa qual o Documento XML que est� se fazendo a an�lise
    *
    * @param DOMDocument $oXml Documento XML
    * @return XPathReader
    */
    public function __construct(\DOMDocument $oXml) {
        $this->XPath = new \DOMXPath($oXml);
    }

    /**
    * Executa uma query sobre o Nosso documento XML.
    * A estrutura de query segue o padr�o XPath (sele��o e predicado)
    *
    * @param String $sQuery Query a ser executada
    * @param mixed $oBase N� base para a query
    * @return DOMNodeList
    */
    public function query($sQuery,$oBase = false) {
        if($oBase) {
            return $this->XPath->query($sQuery,$oBase);
        }
        else {
            return $this->XPath->query($sQuery);
        }
    }

    /**
    * Executa uma fun��o agregada em cima do documento XML
    *
    * @param String $sQuery Query a ser executada
    * @return mixed
    */
    public function execute($sQuery) {
        return $this->XPath->evaluate($sQuery);
    }

    /**
    * Executa uma query e retorna o primeiro elemento que a mesma encontrar
    *
    * @param mixed $sQuery
    * @param mixed $oBase
    * @return DOMNode
    */
    public function queryFirst($sQuery,$oBase = false) {
        return $this->query($sQuery,$oBase)->item(0);
    }

    /**
    * Executa uma query e retorna o valor do primeiro elemento, seja ele um n� ou atributo
    *
    * @param mixed $sQuery
    * @param mixed $oBase
    * @return string
    */
    public function queryFirstValue($sQuery,$oBase = false) {
        if($oNode = $this->queryFirst($sQuery,$oBase)) {
            return $oNode->nodeValue;
        }
    }

    public function queryAllValue($sQuery,$oBase = false) {
        $aText = Array();
        $oNodes = $this->query($sQuery,$oBase);
        for($i = 0; $i<$oNodes->length;$i++) {
            $aText[] = $oNodes->item($i)->nodeValue;
        }
        return $aText;
    }
}
?>