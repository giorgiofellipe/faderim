<?php

namespace Faderim\Ext\Store;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FieldListDefaultStore
 *
 * @author Rick
 */
class FieldListDefaultStore extends ArrayStore {

    function __construct() {
        $this->addField(new \Faderim\Ext\Field\TypeFieldText('val'));
        $this->addField(new \Faderim\Ext\Field\TypeFieldText('name'));
    }

    public function addOption($optionValue, $optionDescr) {
        $this->addRow(Array($optionValue, $optionDescr));
    }

}
