<?php
namespace Faderim\Ext;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Container
 *
 * @author Ricardo
 */
class Container extends Component
{
    const LAYOUT_COLUMN = 'column';
    
    protected $itemsProp=  "items";   
    public function addChild($Child) {
        $aItens = $this->getProperty($this->itemsProp);
        if(is_null($aItens)) {
            $aItens = Array();
        }
        $aItens[] = $Child;
        $this->setProperty($this->itemsProp, $aItens);
    }
    
    public function addChilds() {
        $args = func_get_args();
        foreach($args as $argAtual) {
            $this->addChild($argAtual);
        }
    }
    
    public function setLayout($layout) {
        $this->setProperty('layout', $layout);
    }
    
    protected function getExtClassName() {
        return 'Ext.container.Container';
    }    
    
    /**
     * @return ComponentLoader
     */
    public function getLoader() {
        $oLoader = new ComponentLoader('loader_'.$this->getName());
        $this->setProperty('loader', $oLoader);
        return $oLoader;
    }

}
