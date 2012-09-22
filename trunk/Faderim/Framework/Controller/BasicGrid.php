<?php

namespace Faderim\Framework\Controller;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SystemGrid
 *
 * @author Ricardo
 */
class BasicGrid extends BaseControllerJson {

    //put your code here
    private $data = Array();

    public function renderView() {
        $this->setJsonReturn($this->View);
    }

    public function renderData() {
        $sModel = '\\' . $this->Page->getModelName();
        $oModel = new $sModel();
        $aModels = $oModel->getStorage()->find();
        foreach ($aModels as $ModelKey) {
            $this->addData($ModelKey);
        }
        $this->setJsonReturn($this->data);
    }

    private function addData(\Faderim\Framework\Model\BaseModel $oData) {
        $aDataAtual = Array();
        $oStore = $this->View->getStore();
        foreach ($oStore->getFields() as $oField) {
            $sProp = $oField->getName();
            $aDataAtual[$sProp] = $oData->beanGetProperty($sProp);
        }
        $this->data[] = $aDataAtual;
    }

    public function getView() {
        $sViewName = '\\' . $this->Page->getViewName('Grid');
        return new $sViewName();
    }

}
