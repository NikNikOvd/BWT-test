<?php

namespace SiteController;

use core\Controller as C;
use core\View as V;

class SiteController extends C\Controller
{    
    function __construct()
    {
        $this->view = new V\view();
    }
    //перенаправление после авторизации
    public function actionIndex()
    {
        $this->view->generete('index.php');
        return true;
    }
    //перенаправление после регистрации
    public function actionRegistr()
    {
        $this->view->generete('registr.php');
        return true;
    }
}

?>