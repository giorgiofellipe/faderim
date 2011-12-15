<?php
namespace Faderim\Framework\View;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of System
 *
 * @author Ricardo
 */
class SystemForm extends BaseViewForm
{
    
    public function getFormName() {
        return 'systemForm';
    }
    
    public function createComponents() {
        $o = new \Faderim\Ext\Field\FormField('text','id','Código',true,5);
        $this->addChild($o);        
        $o = new \Faderim\Ext\Field\FormField('numeric','name','Nome',true,50);
        $this->addChild($o);        
        $o = new \Faderim\Ext\Field\FormField('text','descr','Descrição',true,50);
        $this->addChild($o);                
    }    
}