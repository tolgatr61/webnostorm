<?php 
require_once '../config.php';
$CheckisAdmin = 0;
$CheckIsLogged = 0;
if(empty($_SESSION['User']) or empty($_SESSION['passwort'])){$CheckIsLogged = 0;return;}
$A_Check_Name = $_SESSION['User'];
$A_Check_Pass = $_SESSION['passwort'];
$stmt = $conn->prepare("SELECT TOP 1 * FROM $db_Account WHERE $db_Account.[Name] = :Adname AND $db_Account.[Password] = :Adpass");
$stmt->bindParam(':Adname', $A_Check_Name);
$stmt->bindParam(':Adpass', $A_Check_Pass);
if($stmt->execute()){
	if ($row = $stmt->fetch()){
		if(!empty($_SESSION['User']) or !empty($_SESSION['passwort'])){
			$CheckIsLogged = 1;
		}
		if($CheckIsLogged == 1){
			$CheckisAdmin = $row['Authority'];
		}else{$CheckIsAdmin = 0;}
	}
}else{$CheckisAdmin = 0;$CheckIsLogged = 0;}
?>