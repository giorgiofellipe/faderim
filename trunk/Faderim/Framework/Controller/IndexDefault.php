<?php

namespace Faderim\Framework\Controller;

class IndexDefault extends BaseControllerHtml {

    protected function getView() {
        return new \Faderim\Framework\View\Index();
    }

}

