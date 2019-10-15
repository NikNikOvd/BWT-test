<?php 

function __autoload ($class_name)
{
    $array_paths = array (
        '/components/',
        '/models/',
        '/core/'
    );
    //echo $class_name . '</br>';
    $s = explode ('\\',$class_name);
    $num = count($s) - 1;
    $f = $s[$num];
	foreach ($array_paths as $path) {
		$path = ROOT. $path. $f. '.php';
		//echo  $path . '</br>';
		if (is_file($path)) {
		    include_once $path;
		}
	}
}
	
?>