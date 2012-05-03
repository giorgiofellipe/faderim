<?php
namespace Faderim\Framework\View;
use Faderim\Ext\Field as Field;
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
        
        $this->setTitle('Manutenção');
        $o = new Field\FormField('number','id','Código',true,5);
        $this->addChild($o);          
        
        $o = new Field\FormField('text','name','Nome',true,50);
        $this->addChild($o);        
        
        $o = new Field\FormField('text','descr','Descrição',true,50);
        $this->addChild($o);                
    }    
}