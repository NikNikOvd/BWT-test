<?php

// работает autoload

class SmsController
{
	//проверка перехода с главной страницы
    public function actionWrite()
    {
    	//Проверка на нажатие кнопкина форме
    	//Кнопка Exit
        if ( isset($_POST['Exit']) ){
	        require_once(ROOT . '/views/site/index.php');
	        //очистка сесси после выхода
	        session_destroy();
		//Кнопка Write
		}else  if ( isset($_POST['Write']) ){
		require_once(ROOT . '/views/site/sms.php');	
		//Кнопка weather
		}else  if ( isset($_POST['weather']) ){	
		// парсинг данных о погоде
		$weather = User::getWeather();
		require_once(ROOT . '/views/site/weather.php');	
		//Кнопка user
		}else  if ( isset($_POST['user']) ){
		//создание массива сообщений
		$sms = User::getSmsByFio();	
		require_once(ROOT . '/views/users/user.php');
		}

     return true;
    }

//
    public function actionSave()
    {

    	// ваш секретный ключ
		$secret = "6LfZWLsUAAAAAN1FjQqmftjBVys2CoCxzlsRtraA";
		// пустой ответ
		$response = null;
		// проверка секретного ключа
		$reCaptcha = new ReCaptcha($secret);

		// Провака на существование ключа в массиве
		if ($_POST["g-recaptcha-response"]) 
		{
			$response = $reCaptcha->verifyResponse(
       		$_SERVER["REMOTE_ADDR"],
        	$_POST["g-recaptcha-response"]);
			// отправка сообщения
			if (!isset($_POST['submit'])){
						 		 
				$id_user = $_SESSION['id'];
				$text_sms = $_POST['text_sms'];
				//зоздвния обьекта сообщения
				$getSms = new Sms($id_user,$text_sms);
				//запись сообщения в базу
				$getSms->addSms();
				//создание массива сообщений
				$sms = User::getSmsByFio();
				unset($_POST);
				require_once(ROOT . '/views/users/user.php');

			}else {
							
				require_once(ROOT . '/views/site/sms.php');

			}

		}else{

 		require_once(ROOT . '/views/site/sms.php');	

 		}
			 	
 		return true;
	}

}

?>