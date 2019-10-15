<?php

//показать ощибки
ini_set ('display_errors',1);
error_reporting(E_ALL);
//начало работы ссесии
session_start();
//подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once (ROOT.'/components/Autoload.php');

$router = new Router();
$router->run ();

?>