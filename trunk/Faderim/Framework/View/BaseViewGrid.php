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
abstract class BaseViewGrid extends \Faderim\Ext\GridPanel
{

    final public function __construct()
    {
        parent::__construct($this->getPageName().'-grid');
        $this->createComponents();
        $this->getStore()->setUrl('?p='.$this->getPageName().'&a=grid&pr=renderData');
    }

    abstract protected function getPageName();

    abstract protected function createComponents();

}

