<?php

try
{
	$string = include('./content/ajax_support.php'); 
	var_dump($string);
}
catch (Exception $e) {
	echo 'Exception abgefangen: ',  $e->getMessage(), "\n";
}

?>