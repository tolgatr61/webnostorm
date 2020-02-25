<?php 
require_once '../news/index/config.php';
session_start();
if(empty($_SESSION['User']) OR empty($_SESSION['passwort'])){echo 'ucp_fail';return;}
if($_POST)
{
	$img_wert = $_POST["imgucp"];
	$ucp_name = $_SESSION['User'];
	$ucp_pass = $_SESSION['passwort'];
	if($img_wert == "default"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='0' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mranger"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='1' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mkrieger"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='2' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mredmage"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='3' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wranger"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='4' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wkrieger"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='5' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wredmage"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='6' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mschurke"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='7' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mninja"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='8' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mholy"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='9' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wschurke"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='10' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wninja"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='11' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wholy"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='12' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mgunner"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='13' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mcrusi"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='14' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mice"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='15' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wgunner"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='16' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wcrusi"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='17' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wice"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='18' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mwk"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='19' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mbersi"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='20' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mdg"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='21' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wwk"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='22' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wbersi"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='23' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wdg"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='24' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mkano"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='25' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mgladi"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='26' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mvulki"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='27' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wkano"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='28' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wgladi"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='29' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wvulki"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='30' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mspaeher"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='31' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mkm"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='32' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mgzb"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='33' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wspaeher"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='34' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wkm"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='35' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wgzb"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='36' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mdj"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='37' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mtodb"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='38' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mseher"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='39' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wdj"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='40' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wtodb"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='41' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wseher"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='42' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mrache"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='43' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "mabt"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='44' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "merzmagier"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='45' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wrache"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='46' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "wabt"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='47' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else if($img_wert == "werzmagier"){
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='48' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}else{
		$stmt = $conn->prepare("UPDATE $db_Account SET $db_Account.Profilbild='0' WHERE $db_Account.Name = :name AND $db_Account.Password = :pass");
		$stmt->bindParam(':name', $ucp_name);
		$stmt->bindParam(':pass', $ucp_pass);
		if($stmt->execute()){
			echo 'ucp_success';
		}else {echo 'ucp_fail';return;}
	}
}else{echo 'ucp_fail_no';}
?>