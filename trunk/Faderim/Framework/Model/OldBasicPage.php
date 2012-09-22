<?php

namespace Faderim\Framework\Model;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @inherit Page
 */
class BasicPage extends Page {

    public function getControllerName() {
        return $this->getPageClassName('Controller');
    }

    public function getViewName($aditional = '') {
        return $this->getPageClassName('View', $aditional);
    }

    public function getModelName($aditional = '') {
        return $this->getPageClassName('Model', $aditional);
    }

    public function getPageClassName($sType, $aditional = '') {
        return $this->getSystem()->getPackage() . '\\' . $sType . '\\' . ucfirst($this->name) . ucfirst($aditional);
    }

    public function getControllerNameForAction($action) {
        return $this->getControllerName() . ucfirst($action);
    }

    public function getControllerDefaultForAction($action) {
        if ('grid' == $action) {
            return 'Faderim\\Framework\\Controller\\BasicGrid';
        }
    }

}

