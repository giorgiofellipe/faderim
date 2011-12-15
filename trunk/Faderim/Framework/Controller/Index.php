<?php

namespace Faderim\Framework\Controller;

class Index extends BaseControllerHtml {
    
    protected function getView() {        
        return new \Faderim\Framework\View\Index();
    }
    
}

