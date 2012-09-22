<?php

namespace Faderim\Framework\View;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseViewForm
 *
 * @author Ricardo
 */
abstract class BaseViewForm extends \Faderim\Ext\FormPanel {

    final public function __construct() {
        parent::__construct($this->getFormName());
        $this->createComponents();
    }

    abstract protected function getFormName();

    abstract protected function createComponents();
}