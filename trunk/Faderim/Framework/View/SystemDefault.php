<?php

namespace Faderim\Framework\View;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SystemDefault
 *
 * @author Rick
 */
class SystemDefault extends \Faderim\Ext\Container {
    //put your code here
    
    function __construct() {
        parent::__construct('SystemContainer');
        $this->setTitle('System');
        $oForm = new SystemForm();
        $oForm->setRegion('north');
        $this->addChild($oForm);
        $oGrid = new SystemGrid();
        $oGrid->setRegion('center');
        $this->addChild($oGrid);
        $this->setLayout('border');
        $oForm->setCollapsible(true);
        $oForm->setSplit(true);
    }

}

?>
