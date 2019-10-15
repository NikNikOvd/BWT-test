<?php

namespace SmsController;

use models\SMS as S;
use models\User as U;
use core\Controller as C;
use core\View as V;
use core\model as M;
use phpQuery;
use ReCaptcha;

class SmsController extends C\Controller
{
	function __construct()
	{
		$this->view = new V\view();
	}
	//проверка перехода с главной страницы
    public function actionWrite()
    {
    	//Проверка на нажатие кнопкина форме
    	//Кнопка Exit
        if (isset($_POST['Exit'])) {
        	$this->view->generete('index.php');
	        //очистка сесси после выхода
	        session_destroy();
		}elseif (isset($_POST['Write']) ) {
			$this->view->generete('sms.php');
		//Кнопка weather
		}elseif (isset($_POST['weather'])) {	
			// парсинг данных о погоде
			$weather = U\User::getWeather();
			$this->view->generete('weather.php',$weather);
			//Кнопка user
		}else if (isset($_POST['user'])) {
			//создание массива сообщений
			$sms = U\User::getSmsByFio();	
			$this->view->generete('user.php',$sms);
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
        	$_POST["g-recaptcha-response"]
        	);
			// отправка сообщения
			if (!isset($_POST['submit'])) {	 		 
				$id_user = $_SESSION['id'];
				$text_sms = $_POST['text_sms'];
				//зоздвния обьекта сообщения
				$getSms = new S\Sms($id_user,$text_sms);
				//запись сообщения в базу
				$getSms->addSms();
				//создание массива сообщений
				$sms = U\User::getSmsByFio();
				unset($_POST);
				//Подключение вида user
				$this->view->generete('user.php',$sms);
			} else {
				//Подключение вида sms
				$this->view->generete('sms.php');			
			}
		} else {
			//Подключение вида sms
			$this->view->generete('sms.php');	
 		}	 	
 		return true;
	}
}

?>