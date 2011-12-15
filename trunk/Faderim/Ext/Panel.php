<?php
namespace Faderim\Ext;

/**
 * Description of TabPanel
 *
 * @author Ricardo
 */
class Panel extends Container
{
    const REGION_CENTER = 'center';
    const REGION_NORTH  = 'north';
    const REGION_SOUTH  = 'south';    

    public function setRegion($region) {
        $this->setProperty('region', $region);
    }
/*    protected function setDefaultProperties()
    {
        $this->setSplit(true);
        $this->setCollapsible(true);
    }
  */  
    public function setSplit($bSplit) {
        $this->setProperty('split', (bool) $bSplit);
    }
    
    public function setCollapsible($collapse) {
        $this->setProperty('collapsible',(bool) $collapse);
    }
    
    protected function getExtClassName()
    {
        return 'Panel';
    }
    
    /**
     *
     * @return Listener
     */
    public function getListener() {
        if($oList = $this->getProperty('listeners')) {            
            return $oList;
        }
        else {
            $oList = new Listener($this);
            $this->setProperty('listeners',$oList);    
            return $oList;
        }        
    }
}

