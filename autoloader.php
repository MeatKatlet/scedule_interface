<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 13.01.2017
 * Time: 18:40
 */

function my_autoloader($class) {
    $path = "";
    switch ($class) {
        case "DBclass":
            $path = SITE_ROOT . "/models/DBclass.php";
        break;
        case "Router":
            $path = SITE_ROOT . '/routing/Router.php';
        break;
        case "SQL":
            $path = SITE_ROOT . '/models/SQL.php';
        break;
        case "Regions":
            $path = SITE_ROOT . "/models/Regions.php";
        break;
        case "Couriers":
            $path = SITE_ROOT . "/models/Couriers.php";
        break;
        case "Schedule":
            $path = SITE_ROOT . "/models/Schedule.php";
        break;
        case "Validator":
            $path = SITE_ROOT . "/models/validation/Validator.php";
        break;
        case "Test_sample":
            $path = SITE_ROOT . "/models/validation/Test_sample.php";
        break;
        case "Test_reestr":
            $path = SITE_ROOT . "/models/validation/Test_reestr.php";
        break;
        case "DateFormat":
            $path = SITE_ROOT . "/models/validation/constraints/DateFormat.php";
        break;
        case "Emptyclass":
            $path = SITE_ROOT . "/models/validation/constraints/Emptyclass.php";
        break;

    }
    if (file_exists($path)) {
        require_once $path;
    }



}

spl_autoload_register('my_autoloader');