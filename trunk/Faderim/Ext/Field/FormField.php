<?php

namespace Faderim\Ext\Field;

/**
 * Description of FormField
 *
 * @author Ricardo
 */
class FormField extends BaseField {

    //put your code here
    public function __construct($type, $name, $title = 'Field', $required = true, $maxLength = 0) {
        parent::__construct($type, $name, $title);
        $this->setRequired($required);
        if ($maxLength) {
            $this->setProperty('enforceMaxLength', true);
            $this->setProperty('maxLength', $maxLength);
            $this->setProperty('xtype', $type);
        }
        //$this->setProperty('margins','0 5 0 0');
        $this->setProperty('margins', '5 5 0 0');
    }

    public function setValue($value) {
        $this->setProperty('value', $value);
    }

    public function setDisabled($disabled) {
        $this->setProperty('disabled', (boolean) $disabled);
    }

    public function setRequired($required) {
        $this->setProperty('allowBlank', (bool) !$required);
    }

    public function setReadOnly($read) {
        $this->setProperty('readOnly', (bool) $read);
    }

    protected function getExtClassName() {
        return 'Ext.form.field.' . $this->getExtClassByType();
    }

    protected function getExtClassByType() {
        return $this->TypeField->getExtType();
    }

    protected function getExtProperties() {
        $aPropriedades = parent::getExtProperties();
        $aNovasProp = $this->TypeField->getCustomProperties();
        foreach ($aNovasProp as $sCustomKey => $xValue) {
            $aPropriedades[$sCustomKey] = $xValue;
        }
        return $aPropriedades;
    }

}
