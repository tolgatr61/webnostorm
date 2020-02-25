<?php 
if($_POST){
	session_start();
	if(empty($_SESSION['User']) OR empty($_SESSION['passwort'])){echo 'ticket_failed';return;}
	require_once '../../config.php';
	function GetLang($German,$Englisch){
		if(isset($_SESSION["Sprache"])){
			if($_SESSION['Sprache'] == "Ger"){return $German;}
			else{return $Englisch;}
		}else{return $Englisch;}
	}
	//-----------------------------------------------------------------------------
	$user_name_ticket = $_POST['ticket_name'];
	$ticket_selected = $_POST['select_ticket'];
	$ticket_text_var = $_POST['ticket_text'];
	$ticket_pass = $_SESSION['passwort'];
	$ticket_betreff = "";
	if($user_name_ticket != $_SESSION['User']){echo 'ticket_failed';return;}
	if($ticket_selected == 0){$ticket_betreff = "Account Diebstahl";}
	else if($ticket_selected == 1){$ticket_betreff = "Anderer Missbrauch";}
	else if($ticket_selected == 2){$ticket_betreff = "Account Entsperrung";}
	else if($ticket_selected == 3){$ticket_betreff = "Beleidigung/Anstößiger Inhalt";}
	else if($ticket_selected == 4){$ticket_betreff = "Bugmeldung";}
	else if($ticket_selected == 5){$ticket_betreff = "Meldung über Hacker/Bot User/Scripter";}
	else if($ticket_selected == 6){$ticket_betreff = "Sonstiges";}
	else{echo 'ticket_failed';return;}
	if($ticket_betreff == ""){echo 'ticket_failed';return;}
	if(empty($ticket_text_var)){echo 'all_field';return;}
	if(strlen($ticket_text_var) < 275){echo 'tooshort';return;}
	if(strlen($ticket_text_var) >= 551){echo 'ticket_failed';return;}
	//----------------------------------------------------------------------------
	$stmt = $conn->prepare("SELECT TOP 1 COUNT(*) AS Anzahl FROM $db_Account WHERE $db_Account.[Name] = :xname AND $db_Account.[Password] = :xpass");
	$stmt->bindParam(':xname', $user_name_ticket);
	$stmt->bindParam(':xpass', $ticket_pass);
	if($stmt->execute()){
		$row = $stmt->fetch();
		if ($row['Anzahl'] == 1){
			$admin_name =  "work_status";
			$date_content = date("d-m-Y"); 
			$stmt = $conn->prepare("INSERT INTO $db_Ticket(ticket_creatorID,ticket_status,ticket_work_status,ticket_work_admin,ticket_subject,ticket_date) VALUES(:t_name,1,1,:t_ad_name,:subject,:date_ticket)");
			$stmt->bindParam(':t_name', $user_name_ticket);
			$stmt->bindParam(':t_ad_name', $admin_name);
			$stmt->bindParam(':subject', $ticket_betreff);
			$stmt->bindParam(':date_ticket', $date_content);
			if($stmt->execute()){
				$last_ticket_ID = $conn->lastInsertId();
				$ticket_text_br = nl2br($ticket_text_var);
				$striped_text = strip_tags($ticket_text_br,'<br><br/>');
				$date_time_content = date("d-m-Y H:m:s");
				$stmt = $conn->prepare("INSERT INTO $db_awTicket(t_ID,anwser,answer_date,anwser_name,ticket_counter) VALUES(:last_ticket,:ticket_text,:date_time_date,:get_anwser_name,0)");
				$stmt->bindParam(':last_ticket', $last_ticket_ID);
				$stmt->bindParam(':ticket_text', $striped_text);
				$stmt->bindParam(':date_time_date', $date_time_content);
				$stmt->bindParam(':get_anwser_name', $user_name_ticket);
				if($stmt->execute()){
					echo 'ticket_success';
				}else{echo 'ticket_failed';return;}
			}else{echo 'ticket_failed';return;}
		}else{echo 'ticket_failed';return;}
	}else{echo 'ticket_failed';return;}
}
?>