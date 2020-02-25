<?php 
require_once '../../config.php';
session_start();
if(empty($_SESSION['User']) OR empty($_SESSION['passwort'])){echo 'news_edit_fail';return;}
if($_POST){
	$nedit_form_id = $_POST['editnews_ID'];
	$nedit_header = $_POST['editnews_header'];
	$nedit_header_eng = $_POST['news_header_eng'];
	$nedit_text = $_POST['editnews_text'];
	$nedit_texteng = $_POST['editnews_texteng'];
	$nedit_image = $_POST['editnews_Image'];
	$newsedit_pass = $_SESSION['passwort'];
	$nedit_username = $_SESSION['User'];
	if(empty($nedit_form_id) OR empty($nedit_header) OR empty($nedit_header_eng)  OR empty($nedit_text) OR empty($nedit_texteng) OR empty($nedit_image)){
		echo 'newsedit_empty';
		return;
	}
	if(strlen($nedit_header) < 15){
		echo 'newsedit_ger';
		return;
	}
	if(strlen($nedit_header_eng) < 15){
		echo 'newsedit_heng';
		return;
	}
	if(strlen($nedit_text) < 60){
		echo 'newsedit_text_ger';
		return;
	}
	if(strlen($nedit_texteng) < 60){
		echo 'newsedit_text_eng';
		return;
	}
	if(strlen($nedit_image) < 10){
		echo 'newsedit_url_empty';
		return;
	}
	function closetags($html) {
		preg_match_all('#<([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result);
		$openedtags = $result[1];
		preg_match_all('#</([a-z]+)>#iU', $html, $result);
		$closedtags = $result[1];
		$len_opened = count($openedtags);
		if (count($closedtags) == $len_opened) {
			return $html;
		}
		$openedtags = array_reverse($openedtags);
		for ($i=0; $i < $len_opened; $i++) {
			if (!in_array($openedtags[$i], $closedtags)) {
				$html .= '</'.$openedtags[$i].'>';
			} else {
				unset($closedtags[array_search($openedtags[$i], $closedtags)]);
			}
		}
		return $html;
	}
	$stmt = $conn->prepare("SELECT TOP 1 COUNT(*) AS AnzahlX FROM $db_Account WHERE $db_Account.[Name] = :xname AND $db_Account.[Password] = :xpass AND $db_Account.[Authority] >= 4");
	$stmt->bindParam(':xname', $nedit_username);
	$stmt->bindParam(':xpass', $newsedit_pass);
	if($stmt->execute()){
		$row = $stmt->fetch();
		if ($row['AnzahlX'] == 1){
			closetags($nedit_text);
			closetags($nedit_texteng);
			$nedit_text_br = nl2br($nedit_text);
			$nedit_text_br_eng = nl2br($nedit_texteng);
			$stmt = $conn->prepare("UPDATE $db_News SET Header = :editheaderger,HeaderEng = :editheadereng,NText = :edittext,NTextEng = :edittexteng,Image = :editnewsimage WHERE NewsID = :newseditid");
			$stmt->bindParam(':editheaderger',$nedit_header);
			$stmt->bindParam(':editheadereng',$nedit_header_eng);
			$stmt->bindParam(':edittext',$nedit_text_br);
			$stmt->bindParam(':edittexteng',$nedit_text_br_eng);
			$stmt->bindParam(':editnewsimage',$nedit_image);
			$stmt->bindParam(':newseditid',$nedit_form_id);
			if($stmt->execute()){
				echo 'news_edit_success';
			}else{echo 'news_edit_fail';}
		}else{echo 'news_edit_fail';}
	}else{echo 'news_edit_fail';}
}
?>