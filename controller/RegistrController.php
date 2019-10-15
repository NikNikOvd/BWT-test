<?php

namespace RegistrController;

use core\Controller as C;
use core\View as V;
use models\Registr as R;
use models\User as U;

include_once ROOT.'/core/Controller.php';
include_once ROOT.'/core/View.php';
include_once ROOT.'/models/Registration.php';
include_once ROOT.'/models/user.php';

class RegistrController extends C\Controller
{
    function __construct()
    {
        $this->view = new V\view();
    }

    public function actionCreate()
    {
        if (!isset($_POST['submit'])) {
            $name = $_POST['name'];
            $famile = $_POST['famile'];
            $email = $_POST['email'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            //провверка на активации 
            if (isset($_POST['Radio'])) {
                $Radio = $_POST['Radio'];
            } else {
                $Radio = ''; 
            }
            //проверка даты на заполеннеи 
            if (isset($_POST['date_r'])) {
                $date_r = $_POST['date_r'];
            } else {
                $date_r = ''; 
            }
        } 

        if ($_POST['password'] == $_POST['password_c'] ) {
        //обьявления обьекта для регистраации пользователя
            $add = new R\Registration ($name, $famile, $email, $Radio, $date_r, $login, $password);
                if ($add->register()) {
                    //Проверка пользоваеля на совпадение в базе
                    $user = U\User::checkUser($login, $password);
                    //Внесение данных о пользователе в ссесию
                    $getCharacteristic = U\User::getCharacteristicById($user);
                    //Загрузка всех сообщений пользователей в в массив
                    $data = U\User::getSmsByFio();
                        //запись в сессию свойст
                        if (isset($_SESSION)) {
                            U\User::authSession($getCharacteristic);
                        }else {
                            session_unset();
                            U\User::authSession($getCharacteristic);
                        }
                    //Подключение вида user
                    $this->view->generete('user.php',$data);               
                }else {
                    //подключения вида registr
                    $this->view->generete('registr.php');
                }
            } else {
                //подключение вида registr
                $this->view->generete('registr.php');
            }
        return true;
    }
}

?>