<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 13.01.2017
 * Time: 12:37
 */

//namespace controllers;


class SceduleController
{

    public function index() {
        $data['baseurl'] = SITE_DOMAIN;


        include SITE_ROOT."/views/main.php";

    }
    public function get_schedule() {

        $schedule = new Schedule();

        if (isset($_POST["data"])) {
            $validator = new Validator();
            $errors = $validator->validate($schedule);
            if ($errors > 0) {

                echo json_encode(array());
                return;
            }

        }

        $data["timefrom"] = "";
        $data["timeto"] = "";

        $data = (isset($_POST["data"]))? $_POST["data"]: $data;

        //текущий день
        $current_day = strtotime(date('Y-m-d'));


        if (isset($data["timefrom"])==true) {
            $data["timefrom"] = strtotime($data["timefrom"]);//2017-02-01 00:00:00
        }
        if (isset($data["timeto"])==true) {
            $data["timeto"] = strtotime($data["timeto"]);//2017-02-01 00:00:00
        }


        $schedule->get_data($data, $current_day);
    }
}