<?php

namespace Faderim\Ext\Store;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ArrayStore extends BaseStore {

    private $data = Array();

    public function addRow(Array $aRow) {
        $this->data[] = $aRow;
    }

    protected function getExtProperties() {
        $aProp = parent::getExtProperties();
        $aProp['data'] = $this->data;
        return $aProp;
    }

    public function getTypeStore() {
        return 'Array';
    }

}

