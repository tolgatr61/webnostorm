<?php

try {

	require_once 'config.php';
	session_start();

	if ($_POST){

		if (!isset($_POST["searchUsername"]) || $_POST["searchUsername"] == ""):
			$_POST["searchUsername"] = "admin";
		endif;

		header("Location: /profile/". $_POST["searchUsername"]);
	}

}
catch(Exception $e) {
	echo 'Exception abgefangen: ',  $e->getMessage(), "\n";
}

?>