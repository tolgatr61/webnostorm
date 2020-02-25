<?php 
	session_start();
	require_once '../../config.php';
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
	//--------------------------------------------------------------------------------------------------------------------------
	if(empty($_SESSION['User']) OR empty($_SESSION['passwort'])){echo 'faildyn';return;}
	$selected_Char = $_POST['charselect'];
	$commText = $_POST['commentText'];
	$accountID = $_POST['accountnumber'];
	$newsID = $_POST['newsID'];
	if (!preg_match('/^[0-9a-z]+$/i', $accountID)) {
		echo 'faildyn';
		return;
	}
	if (!preg_match('/^[0-9a-z]+$/i', $selected_Char)) {
		echo 'selected_item_w';
		return;
	}
	if (!preg_match('/^[0-9a-z]+$/i', $newsID)) {
		echo 'faildyn';
		return;
	}
	if(empty($commText) or strlen($commText) < 10){
		echo 'texttoshort';
		return;
	}
	if(is_numeric($accountID)){
		$stmt = $conn->prepare("SELECT TOP 1 COUNT(AccountId) AS CheckAnzahl FROM $db_Account WHERE AccountId = :acc_ID");
		$stmt->bindParam(':acc_ID', $accountID);
		if($stmt->execute()){
			$row = $stmt->fetch();
			if($row['CheckAnzahl'] == 0){
				echo 'faildyn';
				return;
			}
		}else{echo 'faildyn';return;}
	}else{echo 'faildyn';return;}
	//--------------------------------------------------------------------------------------------------------------------------
	if(is_numeric($newsID)){
		$stmt = $conn->prepare("SELECT TOP 1 COUNT(NewsID) AS CheckNewsAnzahl FROM $db_News WHERE NewsID = :news_ID");
		$stmt->bindParam(':news_ID', $newsID);
		if($stmt->execute()){
			$row2 = $stmt->fetch();
			if($row2['CheckNewsAnzahl'] == 0){
				echo 'faildyn';
				return;
			}
		}else{echo 'faildyn';return;}
	}else{echo 'faildyn';return;}
	//--------------------------------------------------------------------------------------------------------------------------
	$stmt = $conn->prepare("SELECT TOP 1 (Name) FROM $db_Char WHERE Name = :checkname");
	$stmt->bindParam(':checkname', $selected_Char);
	if($stmt->execute()){
		if($row3 = $stmt->fetch()){
			closetags($commText);
			$br_text = nl2br($commText);
			$stripped_text = strip_tags($br_text,"<br>");
			$datum = date("Y-m-d");
			$stmt = $conn->prepare("INSERT INTO $db_Comm(CommText,CommAccID,CommNewsID,CommEnable,CommDate,CommName) VALUES(:d_Text,:d_AccID,:d_NewsID,0,:d_Date,:d_Charname)");
			$stmt->bindParam(':d_Text', $stripped_text);
			$stmt->bindParam(':d_AccID', $accountID);
			$stmt->bindParam(':d_NewsID', $newsID);
			$stmt->bindParam(':d_Date', $datum);
			$stmt->bindParam(':d_Charname', $selected_Char);
			if($stmt->execute()){
				echo 'comment_success';
			}else{echo 'faildyn';return;}
		}else{echo 'selected_item_w';return;}
	}else{echo 'selected_item_w';return;}
?>