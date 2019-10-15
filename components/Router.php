<?php

class Router 
{
    private $routes;
    public function __construct () 
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

	private function getURI () 
	{
	    if (!empty($_SERVER['REQUEST_URI'])) 
		{
		    return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

    public function run () 
    {
	    //получаем строку рапроса в браузере
        $uri = $this->getURI();
         //проверяем наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path)
        {
            // cравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~",$uri )) {
                //получение внутренего пути из внешнего согласно правилу
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                //  Определить какой контроллер
                //и action обрабатывает запрос
                $segments= explode ('/',$internalRoute);
                $controllerName = array_shift($segments).'Controller';  
                $controllerName = ucfirst($controllerName);
                $actionName = 'action'.ucfirst(array_shift($segments)); 
                //массив с параметрами для вызова
                $parameters = $segments;
                //Подключить файл класса контроллер
                $controllerFile = ROOT . '/controller/'.$controllerName.'.php';  
                if (file_exists($controllerFile)) {
                        include_once ($controllerFile);
                }
                $controllerName = $controllerName."\\". $controllerName;
                //создать обьек вызвать метод (т.у. action)
                $controllerObject = new $controllerName;
                //возвращяем массив паратров преобразованый в строки
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if($result != null) {
                        break;    
                }
                 
            }
        }
    }
}

?>