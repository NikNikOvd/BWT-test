<?php



class SiteController
{
    //перенаправление после авторизации
    public function actionIndex()
    {
        require_once(ROOT . '/views/site/index.php');
        return true;
    }
    //перенаправление после регистрации
    public function actionRegistr()
    {
        require_once(ROOT . '/views/site/registr.php');
        return true;
    }


}

?>