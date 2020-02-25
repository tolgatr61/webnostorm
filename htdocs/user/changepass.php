<?php 
require_once '../news/index/config.php';
session_start();
if(empty($_SESSION['User']) OR empty($_SESSION['passwort'])){
	$_SESSION["PASS_ERROR"] = "Vous avez laissé des champs vides";
	header("location: /user/configuration");
}
if($_POST){
	$username = $_SESSION['User'];
	$old_pass = $_POST['oldPassword'];
	$emailadd = $_POST['tremail'];
	$new_pass = $_POST['newPassword'];
	$new_passrepeat = $_POST['confirmPassword'];
	$hashedpass = hash('sha512',$old_pass);
	$hashedpassnew = hash('sha512',$new_pass);
	if(empty($old_pass) OR empty($emailadd) OR empty($new_pass) OR empty($new_passrepeat)){
		$_SESSION["PASS_ERROR"] = "Vous avez laissé des champs vides";
		header("location: /user/configuration");
	}
	if(!filter_var($emailadd, FILTER_VALIDATE_EMAIL) === true) {
		$_SESSION["PASS_ERROR"] = "L'email n'est pas valide";
		header("location: /user/configuration");
	}
	if($old_pass == $new_pass){
		$_SESSION["PASS_ERROR"] = "Vous ne pouvez pas mettre le même mot de passe que vous avez";
		header("location: /user/configuration");
		return;
	}
	if($new_pass != $new_passrepeat){
		$_SESSION["PASS_ERROR"] = "Les mots de passe ne correspondent pas";
		header("location: /user/configuration");
		return;
	}
	if(strlen($new_pass) < 5 ){
		$_SESSION["PASS_ERROR"] = "Le mot de passe est trop court";
		header("location: /user/configuration");
		return;
	}
    $stmt = $conn->prepare("SELECT TOP 1 COUNT(*) AS AnzahlY FROM $db_Account WHERE $db_Account.[Name] = :xname AND $db_Account.[Password] = :xpass AND $db_Account.[Email] = :xemail");
	$stmt->bindParam(':xname', $username);
	$stmt->bindParam(':xpass', $hashedpass);
	$stmt->bindParam(':xemail', $emailadd);
	if($stmt->execute()){
		$row = $stmt->fetch();
		if ($row['AnzahlY'] == 1){
			$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.[Password]=:pass WHERE $db_Account.[Name] = :xname AND $db_Account.[Password] = :xpass AND $db_Account.[Email] = :xemail");
			$stmt->bindParam(':pass', $hashedpassnew);
			$stmt->bindParam(':xname', $username);
			$stmt->bindParam(':xpass', $hashedpass);
			$stmt->bindParam(':xemail', $emailadd);
			if($stmt->execute()){

				unset($_SESSION["PASS_ERROR"]);
				$_SESSION["PASS_SUCCESS"] = "Vous avez changé votre mot de passe avec succès, félicitations";

				header("location: /user/configuration");
			}else{
				$_SESSION["PASS_ERROR"] = "Une erreur inattendue s'est produite";
				header("location: /user/configuration");
		}
		}else{
			$_SESSION["PASS_ERROR"] = "L'email n'est pas correct";
			header("location: /user/configuration");
		}
	}else{
		$_SESSION["PASS_ERROR"] = "Une erreur inattendue s'est produite";
		header("location: /user/configuration");
	}
}
?>