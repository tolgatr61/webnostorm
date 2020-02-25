<?php 
	session_start();
	if(empty($_SESSION['User']) OR empty($_SESSION['passwort'])){echo '[Failed]';return;}
	$_SESSION['User'] = "";
	$_SESSION['passwort'] = "";
	unset($_SESSION["AccountId"]);
	unset($_SESSION['Cart']);
	unset($_SESSION["TotalPrice"]);
	header("Location: ../index.php");
?>