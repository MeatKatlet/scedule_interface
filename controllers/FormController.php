<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 13.01.2017
 * Time: 12:39
 */

//namespace controllers;


class FormController
{
    public function insert_form() {
        $data['baseurl'] = SITE_DOMAIN;

        $regions = new Regions();

        $couriers = new Couriers();


        $data["regions"] = $regions->get_regions();

        $data["couriers"] = $couriers->get_couriers();


        include SITE_ROOT."/views/insert_form.php";

    }
    public function get_travel_time() {
        $region_id = (int)$_POST["id"];

        $regions = new Regions();

        $regions->get_travel_time($region_id);
    }
    public function check_courier() {
        $data = $_POST["data"];

        $couriers = new Couriers();

        if (isset($_POST["data"])) {
            $validator = new Validator();
            $errors = $validator->validate($couriers);
            if ($errors > 0) {

                echo json_encode(array());
                return;
            }

        }



        $couriers->check_courier($data);
    }
}