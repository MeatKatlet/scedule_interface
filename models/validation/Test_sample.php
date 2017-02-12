<?php

/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 13.01.2017
 * Time: 20:27
 */
class Test_sample
{
    public $constraint;
    public $value_name;

    public $parent_reestr;

    public $message = "Дата не соответствует правильному формату ввода";

    public function __construct(&$parent_reestr, $value_name, $rule) {
        $this->constraint = $rule;//объект правило со своим  методом проверки

        $this->parent_reestr = $parent_reestr;//ссылка на объект реестр

        $this->value_name = $value_name;
    }
    public function check_data() {//проверяет образец
        $value = $_POST["data"][$this->value_name];

        $rez = $this->constraint->check_rule($value);//true/false

        if (!$rez) {
            $this->parent_reestr->errors_count++;

            $this->parent_reestr->wrong_data[] = $this->message;
        }

        //
    }
}