<?php
namespace Faderim\Framework\Model;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Page
 *
 * @author Ricardo
 * @table faderim_page
 */
class Page extends BaseModel
{
    /**
     * @join System
     */
    protected $System;
    /**
     * @id true
     * @colname page_name
     */
    protected $name;    
    
    /**
     *
     * @colname page_title 
     */
    protected $title;
    
    
    
    public function getSystem() {
        return $this->getJoin('System');
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }


}

