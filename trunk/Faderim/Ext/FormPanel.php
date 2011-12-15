<?php
namespace Faderim\Ext;

/**
 * Description of FormPanel
 *
 * @author Ricardo
 */
class FormPanel extends Panel
{
    
    protected function getExtClassName()
    {
        return 'FormPanel';
    }

    protected function setDefaultProperties()
    {        
        $this->setProperty('buttons', $this->getDefaultButtons());
        //$this->setLayout('column');
        //$this->setProperty('defaults',Array('anchor'=>'100%'));
        $this->setProperty('bodyPadding','5');
        $this->setProperty('fieldDefaults',Array('msgTarget'=>'side',
                                                 'labelWidth'=>75,
                                                 'labelAlign'=>'top',
                                                 'xtype'=>'textfield'
                                                 ));
            
            /*
            Array('fieldLabel'=>'First Name','name'=>'first'),
            Array('fieldLabel'=>'First Name','name'=>'first','xtype'=>'numberfield','labelWidth'=>100),
            Array('fieldLabel'=>'First Name','name'=>'first','xtype'=>'combo','labelWidth'=>100,'editable'=>false,'queryMode'=>'local'),  
            Array('fieldLabel'=>'First Name','name'=>'first','labelWidth'=>100),
            Array('fieldLabel'=>'First Name','name'=>'first','labelWidth'=>100)*/

        //));
    }
    
    protected function getDefaultButtons() {
        return Array(new Button('btn_save','Save'),
                     new Button('btn_cancel','Cancel'));
    }
  
}

