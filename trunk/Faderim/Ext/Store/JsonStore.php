<?php
namespace Faderim\Ext\Store;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class JsonStore extends BaseStore {
    
    private $url;
    
    public function setUrl($url) {
        $this->url = $url;
    }
    
    protected function getExtProperties()
    {
        $aProp = parent::getExtProperties();
        $aProp['autoLoad'] = true;
        $aProp['proxy'] = Array('type'=>'ajax','url'=>$this->url,'reader'=>Array('type'=>'json'));
        return $aProp;
    }
       
        
    
    public function getTypeStore() {
        return 'Json';
    }
}

