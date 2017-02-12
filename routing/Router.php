<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 13.01.2017
 * Time: 10:58
 */


class Router
{
    public static $routings = array();

    public function __construct($routings) {
        self::$routings = $routings;
    }

    public function route_to() {

        $route = $this->getController();//array("file" => "controllers/SceduleController", "action" => "index");


        include_once SITE_ROOT.$route["file"].".php";

        $parts = explode("/", $route["file"]);
        $class = array_pop($parts);

        $controller_obj = new $class();

        $controller_obj->{$route["action"]}();//вызываем метод контроллера


    }
    // определение контроллера и экшена из урла
    private function getController() {
        $route = trim(FULL_URI);

        $params = strpos($route,"?");

        // Находим контроллер
        $route_rez = $this->check_route($route);
        if ($route_rez != false) {
            return $route_rez;
        }
        else if ($params != false) {
            $parts = explode("?",$route);
            $route = $parts[0];

            return $this->check_route($route);
        }
        else {

            return self::$routings[METHOD]["/error"];
        }

    }

    public function check_route($route) {
        if (isset(self::$routings[METHOD][$route])) {

            $controller = SITE_ROOT.self::$routings[METHOD][$route]["file"] . '.php';

            if (is_file($controller)) {

                return self::$routings[METHOD][$route];
            }

        }

        return false;
    }


}