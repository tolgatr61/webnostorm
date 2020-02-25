<?php // recoded by cuarz

require_once '../news/index/config.php';
session_start();

if ($_POST) {

	$user_name_login = $_POST['LoginUsername'];
	$user_password_login = $_POST['LoginPassword'];

	if (empty($user_password_login)): // empty user

		$_SESSION["LOGIN_ERROR"] = "Vous avez laissé le nom d'utilisateur vide";
		header("location: ../index.php"); 
	endif;

	if (empty($user_name_login)): // empty password

		$_SESSION["LOGIN_ERROR"] = "Vous avez laissé le nom d'utilisateur vide";
		header("location: ../index.php");
	endif;

	if (strlen($user_name_login) < 4): // min lenght 4 

		$_SESSION["LOGIN_ERROR"] = "Le nom est trop court";
		header("location: ../index.php");
	endif;

	$hashed_password = hash('sha512',$user_password_login);
	$stmt = $conn->prepare("SELECT TOP 1 * FROM $db_Account WHERE $db_Account.[Name] = :xname COLLATE Latin1_General_BIN AND $db_Account.[Password] = :xpass");
	$stmt->bindParam(':xname', $user_name_login);
	$stmt->bindParam(':xpass', $hashed_password);

	if ($stmt->execute()){
		if ($row = $stmt->fetch()){
			session_start();

			if (empty($_SESSION['User']))
			{
				session_regenerate_id();
				$_SESSION["AccountId"] = $row["AccountId"];
				$req = $conn->prepare("SELECT * FROM ShoppingCartDreamTrix WHERE AccountId = ?");
				$req->execute([$row["AccountId"]]);
				$_SESSION["TotalPrice"] = 0;
				while($result = $req->fetch())
				{
					$_SESSION["TotalPrice"] += $result["TotalPrice"];
				}
				$_SESSION['User'] = $user_name_login;
			}
			if (empty($_SESSION['passwort']))
			{
				session_regenerate_id();
				$_SESSION['passwort'] =  hash('sha512',$user_password_login);
			}

			unset($_SESSION["LOGIN_ERROR"]); // destruir sesion de error
			header("location: ../index.php");

		}else{
			$_SESSION["LOGIN_ERROR"] = "Le nom d'utilisateur et le mot de passe ne correspondent à aucun compte";
			header("location: ../index.php");
		}
	}else{
		$_SESSION["LOGIN_ERROR"] = "Une erreur inattendue s'est produite";
		header("location: ../index.php");
	}
}
?>