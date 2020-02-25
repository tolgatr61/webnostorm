<?php 
try
{
require_once '../news/index/config.php';

session_start();

if($_POST){
	$user_name = $_POST['username'];
	$user_email = $_POST['mail'];
	$user_password = $_POST['password'];
	$user_passwordrepeat = $_POST['passwordRepeat'];

	$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$ReCaptchaPrivate.'&response='.$_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    if($responseData->success){
		if($user_password != $user_passwordrepeat){
			$_SESSION["REGISTER_ERROR"] = "Passwords entered do not match";
			header("location: ../index.php");
			return;
		}
		if(!filter_var($user_email, FILTER_VALIDATE_EMAIL) === true) {
			$_SESSION["REGISTER_ERROR"] = "The email is not valid";
			header("location: ../index.php");
			return;
		}
		if (!preg_match('/^[0-9a-z]+$/i', $user_name)) {
			$_SESSION["REGISTER_ERROR"] = "The user name contains invalid characters";
			header("location: ../index.php");
			return;
		}
		if(strlen($user_name) > 16){
			$_SESSION["REGISTER_ERROR"] = "Username is too long";
			header("location: ../index.php");
			return;
		}
		if(strlen($user_email) > 60){
			$_SESSION["REGISTER_ERROR"] = "The email is too long";
			header("location: ../index.php");
			return;
		}
		if(strlen($user_password) > 16){
			$_SESSION["REGISTER_ERROR"] = "Password is greater than 16 characters";
			header("location: ../index.php");
			return;
		}
		if(strlen($user_passwordrepeat) < 5){
			$_SESSION["REGISTER_ERROR"] = "Password is less than 5 characters";
			header("location: ../index.php");
			return;
		}
		$stmt = $conn->prepare("SELECT TOP 1 COUNT(*) AS AnzahlX FROM $db_Account WHERE [Email] = :e_adress");
		$stmt->bindParam(':e_adress', $user_email);
		if ($stmt->execute()){
			$row = $stmt->fetch();
			if ($row['AnzahlX'] != 0){
				$_SESSION["REGISTER_ERROR"] = "The mail is already used";
				header("location: ../index.php");
				return;
			}
		}else{
			$_SESSION["REGISTER_ERROR"] = "An unexpected error occurred";
			header("location: ../index.php");
			return;
		}
	    $stmt = $conn->prepare("SELECT TOP 1 COUNT(*) AS Anzahl FROM $db_Account WHERE [Name] = :xname ");
		$stmt->bindParam(':xname', $user_name);
		if ($stmt->execute()){
			$row = $stmt->fetch();
			if ($row['Anzahl'] == 0){
				$ip_address = $_SERVER['REMOTE_ADDR'];
				$stmt = $conn->prepare("INSERT INTO $db_Account(Name,Authority,Email,Password,RegistrationIP,VerificationToken) VALUES(:uname,0,:eaddress,:passwort,:ipaddress,'yes')");
				$stmt->bindParam(':uname', $user_name);
				$stmt->bindParam(':eaddress', $user_email);
				$stmt->bindParam(':passwort', hash('sha512',$user_password));
				$stmt->bindParam(':ipaddress', $ip_address);
				if($stmt->execute()){
					echo "accountreg";
					session_start();
					if(empty($_SESSION['User']))
					{
						session_regenerate_id();
						$_SESSION['User'] = $user_name;
					}
					if(empty($_SESSION['passwort']))
					{
						session_regenerate_id();
						$_SESSION['passwort'] =  hash('sha512',$user_password);
					}
					unset($_SESSION["REGISTER_ERROR"]);
					header("location: ../index.php");
				}
				else{
					$_SESSION["REGISTER_ERROR"] = "An unexpected error occurred";
					header("location: ../index.php");
				}
			}else{
				$_SESSION["REGISTER_ERROR"] = "Username is not available";
				header("location: ../index.php");
			}
		}else{
			$_SESSION["REGISTER_ERROR"] = "An unexpected error occurred";
			header("location: ../index.php");
		}
	}
	else{
		$_SESSION["REGISTER_ERROR"] = "Merci de compléter le captcha pour l'inscription !";
		header("location: ../index.php");
		return;
	}
}
}
catch(Exception $e) {
echo 'Exception abgefangen: ',  $e->getMessage(), "\n";
}
?>