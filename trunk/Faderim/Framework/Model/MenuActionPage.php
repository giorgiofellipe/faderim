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
 * @table faderim_menu_action_page
 */
class MenuActionPage extends BaseModel
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
    
    /**
     *
     * @id true
     * @Join Menu
     */
    protected $Menu;


    public function getAction()
    {
        return $this->getJoin('Action');
    }

    public function getPage()
    {
        return $this->getJoin('Page');
    }
    
    public function getMenu() {
        return $this->getJoin('Menu');
    }


}

