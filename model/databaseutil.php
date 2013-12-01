<?php
/**
 * @author bond
 * copyright 12/1/13
 */

namespace model;


class databaseutil {

    private static $host = "localhost";
    private static $db_user = "root";
    private static $db_pass = "";
    private static $db_name = "test";

    public static function connect()
    {
        $mysqli = new \mysqli(databaseutil::$host, databaseutil::$db_user, databaseutil::$db_pass, databaseutil::$db_name);
        if($mysqli->connect_errno)
        {
            return null;
        }

        return $mysqli;
    }
}