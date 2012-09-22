<?php

namespace Faderim\Framework\Controller;

class IndexData extends BaseControllerJson {

    public function getDataMenu() {

        $aMenus = Array();
        //pega todos os sistemas
        $oSystems = \Faderim\Framework\Model\System::getStorage()->find();
        foreach ($oSystems as $ModelSystem) {
            $oTreeSistema = new \Faderim\Ext\TreePanel('menu_system_' . $ModelSystem->getId());
            $oTreeSistema->setTitle($ModelSystem->getName());
            //para cada sistema vamos buscar os menus do mesmo
            $menus = \Faderim\Framework\Model\Menu::getStorage()->find()->filterByRel('System', $ModelSystem);
            foreach ($menus as $MenuCurrent) {
                $oTreeMenu = $oTreeSistema->getRoot()->newNode($MenuCurrent->getName());
                //para cada menu vamos buscar as pages do mesmo
                $pages = \Faderim\Framework\Model\MenuActionPage::getStorage()->find()->filterByRel('Menu', $MenuCurrent);
                foreach ($pages as $MenuActionPage) {
                    $oTreeMenu->newNode($MenuActionPage->getPage()->getTitle());
                }
            }
            $aMenus[] = $oTreeSistema;
        }
        $this->setJsonReturn($aMenus);
    }

    protected function getView() {
        return null;
    }

}