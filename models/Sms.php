<?php 
namespace models\Sms;

use DB;
use core\Model as M;

class Sms extends M\Model
{
    private $id_user;
    private $text_sms;
    //конструктор для данных
    function __construct ($id_user, $text_sms)
    {
        $this->id_user = htmlspecialchars($id_user);
        $this->text_sms = htmlspecialchars($text_sms);
    }
    public function addSms()
    {
        $db = DB\Db::getConnection();
        $add = $db->prepare("INSERT INTO sms (text_sms, id_user) VALUES(?, ?)");
        $add->execute(array($this->text_sms, $this->id_user));
    }
}
     
?>