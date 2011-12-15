<?php
namespace Faderim\Ext;

/**
 * Description of GridPanel
 *
 * @author Ricardo
 */
class GridPanel extends Panel
{
    protected $itemsProp=  "columns";   
    /**
     * @var Store\JsonStore 
     */
    private $Store;


    protected function getExtClassName()
    {
        return 'Ext.grid.Panel';
    }
    
    public function addChild($Child)
    {
        parent::addChild($Child);
        $this->Store->addField($Child->getTypeField());        
    }

    protected function setDefaultProperties()
    {        
        $this->Store = new Store\JsonStore(); 
        $this->setProperty('store', $this->Store);  
    }
    
    public function getStore() {
        return $this->Store;
    }

}

