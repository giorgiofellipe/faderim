<?php
namespace Faderim\Ext\Store;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseStore
 *
 * @author Ricardo
 */
abstract class BaseStore extends \Faderim\Ext\Component
{
    private $fields = Array();
    public function __construct()
    {
        
    }
    
    public function addField(\Faderim\Ext\Field\TypeField $Field) {
        $this->fields[] = $Field;        
    }
    
    //getExtClassName
    protected function getExtClassName()
    {
        return 'Ext.data.'.$this->getTypeStore().'Store';
    }
    
    abstract public function getTypeStore();
    
    protected function getExtProperties()
    {
        $aProps = parent::getExtProperties();
        $aProps['fields'] = $this->getArrayFields();
        return $aProps;
    }
    
    public function getFields() {
        return $this->fields;
    }
    
    protected function getArrayFields() {
        $aFields = Array();
        foreach($this->fields as $oField) {
            $aFields[] = Array('name' => $oField->getName());
        }        
        return $aFields;
    }
    //put your code here
}

?>
