<?php 

class AuthController {
/*
Проверка на сушесвование пользователя с данным мылом и паролем
*/
	public function actionLogin ()
	{

		$login = '';
		$password = '';
		if (isset($_POST['submit'])) {
			$login = $_POST['login'];
			$password = $_POST['password'];
			// Проверка логина на правельност ввода
			if (!User::checkLogin($login)) {
				$errors[] = 'Login не должно быть короче 2-х символов';
				}

			//Проверка пароля на правельность ввода
			if(!User::checkPassword($password)) {
				$errors[] = 'Имя не должно быть короче 2-х символов';
				}
			//Проверка пароля на существоания
			$user = User::checkUser($login, $password);
			
			if (empty($user)) {
				require_once(ROOT . '/views/site/index.php');
			}else {
				$sms = User::getSmsByFio();
				$getCharacteristic=User::getCharacteristicById($user);

					//проверка на существование сессии
					if (isset($_SESSION)){
						//запись в сессию данных пользователя
						User::authSession($getCharacteristic);
					}else {
						//очистка сесии если в ней чтото было
						session_unset();
						User::authSession($getCharacteristic);
					}

			require_once(ROOT . '/views/users/user.php');
			}

		}

	 return true;
	}
	

}

?>