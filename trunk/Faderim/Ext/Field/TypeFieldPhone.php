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
class TypeFieldPhone extends TypeField {

    function __construct($name) {
        parent::__construct($name);
    }

    public function getExtType() {
        return 'Text';
    }

}

