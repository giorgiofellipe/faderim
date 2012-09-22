<?php

namespace Faderim\Framework\Controller;

/**
 * Description of BaseController
 *
 * @author Ricardo
 */
abstract class BaseController {

    protected $View;

    /**
     *
     * @var \Faderim\Framework\Model\BasicPage
     */
    protected $Page;

    public function __construct(\Faderim\Framework\Model\ActionPage $Page) {
        $this->Page = $Page;
        $this->View = $this->getView();
    }

    abstract public function render();

    abstract protected function getView();
}