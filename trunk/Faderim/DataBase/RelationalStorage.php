<?php

namespace Faderim\DataBase;

class RelationalStorage extends Storage {

    /**
     * Insert the current object into storage
     * @return boolean 
     */
    public function insert() {
        $oQuery = $this->getConnection()->getQuery();
        $aDados = Array();
        foreach ($this->getModelInfo()->getData() as /** @var \Faderim\DataBase\ModelDataInfo */$Model) {
            $sCol = $Model->getColName();
            $xProp = $this->getModel()->beanGetProperty($sCol);
            $aDados[$sCol] = $xProp;
        }
        $oQuery->mountInsert($this->getModelInfo()->getTable(), $aDados);
        return $oQuery->execute();
    }

    /**
     * Save the actual object into storage
     * @return type 
     */
    public function save() {
        $oQuery = $this->getConnection()->getQuery();
        $aDados = Array();
        $aId = Array();
        foreach ($this->getModelInfo()->getData() as /** @var \Faderim\DataBase\ModelDataInfo */$Model) {
            $sCol = $Model->getColName();
            $xProp = $this->getModel()->beanGetProperty($Model->getModelName());
            $aDados[$sCol] = $xProp;
            if ($Model->isId()) {
                $aId[$sCol] = $xProp;
            }
        }
        $oQuery->mountUpdate($this->getModelInfo()->getTable(), $aDados, $aId);
        return $oQuery->execute();
    }

    public function update() {
        
    }

    /**
     * Delete the current object from storage
     */
    public function clear() {
        $oQuery = $this->getConnection()->getQuery();
        $aId = Array();
        foreach ($this->getModelInfo()->getData() as /** @var \Faderim\DataBase\ModelDataInfo */$Model) {
            if ($Model->isId()) {
                $sCol = $Model->getColName();
                $xProp = $this->getModel()->beanGetProperty($Model->getModelName());
                $aId[$sCol] = $xProp;
            }
        }
        $oQuery->mountDelete($this->getModelInfo()->getTable(), $aId);
        return $oQuery->execute();
    }

    public function delete() {
        
    }

    public function get($findJoins = false) {
        $Cursor = $this->find();
        $Cursor->setModel($this->getModel());
        $ModelInfo = $this->getModelInfo()->getDataId();
        foreach ($ModelInfo as $oData) {
            $sModelName = $oData->getModelName();
            $xVal = $this->getModel()->beanGetProperty($sModelName);
            if (empty($xVal)) {
                throw new \Exception('Invalid valur for col ' . $sModelName);
            }
            $Cursor->filter($sModelName, '=', $xVal);
        }
        $Cursor->rewind();
        if ($findJoins) {
            $this->findJoins($findJoins);
        }
        return $Cursor->current();
    }

    private function findJoins($joinName) {
        foreach ($this->getModelInfo()->getJoins() as $sJoinName) {
            if ($joinName === true or in_array($sJoinName, $joinName)) {
                $oModel = $this->getModel()->beanGetProperty($sJoinName);
                $oModel->storage()->get();
            }
        }
    }

    public function find() {
        return new RelationalCursorStorage($this->getConnection()->getQuery(), $this->getModelInfo());
    }

    public function findOne($sColuna, $sValor = null) {
        if (is_array($sColuna)) {
            $Cursor = $this->find();
            foreach ($sColuna as $sCol => $val) {
                $Cursor->filter($sCol, '=', $val);
            }
        } else {
            $Cursor = $this->find()->filter($sColuna, '=', $sValor);
        }
        $Cursor->rewind();
        return $Cursor->current();
    }

}