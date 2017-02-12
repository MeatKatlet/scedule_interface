<?php

/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 13.01.2017
 * Time: 19:54
 */
class Validator
{
    //public $test_reestr;
    public $test_values;

    public function __construct(){
        $this->test_values = new Test_reestr;
    }

    public function validate($object_to_validate) {
        $object_to_validate->loadValidatorMetadata($this->test_values);

        //запуск общего метода для всех тестируемых образцов
        //цикл по правилам и запуск
        foreach ($this->test_values->reestr as $key => &$example) {
            $example->check_data();
        }

        //возвращает количество не прошедших проверку тестов
        return $this->test_values->errors_count;

    }

    public function get_error_massages() {
        return $this->test_values->wrong_data;
    }
}