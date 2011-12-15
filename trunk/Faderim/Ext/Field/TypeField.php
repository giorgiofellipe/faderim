<?php
namespace Faderim\Ext\Field;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypeField
 *
 * @author Rick
 */
abstract class TypeField {
    private $customProperties = Array();
    private $name;
    
    function __construct($name) {
        $this->name = $name;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getExtType() {
        return 'Text';
    }
    
    protected function setCustomProperty($name,$value) {
        $this->customProperties[$name] = $value;
    }
    
    final public function getCustomProperties() {
        return $this->customProperties;
    }
    
}

?>
