<?php
namespace Faderim\Ext;
/**
 * Description of Composite
 *
 * @author Ricardo
 */
class Component implements \Faderim\Json\JsonSerializable
{
    private $properties = Array();    
    
    public function __construct($name)
    {
        $this->setName($name);
        $this->setDefaultProperties();
    }
    
    protected function setDefaultProperties() {
    }
    
    public function setName($name) {
        $this->setProperty('name', $name);    
        $this->setProperty('id', $name);    
    }
    
    public function getName() {
        return $this->getProperty('name');
    }
    
    public function create() {
        $sResponse = 'Ext.create('.json_encode($this->getExtClassName()).','.  \Faderim\Json\Json::encode($this->getExtProperties()).')';
        return $sResponse;
    }    
    
    protected function getExtProperties() {
        return $this->properties;
    }
    
    public function setTitle($title) {
        $this->setProperty('title', $title);
    }
    
    public function setMargins($top = 0, $right = 0,$bottom = 0,$left = 0) {
        $this->setProperty('margins', implode(' ',func_get_args()));
    }

    public function setWidth($width) {        
        $this->setProperty('width', $width);
    }
    
    public function setProperty($sPropName,$xPropValue) {
        $this->properties[$sPropName] = $xPropValue;
    }
    
    public function getProperty($sPropName) {
        if(array_key_exists($sPropName, $this->properties)) {
            return $this->properties[$sPropName];
        }
        else {
            return null;
        }
    }
            
   
    public function getJsonFormat() {
        return $this->create();
    }
    
    protected function getExtClassName() {
        return get_class($this);
    }    
}

