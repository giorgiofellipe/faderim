<?php

namespace Faderim\Framework\Model;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Action
 *
 * @author Ricardo
 * @table faderim_action
 */
class Action extends BaseModel {

    /**
     *
     * @colname action_name
     * @id true
     */
    private $name;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

}

