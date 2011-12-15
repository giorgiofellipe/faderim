<?php
namespace Faderim\Framework\Model;

/**
 * @table faderim_menu
 */
class Menu extends BaseModel {
    /**
     *
     * @id true
     * @colname menu_id
     */
    private $id;
    /**
     * @join System
     */
    private $System;
    /**
     *
     * @colname menu_name
     */
    private $name;
    
    public function getId()     {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getSystem()
    {
        if(!isset($this->System)) {
            $this->System = new System;            
        }
        return $this->System;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

  
    
    
    
}