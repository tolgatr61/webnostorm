<?php 
require_once '../../config.php';
session_start();
if(empty($_SESSION['User']) OR empty($_SESSION['passwort'])){echo 'comm_akt_fail';return;}
if(isset($_POST['commentaryID'])){
	$commentary_username = $_SESSION['User'];
	$commentary_passwort = $_SESSION['passwort'];
	$commenID_ROW = $_POST['commentaryID'];
	$commenID = implode(', ', $commenID_ROW);
	if(!is_Numeric($commenID)){echo 'comm_akt_fail';return;}
	$stmt = $conn->prepare("SELECT TOP 1 COUNT(*) AS AnzahlX FROM $db_Account WHERE $db_Account.[Name] = :xname AND $db_Account.[Password] = :xpass AND $db_Account.[Authority] >= 4");
	$stmt->bindParam(':xname', $commentary_username);
	$stmt->bindParam(':xpass', $commentary_passwort);
	if($stmt->execute()){
		$row = $stmt->fetch();
		if ($row['AnzahlX'] == 1){
			$stmt = $conn->prepare("DELETE FROM $db_Comm WHERE CommenId = :commentary_ID");
			$stmt->bindParam(':commentary_ID', $commenID);
			if($stmt->execute()){
				echo 'comment_success';
			}else{echo 'comm_akt_fail';}
		}else{echo 'comm_akt_fail';}
	}else{echo 'comm_akt_fail';}
}else{echo 'comm_akt_fail';}
?>