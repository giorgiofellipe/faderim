<?php

namespace Faderim\Framework\Controller;

/**
 * @author Ricardo Schroeder
 */
abstract class BaseControllerJson extends BaseController {

    protected $jsonReturn = null;

    public function render() {
        header('Content-type:text/json');
        echo \Faderim\Json\Json::encode($this->jsonReturn);
    }

    protected function setJsonReturn($mixed) {
        $this->jsonReturn = $mixed;
    }

}