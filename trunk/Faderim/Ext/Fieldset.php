<?php
namespace Faderim\Ext;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fieldset
 *
 * @author Rick
 */
class Fieldset extends Container {
    
    
    protected function setDefaultProperties() {
        $this->setProperty('collapsible', true);
    }
    
    
    protected function getExtClassName() {
        return 'Ext.form.FieldSet';
    }
    
}

?>
