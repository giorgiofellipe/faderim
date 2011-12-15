<?php
namespace Faderim\DataBase;
class MysqlQuery extends Sql {
    
    protected function query() {
        $sQuery = $this->Cnx->getFunctionName('query');
        return $sQuery( $this->getSql() , $this->getResourceCnx());
    }


}
?>