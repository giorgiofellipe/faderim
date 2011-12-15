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
class Button extends Component
{
    public function __construct($name,$title = 'Button')
    {
        parent::__construct($name);
        $this->setTitle($title);
    }
    
    protected function getExtClassName()
    {
        return 'Ext.Button';
    }       
    
    public function setTitle($title) {
        $this->setProperty('text', $title);
    }

    /*

Ext.create('Ext.Button', {
    text: 'Click me',
    renderTo: Ext.getBody(),
    handler: function() {
        alert('You clicked the button!')
    }
});
}
    public function addChild($Child) {
        $aItens = $this->getProperty("items");
        if(is_null($aItens)) {
            $aItens = Array();
        }
        $aItens[] = $Child;
        $this->setProperty("items", $aItens);
    }
    
    public function setLayout($layout) {
        $this->setProperty('layout', $layout);
    }
*/
}
