<?php

namespace Faderim\Ext;

/**
 * Description of TabPanel
 *
 * @author Ricardo
 */
class TreePanel extends Panel {

    /**
     * @var TreeNode 
     */
    private $Root;

    protected function setDefaultProperties() {
        $this->Root = new TreeNode('Root');
        $this->setProperty('root', $this->Root);
        $this->setProperty('rootVisible', false);
    }

    public function getRoot() {
        return $this->Root;
    }

    protected function getExtClassName() {
        return 'TreePanel';
    }

}