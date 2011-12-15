<?php
namespace Faderim\Framework\Model;
/**
* @table faderim_system
*/
class System extends BaseModel
{
    /**
     * @id true
     * @colname system_id
     */
    protected $id;
    
    /**
     *
     * @colname system_name
     */
    protected $name;
    
    /**
     *
     * @colname system_package
     */
    protected $package;
    
    /**
     *
     * @colname system_desc
     */
    protected $description;
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setPackage($package) {
        $this->package = $package;
    }
    
    public function getPackage() {
        return $this->package;
    }
    
    public function setDescription($desc) { 
        $this->description = $desc;
    }
    
    public function getDescription()     {
        return $this->description;
    }
}