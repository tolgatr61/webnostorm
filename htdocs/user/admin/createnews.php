<?php 
require_once '../../news/index/config.php';
session_start();
if(empty($_SESSION['User']) OR empty($_SESSION['passwort'])){echo 'fnews_error';return;}
if($_POST){
	$news_name = $_POST['news_name'];
	$news_header_ger = $_POST['news_header'];
	$news_header_eng = $_POST['news_header_eng'];
	$news_text = $_POST['news_text'];
	$news_text_eng = $_POST['news_texteng'];
	$news_image_url = $_POST['news_Image'];
	$news_pass = $_SESSION['passwort'];
	if(empty($news_name) OR empty($news_header_ger) OR empty($news_header_eng) OR empty($news_text) OR empty($news_text_eng) OR empty($news_image_url)){
		echo 'fnews_empty';
		return;
	}
	if(strlen($news_header_ger) < 15){
		echo 'fnews_hger';
		return;
	}
	if(strlen($news_header_eng) < 15){
		echo 'fnews_heng';
		return;
	}
	if(strlen($news_text) < 60){
		echo 'fnews_text_ger';
		return;
	}
	if(strlen($news_text_eng) < 60){
		echo 'fnews_text_eng';
		return;
	}
	if(strlen($news_image_url) < 20){
		echo 'fnews_url_empty';
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
	$stmt->bindParam(':xname', $news_name);
	$stmt->bindParam(':xpass', $news_pass);
	if($stmt->execute()){
		$row = $stmt->fetch();
		if ($row['AnzahlX'] == 1){
			$datum = date("Y-m-d");
			closetags($news_text);
			closetags($news_text_eng);
			$newstext_br = nl2br($news_text);
			$newstext_br_eng = nl2br($news_text_eng);
			$strip_news_header_ger = strip_tags($news_header_ger);
			$strip_news_header_eng = strip_tags($news_header_eng);
			$strip_news_image_url= strip_tags($news_image_url);
			$stmt = $conn->prepare("INSERT INTO $db_News(Header,NText,NTextEng,Image,date,Username,HeaderEng) VALUES(:headger,:newstextger,:newstexteng,:newsimg,:newsdatum,:newsuname,:headeng)");
			$stmt->bindParam(':headger', $strip_news_header_ger);
			$stmt->bindParam(':newstextger', $newstext_br);
			$stmt->bindParam(':newstexteng', $newstext_br_eng);
			$stmt->bindParam(':newsimg', $strip_news_image_url);
			$stmt->bindParam(':newsdatum', $datum);
			$stmt->bindParam(':newsuname', $news_name);
			$stmt->bindParam(':headeng', $strip_news_header_eng);
			if($stmt->execute()){
				echo 'news_success';
			}else{echo 'fnews_error';}
		}else{echo 'fnews_error';}
	}else{echo 'fnews_error';}
}
?>