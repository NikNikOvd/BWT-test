<?php

namespace core\View;

Class View
{
	public function generete($template, $data=null)
	{
		require_once ROOT. '/views/site/'. $template;
	}
}

?>