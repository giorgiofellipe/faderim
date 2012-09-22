<?php

namespace Faderim\Framework\View;

/**
 * Description of System
 *
 * @author Ricardo Schroeder
 */
class SystemGrid extends BaseViewGrid {

    public function getPageName() {
        return 'system';
    }

    public function createComponents() {
        $this->setTitle('Consulta System');
        $this->addChild(new \Faderim\Ext\Field\GridField('text', 'id', 'ID', 20));
        $this->addChild(new \Faderim\Ext\Field\GridField('text', 'name', 'Nome'));
        $this->addChild(new \Faderim\Ext\Field\GridField('text', 'description', 'Descrição'));
    }

}