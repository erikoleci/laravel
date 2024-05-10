<?php 

function autoload($className)
{
	$className = str_replace('\\', DIRECTORY_SEPARATOR, $className.'.php');
	
	$file = dirname(__FILE__)."/$className";

	if ( ! file_exists($file))
	{
		return FALSE;
	}
	require($file);
}
spl_autoload_extensions('.class.php');
spl_autoload_register('autoload');
?>