<?php
namespace Faderim\DataBase;
class Sql {
    private $Cnx;
    private $sql;
    private $Resource;
    const TOKEN_SELECT = 'SELECT';
    const TOKEN_FROM   = 'FROM';
    const TOKEN_INSERT = 'INSERT';

    public function __construct(\Faderim\DataBase\PostgreConnection $Cnx) {
        $this->Cnx = $Cnx;
    }

    public function setSql($sSql) {
        $this->sql = $sSql;
    }

    public function getSql() {
        return $this->sql;
    }

    public function execute() {
        if(!$this->Resource = $this->query()) {
            throw new Exception($this->Cnx->getError());
        }
    }

    protected function query() {
        $sQuery = $this->Cnx->getFunctionName('query');
        return $sQuery($this->getResourceCnx(), $this->getSql());
    }

    public function fetch() {
        $sFn = $this->Cnx->getFunctionName('fetch_object');
        return $sFn($this->Resource);
    }

    public function fetchAll() {
        $aRetorno = Array();
        while($oRes = $this->fetch()) {
            $aRetorno[] = $oRes;
        }
        return $aRetorno;
    }

    public function free() {
        pg_free_result($this->Resource);
    }

    public function mountInsert($sTableName,Array $aDados) {
        $sSql = self::TOKEN_INSERT.' into '.$sTableName;
        $aColName = Array();
        $aVals = Array();
        foreach($aDados as $sColName => $xValueCol) {
            $aColName[] = $sColName;
            if(empty($xValueCol)) {
                $aVals[] = "null";
            }
            else {
                $aVals[] = "'".$xValueCol."'";
            }
        }
        $sSql .= '('.implode($aColName,',').') VALUES ('.implode($aVals,',').')';
        $this->setSql($sSql);
        return $sSql;
    }

    public function mountSelect($sTableName,Array $aCols) {
        $sSql = self::TOKEN_SELECT.' '.implode($aCols,',').' '.self::TOKEN_FROM.' ';
        $sSql.= $sTableName;
        $this->setSql($sSql);
    }

    public function getResourceCnx() {
        if(!$this->Cnx->isOpened()) {
            $this->Cnx->open();
        }
        return $this->Cnx->getResource();
    }
}

