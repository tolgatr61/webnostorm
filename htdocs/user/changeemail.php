<?php 
require_once '../news/index/config.php';
session_start();
error_reporting(E_ALL);

if(empty($_SESSION['User']) OR empty($_SESSION['passwort'])){
	$_SESSION["EMAIL_ERROR"] = "Vous avez laissé des champs vides";
	header("location: /user/configuration");
}

if($_POST){
	$email_user_name = $_SESSION['User'];
	$email_user_email_old = $_POST['email_old'];
	$email_user_email_new = $_POST['email_new'];
	$email_user_password = $_POST['passwort'];
	$hashedpassemail = hash('sha512',$email_user_password);
	if(empty($email_user_email_new) OR empty($email_user_password)){
		$_SESSION["EMAIL_ERROR"] = "Vous avez laissé des champs vides";
		header("location: /user/configuration");
	}
	if(!filter_var($email_user_email_new, FILTER_VALIDATE_EMAIL) === true) {
		$_SESSION["EMAIL_ERROR"] = "L'email n'est pas valide";
		header("location: /user/configuration");
	}
	if($email_user_email_old == $email_user_email_new){
		$_SESSION["EMAIL_ERROR"] = "Le nouvel email ne peut pas être le même que l'ancien";
		header("location: /user/configuration");
	}
    $stmt = $conn->prepare("SELECT TOP 1 COUNT(*) AS AnzahlY FROM $db_Account WHERE $db_Account.[Name] = :xname AND $db_Account.[Password] = :xpass AND $db_Account.[Email] = :xemail");
	$stmt->bindParam(':xname', $email_user_name);
	$stmt->bindParam(':xpass', $hashedpassemail);
	$stmt->bindParam(':xemail', $email_user_email_old);
	if($stmt->execute()){
		$row = $stmt->fetch();
		if ($row['AnzahlY'] == 1){
			$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.[Email]=:emailaddnew WHERE $db_Account.[Name] = :xname AND $db_Account.[Password] = :xpass AND $db_Account.[Email] = :xemail");
			$stmt->bindParam(':emailaddnew', $email_user_email_new);
			$stmt->bindParam(':xname', $email_user_name);
			$stmt->bindParam(':xpass', $hashedpassemail);
			$stmt->bindParam(':xemail', $email_user_email_old);
			if($stmt->execute()){

				//unset($_SESSION["EMAIL_ERROR"]); // destruir errores
				$_SESSION["EMAIL_SUCCESS"] = "L'email a été changé avec succès, félicitations";
				header("location: /user/configuration");
			}else{
				$_SESSION["EMAIL_ERROR"] = "Une erreur inattendue s'est produite";
				header("location: /user/configuration");
		}
		}else{
			$_SESSION["EMAIL_ERROR"] = "Le mot de passe n'est pas correct";
			header("location: /user/configuration");
		}
	}else{
		$_SESSION["EMAIL_ERROR"] = "Une erreur inattendue s'est produite";
		header("location: /user/configuration");
}
}
?>