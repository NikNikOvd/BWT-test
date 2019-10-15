<?php 

return array(
	//проверка индитификация пользователя
    'auth' => 'Auth/Login',
    // страница регистрации
    'registr' => 'site/registr',
    // запись пользователя в базу		
    'reg' => 'Registr/Create',
    //cохранение сообщения в базу		
    'sms' => 'Sms/Save',
    // проверка страницы на нажатую клавишу
    'user' => 'Sms/write',
    // стартовая страница
    '' => 'site/index'
);


?>