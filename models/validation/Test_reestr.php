<?php

/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 13.01.2017
 * Time: 20:24
 */
class Test_reestr {
    public $errors_count = 0;

    public $reestr = array();

    public $wrong_data = array();

    public function addPropertyConstraint($value_name, $rule) {
        $this->reestr[] = new Test_sample($this, $value_name, $rule);
    }

}