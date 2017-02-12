<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 13.01.2017
 * Time: 10:52
 */

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

date_default_timezone_set('Europe/Moscow');

define('SITE_DOMAIN',"");//$_SERVER['HTTP_HOST']

define('FULL_URI',$_SERVER['REQUEST_URI']);

define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

define('METHOD',$_SERVER['REQUEST_METHOD']);

define('ASSETS',"globals");


$routings["GET"]["/"] = $routings["GET"][""] = array("file" => "/controllers/SceduleController", "action" => "index");
$routings['GET']['/get_schedule'] = array("file" => "/controllers/SceduleController", "action" => 'get_schedule');//расписание
$routings["GET"]["/insert_form"] = array("file" => "/controllers/FormController", "action" => "insert_form");
//это так, для наглядности
$routings["GET"]["/insert_form/subpage1"] = array("file" => "/controllers/Insert_form1", "action" => "subpage1");
$routings["GET"]["/insert_form/subpage2"] = array("file" => "/controllers/Insert_form2", "action" => "subpage2");
/////
$routings["GET"]["/error"] = array("file" => "/controllers/ErrorController", "action" => "error");


/////////
$routings['POST']['/get_schedule2'] = array("file" => "/controllers/SceduleController", "action" => 'get_schedule');//расписание

$routings['POST']['/get_travel_time'] = array("file" => "/controllers/FormController", "action" => 'get_travel_time');//получение пути в днях

$routings['POST']['/check_courier'] = array("file" => "/controllers/FormController", "action" => 'check_courier');//проверка курьера

/////
