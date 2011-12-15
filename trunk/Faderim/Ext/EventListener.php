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
class EventListener implements \Faderim\Json\JsonSerializable
{
    private $functionName;
    private $params;
    public function __construct($args)
    {
        $this->functionName = array_shift($args);
        $aParams = Array();
        foreach($args as $argAtual) {
            if($argAtual instanceof Component) {
                
            }
            else {
                $aParams[] = \Faderim\Json\Json::encode($argAtual);                
            }
            
        }
        $this->params = '['.implode(',',$aParams).']';
    }
    
    
   public function getJsonFormat()
   {
       return "function(obj) { console.log('obj',obj); console.log('this',this);  return ".$this->functionName.".apply(this,".$this->params.");}";           
   }
}


