<?php 
    require_once('../config.php');
	$notification_Count = 0;
	$support_Count = 0;
	$comment_count = 0;
	$stmt = $conn->prepare("SELECT COUNT(*) AS AnzahlTicket FROM $db_Ticket WHERE $db_Ticket.[ticket_status] = 1 AND $db_Ticket.[ticket_work_status] = 1");
	if($stmt->execute()){
		$row = $stmt->fetch();
		$support_Count = $row['AnzahlTicket'];
		$notification_Count = $support_Count + $notification_Count;
	}
	//-------------------------------------------------
	$stmt = $conn->prepare("SELECT COUNT(*) AS AnzahlComments FROM $db_Comm WHERE $db_Comm.[CommEnable] = 0");
	if($stmt->execute()){
		$row = $stmt->fetch();
		$comment_count = $row['AnzahlComments'];
		$notification_Count = $comment_count + $notification_Count;
	}
	//------------------------------------------------
	if($comment_count != 0){
		$stmt = $conn->prepare("SELECT * FROM $db_Comm WHERE $db_Comm.[CommEnable] = 0");
		if($stmt->execute()){
			$c_i = 0;
			while( $com_row = $stmt->fetch()){
				$comment[] = $com_row;
				$comment_failed = 0;
				$c_i++;
			}
			if($c_i == 0){$comment_failed = 1;}
		}
	}else{$comment_failed = 1;}
?> 