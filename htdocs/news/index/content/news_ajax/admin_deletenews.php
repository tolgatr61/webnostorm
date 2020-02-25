<?php 
require_once '../../config.php';
session_start();
if(empty($_SESSION['User']) OR empty($_SESSION['passwort'])){echo 'news_del_fail';return;}
if($_POST){
	$newsdelete_username = $_SESSION['User'];
	$newsdelete_passwort = $_SESSION['passwort'];
	$ndel_form_id = $_POST['editnews_ID'];
	if(!is_Numeric($ndel_form_id)){echo 'news_del_fail';return;}
	$stmt = $conn->prepare("SELECT TOP 1 COUNT(*) AS AnzahlX FROM $db_Account WHERE $db_Account.[Name] = :xname AND $db_Account.[Password] = :xpass AND $db_Account.[Authority] >= 4");
	$stmt->bindParam(':xname', $newsdelete_username);
	$stmt->bindParam(':xpass', $newsdelete_passwort);
	if($stmt->execute()){
		$row = $stmt->fetch();
		if ($row['AnzahlX'] == 1){
			$stmt = $conn->prepare("DELETE FROM $db_News WHERE $db_News.[NewsID] = :editID");
			$stmt->bindParam(':editID', $ndel_form_id);
			if($stmt->execute()){
				$stmt = $conn->prepare("DELETE FROM $db_Comm WHERE $db_Comm.[CommNewsID] = :editIDC");
				$stmt->bindParam(':editIDC', $ndel_form_id);
				if($stmt->execute()){
					echo 'news_del_success';
				}else{echo 'news_del_fail';}
			}else{echo 'news_del_fail';}
		}else{echo 'news_del_fail';}
	}else{echo 'news_del_fail';}
}
?>