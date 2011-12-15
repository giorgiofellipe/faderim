<?php
namespace Faderim\DataBase;
class MysqlConnection extends RelationalConnection {
    const FUNCTION_LAST_ERROR = 'mysql_error';

    protected function getPrefixFunctionCnx() {
        return 'mysql';
    }

    protected function getArrayParamConnect() {
        $sHost = $this->getHost().':'.$this->getPort();
        return Array($sHost,$this->getUser(),$this->getPassword());
    }

    protected function afterConnect() {
        if(!mysql_select_db($this->getDatabase(), $this->getResource())) {
            throw new Exception('Não foi possível setar o banco de dados '.$this->getDatabase());
        }
    }
}
