<?php

/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 13.01.2017
 * Time: 21:14
 */
class DateFormat
{
    public function check_rule(&$value) {

        if(preg_match('/\d{4}-\d{2}-\d{2}/',$value)){

            return true;
        }else{
            return false;
        }
    }
}