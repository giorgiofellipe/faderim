<?php

namespace Faderim\DataBase;

class PostgreConnection extends RelationalConnection {

    protected function getPrefixFunctionCnx() {
        return 'pg';
    }

    protected function getArrayParamConnect() {
        return Array($this->getStringConnect());
    }

    protected function getStringConnect() {
        $sCnx = '';
        $sHost = $this->getHost();
        $sPort = $this->getPort();
        $sUser = $this->getUser();
        $sPass = $this->getPassword();
        $sDb = $this->getDatabase();
        $sCnx .= (!empty($sHost)) ? "host='" . $sHost . "' " : '';
        $sCnx .= (!empty($sPort)) ? "port='" . $sPort . "' " : '';
        $sCnx .= (!empty($sUser)) ? "user='" . $sUser . "' " : '';
        $sCnx .= (!empty($sPass)) ? "password='" . $sPass . "' " : '';
        $sCnx .= (!empty($sDb)) ? "dbname='" . $sDb . "' " : '';
        return $sCnx;
    }

}