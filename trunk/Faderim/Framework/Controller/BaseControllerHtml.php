<?php
namespace Faderim\Framework\Controller;

/**
 * @author Ricardo Schroeder
 */
abstract class BaseControllerHtml extends BaseController {
    
     public function render()
     {
         header('Content-type:text/html');
         $this->View->show();
     }
    
}