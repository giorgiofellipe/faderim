<?php

namespace Faderim\DataBase;

abstract class RelationalConnection extends BaseConnection {

    private $Resource;
    private $bInTransaction;

    public function open() {
        $sFnConnect = $this->getFunctionName('connect');
        if (!function_exists($sFnConnect)) {
            throw new Exception('Função ' . $sFnConnect . 'não habilitada');
        }
        $this->Resource = call_user_func_array($sFnConnect, $this->getArrayParamConnect());
        if (!$this->Resource) {
            throw new \Exception('Não foi possível conectar no DB');
        }
        $this->afterConnect();
        //$this->Resource = $sFnConnect($this->getStringConnect());
    }

    public function getFunctionName($sFunction) {
        $sProperty = strtoupper('function_' . $sFunction);
        $sConstante = get_class($this) . '::' . $sProperty;
        if (defined($sConstante)) {
            return constant($sConstante);
        }
        return $this->getPrefixFunctionCnx() . '_' . $sFunction;
    }

    public function close() {
        if ($this->isOpened()) {
            $sFunction = $this->getFunctionName('close');
            $sFunction($this->Resource);
            $this->Resource = null;
        }
    }

    public function isOpened() {
        return is_resource($this->Resource);
    }

    public function getError() {
        $sFunction = $this->getFunctionName('last_error');
        return $sFunction($this->Resource);
    }

    abstract protected function getPrefixFunctionCnx();

    abstract protected function getArrayParamConnect();

    public function getResource() {
        return $this->Resource;
    }

    public function getQuery() {
        $sClass = get_class($this);
        $sBase = str_replace('Connection', 'Query', $sClass);
        return new $sBase($this);
    }

}
