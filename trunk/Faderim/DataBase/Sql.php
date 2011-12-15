<?php
namespace Faderim\DataBase;
class Sql {
    private $Cnx;
    private $sql;
    private $Resource;
    const TOKEN_SELECT = 'SELECT ';
    const TOKEN_UPDATE = 'UPDATE ';
    const TOKEN_DELETE = 'DELETE ';
    const TOKEN_FROM   = 'FROM ';
    const TOKEN_INSERT = 'INSERT ';
    const TOKEN_WHERE  = 'WHERE ';

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
        if(!@$this->Resource = $this->query()) {
            throw new \Exception($this->Cnx->getError());
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
    
    private function travaValorSql($xVal) {
        if(empty($xVal)) {
            return "null";
        }
        else {
            return "'".$this->escapeVal($xVal)."'";
        }
    }
    
    protected function escapeVal($val) {
        return $val;
    }

    public function mountInsert($sTableName,Array $aDados) 
    {
        $sSql = self::TOKEN_INSERT.' into '.$sTableName;
        $aColName = Array();
        $aVals = Array();
        foreach($aDados as $sColName => $xValueCol) {
            $aColName[] = $sColName;
            $aVals[] = $this->travaValorSql($xValueCol);
        }
        $sSql .= '('.implode($aColName,',').') VALUES ('.implode($aVals,',').')';
        $this->setSql($sSql);
    }
    
    public function mountUpdate($sTableName,Array $aDados,Array $aWhere)
    {
        $sSql = self::TOKEN_UPDATE. ' '.$sTableName.' set ';
        $aSet = Array();
        foreach($aDados as $sColName => $xValueCol) {
            $aSet[] = $sColName.' = '.$this->travaValorSql($xValueCol);
        }        
        $sSql.= implode(', ',$aSet);
        unset($aSet);
        $aTempWhere = Array();
        $sSql.= ' '.self::TOKEN_WHERE;
        foreach($aWhere as $sColName => $xValueCol) {
            $aTempWhere[] = $sColName.' = '.$this->travaValorSql($xValueCol);
        }        
        $sSql .= implode(' and ',$aTempWhere);
        $this->setSql($sSql);              
    }
    
    public function mountDelete($sTableName,Array $aWhere) {
        $sSql = self::TOKEN_DELETE.' '.self::TOKEN_FROM.' ' .$sTableName.' ';
        $aTempWhere = Array();
        $sSql.= ' '.self::TOKEN_WHERE;
        foreach($aWhere as $sColName => $xValueCol) {
            $aTempWhere[] = $sColName.' = '.$this->travaValorSql($xValueCol);
        }        
        $sSql .= implode(' and ',$aTempWhere);
        $this->setSql($sSql);                  
       
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
    
    public function addCondition($sCol,$sOperador,$sValue) {
        $sCondition;
        if(strpos($this->sql,'where')) {
            $sCondition = ' and ';           
        }
        else {            
            $sCondition = ' where ';           
        }
        $sCondition.= $sCol.' '.$sOperador.' '.$this->travaValorSql($sValue);        
        $this->sql.= $sCondition;
    }
}

