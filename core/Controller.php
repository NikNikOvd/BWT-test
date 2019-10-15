<?php

namespace core\Controller;

use core\View as V;
use core\modal as M;

class Controller 
{
	public $view;
	public $model;
	function __construct()
	{
		$this->view = new V\view();
	}
}

?>