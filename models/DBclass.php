<?php

/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 13.01.2017
 * Time: 14:29
 */
class DBclass
{
    public $dbconfig;
    public $pdo;
    public $connected;

    public static $_db;


    /**
     * SQL - синглтон.
     */
    public static function db(){
        if(self::$_db===NULL){
                require_once(SITE_ROOT .'/models/SQL.php');
                self::$_db = new SQL;

        }

        if(!self::$_db->connected)
            self::$_db->connect();

        return self::$_db;
    }


}