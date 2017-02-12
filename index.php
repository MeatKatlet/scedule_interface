<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 13.01.2017
 * Time: 10:48
 */
require_once 'bdconfig.php';
require_once 'config.php';
require_once 'autoloader.php';


DBclass::db()->setconfig($dbconfig);

$router = new Router($routings);

$router->route_to();
