<?php

namespace models\Registr;

use DB;
use core\Model as M;

//include_once ROOT.'/core/Controller.php';
//include_once ROOT.'/components/Db.php';
//include_once ROOT.'/core/Model.php';

class Registration extends M\model
{
    private $name;
    private $famile;
    private $email;
    private $Radio;
    private $date_r;
    private $login;
    private $password;
    //конструктор для данных
    function __construct ($name,$famile,$email,$Radio,$date_r,$login,$password)
    {
        $this->name = htmlspecialchars($name);
        $this->famile = htmlspecialchars($famile);
        $this->email = htmlspecialchars($email);
        $this->Radio = htmlspecialchars($Radio);
        $this->date_r = htmlspecialchars($date_r);
        $this->login = htmlspecialchars($login);
        $this->password = htmlspecialchars($password);
    }
     
    public function register()
    {
        if ($this->chekloginbd() and  $this->chekEmail() and  $this->chekpassword() and $this->chekname() and $this->chekfamile() and $this->cheklogin() and $this->addAcount() ) {
            return true;
        } else {
            return false;
        }
    }
    //коректность написания логина
    public function cheklogin()
    {
        if (strlen($this->login) >= 1 && strlen($this->login) <= 25) {
            $necorect= "!@#$%^&*()_-+=//|\\?.<>.''" ;
            $reg = "/[а-яА-Яa-zA-Z0-9]/";
            $bool = true;
            for ($i=0; $i < strlen($this->login); $i++) {
                for ($j=0; $j < strlen($necorect); $j++) {
                    if ( $this->login[$i] == $necorect[$j]) {
                        $bool = false;
                    }
                }
            }
            if ($bool == true) {
                if (preg_match($reg, $this->login)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    //проверка на коректность емайла встроенной функцией
    public function chekEmail()
    {
        if (filter_var($this->email,FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
    //проверка на коректное написание пароля
    public function chekpassword()
    {
        if (strlen($this->password) >= 1 && strlen($this->password) <= 25) {
            $necorect = "!@#$%^&*()_-+=//|\\?.<>'',.`";
            $reg = "/[а-яА-Яa-zA-Z0-9]/";
            $bool = true;
            for ($i=0; $i < strlen($this->password); $i++) {   
                for ($j=0; $j < strlen($necorect); $j++) {
                    if($this->password[$i] == $necorect[$j]) {   
                        $bool = false;
                    }
                }
            }
            if ($bool == true) {
                if (preg_match($reg,$this->password)) {
                    return true;
                }else {
                    return false;
                }
            } else { 
                return false;
            }
        } else {
            return false;
        }
    }
    //проверка на коректное написание имени 
    public function chekname()
    {
        if (strlen($this->name) >= 1 && strlen($this->name) <= 25) {
            $necorect= "!@#$%^&*()_-+=//|\\?.<>.''";
            $reg = "/[а-яА-Яa-zA-Z0-9]/";
            $bool = true;
            for ($i=0; $i < strlen($this->name); $i++) {
                for ( $j=0; $j < strlen($necorect); $j++) {
                    if($this->name[$i] == $necorect[$j]) {
                        $bool = false;
                    }
                }
            }
            if ($bool == true) {
                if (preg_match($reg,$this->name)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false; 
        }
    }
    //проверка фамилии на коректное написание
    public function chekfamile()
    {
        if (strlen($this->famile) >= 1 && strlen($this->famile) <= 25) {
            $necorect="!@#$%^&*()_-+=//|\\?.<>.''";
            $reg="/[а-яА-Яa-zA-Z0-9]/";
            $bool=true;
            for ($i = 0; $i< strlen($this->famile); $i++) {
                for ($j = 0; $j < strlen($necorect); $j++) {
                    if($this->famile[$i] == $necorect[$j]) {
                        $bool=false;   
                    }
                }
            }
            if ($bool==true) {
                if(preg_match($reg, $this->famile)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                 return false;
            }
        } else {
            return false;
        } 
    }
    //проверка логина на совпадение 
    public function chekloginbd() // если логин встретился то ---false если нет то ---true
    {
        $b=NULL; 
        $db = DB\Db::getConnection();
        $stmt = $db->prepare("SELECT login FROM user WHERE login = ?");
        $stmt->execute(array($this->login));
        $row = $stmt->fetch();
        if($row['login'] == $this->login) {
            return false;
        } else {
            return true;
        }
   } 
    //добавление данных в базу данных с формы регистрации
    public function addAcount()
    {
        $db = DB\Db::getConnection();
        $add = $db->prepare("INSERT INTO user (login, password) VALUES(?, ?)");
        $add->execute(array($this->login, $this->password));
        $add2 = $db->prepare("INSERT INTO FIO (name, surname, sex, data_rog, email, id_user) VALUES(?, ?, ?, ?, ?, LAST_INSERT_ID())");
        $add2->execute(array($this->name, $this->famile, $this->Radio, $this->date_r, $this->email));
        if ($add && $add2) {
            return true;
        } else {
            return false;
        }
    }
}

?>