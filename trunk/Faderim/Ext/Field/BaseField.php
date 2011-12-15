<?php
namespace Faderim\Ext\Field;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Container
 *
 * @author Ricardo
 */
abstract class BaseField extends \Faderim\Ext\Component
{
    const FIELD_NUMBER = 'number';
    /*
     * @var TypeField
     */
    protected $TypeField;
    public function __construct($type,$name,$title = 'Label')
    {
        parent::__construct($name);
        $this->setType($type);
        $this->setTitle($title);
    }
    
    public function setType($type) {
        $this->type = $type;
        $sClassName = __NAMESPACE__.'\\TypeField'.ucwords($type);
        $this->TypeField = new $sClassName($this->getName());
    }
    
    public function getTypeField() {
        return $this->TypeField;
    }
    
    public function getType() {
        return $this->type;
            
    }
    
    public function setSize($size) {
        $this->setProperty('size', $size);
    } 
    
    public function setFlexSize($size = 1) {
        $this->setProperty('flex', $size);  
    }
    
    
    public function setTitle($title) {
        $this->setProperty('fieldLabel', $title);
    }
    
    public function getTitle() {
        return $this->getProperty('fieldLabel');
    }
    

}
