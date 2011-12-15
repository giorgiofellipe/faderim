<?php
namespace Faderim\Ext\Field;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TextTypeField
 *
 * @author Rick
 */
class TypeFieldList extends TypeField {
    
    function __construct($name) {
        parent::__construct($name);
        $this->setCustomProperty('valueField','val');
        $this->setCustomProperty('displayField','name');
    }

    
    public function getLocalStore() {
        $this->setCustomProperty('queryMode','local');
        $Store = new \Faderim\Ext\Store\FieldListDefaultStore();
        $this->setCustomProperty('store',$Store);
        return $Store;
    }
    
    public function getExtType() {
        return 'ComboBox';
    }    
}

