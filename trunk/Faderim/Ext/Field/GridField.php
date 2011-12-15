<?php
namespace Faderim\Ext\Field;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormField
 *
 * @author Ricardo
 */
class GridField extends BaseField
{
    private $childProps = Array();
    //put your code here
    public function __construct($type,$name, $title = 'Field',$size = null)
    {
        parent::__construct($type,$name, $title);
        $this->setSize($size);
    }
    
    
    public function setSize($size) {
        if(is_int($size)) {
            $this->childProps['size'] = $size;
        }
        else {            
            $this->childProps['flex'] = 1;
        }
    } 
    
    
    public function getJsonFormat()
    {
        $this->childProps['text'] = $this->getTitle();
        $this->childProps['dataIndex'] = $this->getName();
        return $this->childProps;        
    }
        
}


