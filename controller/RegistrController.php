<?php

//include_once ROOT . '/models/Registration.php';

class RegistrController
{

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

                if ($_POST['password'] == $_POST['password_c'] ){
                //обьявления обьекта для регистраации пользователя
                $add = new Registration ($name, $famile, $email, $Radio, $date_r, $login, $password);
                    if ($add->register()){
                        //Проверка пользоваеля на совпадение в базе
                        $user = User::checkUser($login, $password);
                        //Внесение данных о пользователе в ссесию
                        $getCharacteristic=User::getCharacteristicById($user);
                        //Загрузка всех сообщений пользователей в в массив
                        $sms = User::getSmsByFio();
       
                         //запись в сессию свойст
                        if (isset($_SESSION)){
                            User::authSession($getCharacteristic);
                        }else {
                            session_unset();
                            User::authSession($getCharacteristic);
                        }

                    require_once(ROOT . '/views/users/user.php');
                            
                    }else {
                    require_once(ROOT . '/views/site/registr.php');
                    }

                } else {
                    require_once(ROOT . '/views/site/registr.php');
                }
    return true;
    }

}
?>