<?php

namespace Faderim\Ext;

/**
 * Description of ComponentLoader
 *
 * @author Ricardo
 */
class ComponentLoader extends Component {

    public function getExtClassName() {
        return 'Ext.ComponentLoader';
    }

    public function setAutoLoad($xPropValue, $sUrl) {
        $this->setProperty('autoLoad', (bool) $xPropValue);
        $this->setProperty('url', $sUrl);
        $this->setProperty('renderer', 'component');
    }

}
