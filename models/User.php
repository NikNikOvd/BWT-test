<?php
namespace models\User;

use PDO;
use core\Model as M;
use DB as DB;
use phpQuery;

include_once ROOT.'/core/Model.php';
include_once ROOT.'/components/Db.php';
include_once 'phpQuery.php';

class User extends M\Model
{
	//Проверка на существование пользователя
	public static function checkUser ($login, $password)
	{
		$db = DB\Db::getConnection();
		$sql = 'SELECT * FROM user WHERE login = :login AND password = :password';
		$result = $db->prepare($sql);
		$result->bindParam(':login', $login, PDO::PARAM_INT);
		$result->bindParam(':password', $password, PDO::PARAM_INT);
		$result->execute();
		$user = $result->fetch();
		if ($user) {
			return $user['id'];
		}
		return false;
	}
	/*
	Записываем пользователя в ссесию
	*/
	public static function authSession ($userCharacteristic)
	{
		$_SESSION = $userCharacteristic;
	}
	/*
	Проверка пароля на правельность заполнения
	*/
	public static function checkPassword($password)
	{

		$reg = "/[0-9]/";

		if (strlen($password) >= 2 AND strlen($password) < 5 ) 
		{
			if(preg_match($reg, $password)){
				return true;
			}else {
				return false;
			}
		}
		return false;
	}
	/*
	Проверка логина на правельность заполнения
	*/
	public static function checkLogin($login)
	{
	$reg = "/[A-Za-z0-9]/";
		if (strlen($login) >= 4) 
		{
			if(preg_match($reg, $login)){
				return true;
			}else {
				return false;
			}
		}
		return false;
	}
	/*
	Подбор данных о пользователе по его id
	*/
	public static function getCharacteristicById($id)
	{
		if ($id) {
			$db = DB\Db::getConnection();
			$sql = 'SELECT U.id, login, password, name, surname, sex, email, data_rog, data_reg  FROM user as U INNER JOIN fio as F ON U.id = F.id_user AND U.id = :id';
			$result = $db->prepare($sql);
			$result->bindParam(':id', $id, PDO::PARAM_INT);
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$result->execute();
			return $result->fetch();
		}
		return false;
	}

	public static function getSmsByFio()
	{ 
		$db = DB\Db::getConnection();	
		$sql = 'SELECT S.text_sms, S.data_sms, U.id, F.name, F.surname, F.email  FROM sms as S INNER JOIN user AS U  INNER JOIN  fio as F ON U.id = S.id_user AND U.id = F.id_user'; 
		$result = $db->prepare($sql);			
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute();
		return $result->fetchAll();
	}
	//Парсинг погоды
	public static function getWeather()
	{
		Header('Content-type: text/html; charset=utf-8');
		$url = 'https://www.gismeteo.ua/weather-zaporizhia-5093/now/';
		$file = file_get_contents($url);
		if (!empty($file)){
			$doc = phpQuery::newDocument($file);
			$mass['provisions'] = $doc->find('.breadcrumbs__item')->text();
			$mass['temperature'] = $doc->find('.unit_temperature_c:first')->text();
			$mass['temperature'] .= ' &#8451';
			$mass['icon'] = $doc->find('.tab-icon:first')->html();
			$mass['wind'] = $doc->find('.unit_wind_m_s:first')->text();
			$mass['pressure'] = $doc->find('.unit_pressure_mm_hg_atm:first')->text();
			$mass['humidity'] = $doc->find('.nowinfo__item_humidity')->find('.nowinfo__value')->text();
			$mass['humidity'] .= ' %';
			$mass['temperature_water'] = $doc->find('.nowinfo__item_water')->find('.unit_temperature_c')->text();
			return $mass;
		}
		return false;
	}
}

?>