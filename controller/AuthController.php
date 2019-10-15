<?php

namespace AuthController;

use models\User as U;
use core\Controller as C;
use core\View as V;
use core\model as M;

class AuthController extends C\Controller
{

	function __construct()
	{
		$this->view = new V\view();
	}
	public function actionLogin ()
	{
		$login = '';
		$password = '';
		if (isset($_POST['submit'])) {
			$login = $_POST['login'];
			$password = $_POST['password'];
			// Проверка логина на правельност ввода
			if (!U\User::checkLogin($login)) {
				$errors[] = 'Login не должно быть короче 2-х символов';
			}
			//Проверка пароля на правельность ввода
			if (!U\User::checkPassword($password)) {
				$errors[] = 'Имя не должно быть короче 2-х символов';
			}
			//Проверка пароля на существоания
			$user = U\User::checkUser($login, $password);
			if (empty($user)) {
				$this->view->generete('index.php');
			} else {
				$sms = U\User::getSmsByFio();
				$getCharacteristic= U\User::getCharacteristicById($user);
				//проверка на существование сессии
				if (isset($_SESSION)){
					//запись в сессию данных пользователя
					U\User::authSession($getCharacteristic);
				}else {
					//очистка сесии если в ней чтото было
					session_unset();
					U\User::authSession($getCharacteristic);
				}
				$this->view->generete('user.php',$sms);
			}
		}
		return true;
	}
}

?>