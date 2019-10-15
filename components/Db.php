<?php
namespace DB;

use PDO;

class Db
{
	private static $instance = null;
    private  function  __construct () {}
    private function __clone () {}
    private function __wakeup() {}


    //Паттерн сингелтон
    public static function  getConnection ()
    {
	    if (self::$instance === null ) {
	    $paramsPath = ROOT . '/config/db_params.php';
	    $params = include($paramsPath);
	    $dsn = "mysql:host = {$params['host']};dbname={$params['dbname']}";
	    return self::$instance = new PDO($dsn, $params['user'], $params['password']);
	    }
	return self::$instance;
    }
}

?>