<?php
namespace Faderim\Framework\Model;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ActionPage
 *
 * @author Ricardo
 * @table faderim_action_page
 */
class ActionPage extends BaseModel
{
    /**
     * @id true
     * @Join Action
     */
    protected $Action;

    /**
     * @id true
     * @Join Page
     */
    protected $Page;


    public function getAction()
    {
        return $this->getJoin('Action');
    }

    public function getPage()
    {
        return $this->getJoin('Page');
    }


    public function getControllerName() {
        return $this->getPageClassName('Controller',$this->getAction()->getName());
    }

    public function getViewName($aditional = '') {
        return $this->getPageClassName('View',$aditional);
    }

    public function getModelName($aditional = '') {
        return $this->getPageClassName('Model',$aditional);
    }

    public function getPageClassName($sType,$aditional='') {
        return $this->getPage()->getSystem()->getPackage().'\\'.$sType.'\\'.ucfirst($this->getPage()->getName()).  ucfirst($aditional);
    }

    public function getControllerDefaultForAction() {
         if( 'grid' == $this->getAction()->getName() )  {
             return 'Faderim\\Framework\\Controller\\BasicGrid';
         }
         else {
             throw new \Exception('No default Controller defined for '.$this->getAction()->getName());
         }
    }

}

