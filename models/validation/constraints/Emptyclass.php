<?php

/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 13.01.2017
 * Time: 21:15
 */
class Emptyclass
{
    public function check_rule(&$value) {
        if($value==""){
            return true;
        }else{
            return false;
        }
    }
}