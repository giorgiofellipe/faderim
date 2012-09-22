<?php
namespace Faderim\Ext;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TreeNode
 *
 * @author Ricardo
 */
class Listener implements \Faderim\Json\JsonSerializable
{
    private $event = Array();
    protected function addListener($sType,Array $args) {
        $this->event[$sType] = Array('element'=>'body',
                                          'fn'=>new EventListener($args));
    }
    
    public function onClick() {
        $this->addListener('click', func_get_args());        
    }
    public function onDoubleClick() {
        $this->addListener('select', func_get_args());        
    }
    
    
   public function getJsonFormat()
   {
       return $this->event;
       /*
       return "{
                click: {
                  element: 'el',
                  fn: function(n) { alert(n) }
              }
            }";
        * 
        */
   }
}