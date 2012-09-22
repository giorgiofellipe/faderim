<?php

namespace Faderim\Ext;

/**
 * Description of TreeNode
 *
 * @author Ricardo
 */
class TreeNode implements \Faderim\Json\JsonSerializable {

    private $title;
    private $children = Array();

    public function __construct($title) {
        $this->title = $title;
    }

    public function addNode(TreeNode $oNode) {
        $this->children[] = $oNode;
    }

    /**
     *
     * @param type $sTitle
     * @return TreeNode 
     */
    public function newNode($sTitle) {
        $oChild = new TreeNode($sTitle);
        $this->addNode($oChild);
        return $oChild;
    }

    public function getJsonFormat() {
        return Array(
            'text' => $this->title,
            'children' => $this->children,
            'leaf' => (count($this->children) == 0)
        );
    }

}

