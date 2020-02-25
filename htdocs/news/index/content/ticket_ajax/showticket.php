<?php 
if($_GET){
	if(isset($_GET['ticketID'])){
		$ticketID = $_GET['ticketID'];
		$ticketFailed = 0;
		$ticketChangeCounter = 0;
		if(!is_numeric($ticketID)){echo GetLang('<p class="white">Es ist ein Fehler aufgetreten, probiere es später erneut !</p>','<p class="white">There is an error, try it again later!</p>');return;}
		//-----------------------------------------------------------------------------
		session_start();
		if(empty($_SESSION['User']) OR empty($_SESSION['passwort'])){echo GetLang('<p class="white">Es ist ein Fehler aufgetreten, probiere es später erneut !</p>','<p class="white">There is an error, try it again later!</p>');return;}
		require_once '../../config.php';
		require_once 'CheckUser.php';
		function GetLang($German,$Englisch){
			if(isset($_SESSION["Sprache"])){
				if($_SESSION['Sprache'] == "Ger"){return $German;}
				else{return $Englisch;}
			}else{return $Englisch;}
		}
		function LoadUserImage($Load_Variable_Image){
			if($Load_Variable_Image == 0){return "default";}//Sp1
			else if($Load_Variable_Image == 1){return "male/mranger";}
			else if($Load_Variable_Image == 2){return "male/mkrieger";}
			else if($Load_Variable_Image == 3){return "male/mredmage";}
			else if($Load_Variable_Image == 4){return "female/wranger";}
			else if($Load_Variable_Image == 5){return "female/wkrieger";}
			else if($Load_Variable_Image == 6){return "female/wredmage";}//Sp2
			else if($Load_Variable_Image == 7){return "male/mschurke";}
			else if($Load_Variable_Image == 8){return "male/mninja";}
			else if($Load_Variable_Image == 9){return "male/mholy";}
			else if($Load_Variable_Image == 10){return "female/wschurke";}
			else if($Load_Variable_Image == 11){return "female/wninja";}
			else if($Load_Variable_Image == 12){return "female/wholy";}//Sp3
			else if($Load_Variable_Image == 13){return "male/mgunner";}
			else if($Load_Variable_Image == 14){return "male/mcrusi";}
			else if($Load_Variable_Image == 15){return "male/mice";}
			else if($Load_Variable_Image == 16){return "female/wgunner";}
			else if($Load_Variable_Image == 17){return "female/wcrusi";}
			else if($Load_Variable_Image == 18){return "female/wice";}//Sp4
			else if($Load_Variable_Image == 19){return "male/mwk";}
			else if($Load_Variable_Image == 20){return "male/mbersi";}
			else if($Load_Variable_Image == 21){return "male/mdg";}
			else if($Load_Variable_Image == 22){return "female/wwk";}
			else if($Load_Variable_Image == 23){return "female/wbersi";}
			else if($Load_Variable_Image == 24){return "female/wdg";}//Sp5
			else if($Load_Variable_Image == 25){return "male/mkano";}
			else if($Load_Variable_Image == 26){return "male/mgladi";}
			else if($Load_Variable_Image == 27){return "male/mvulki";}
			else if($Load_Variable_Image == 28){return "female/wkano";}
			else if($Load_Variable_Image == 29){return "female/wgladi";}
			else if($Load_Variable_Image == 30){return "female/wvulki";}//Sp6
			else if($Load_Variable_Image == 31){return "male/mspaeher";}
			else if($Load_Variable_Image == 32){return "male/mkm";}
			else if($Load_Variable_Image == 33){return "male/mgzb";}
			else if($Load_Variable_Image == 34){return "female/wspaeher";}
			else if($Load_Variable_Image == 35){return "female/wkm";}
			else if($Load_Variable_Image == 36){return "female/wgzb";}//Sp7
			else if($Load_Variable_Image == 37){return "male/mdj";}
			else if($Load_Variable_Image == 38){return "male/mtodb";}
			else if($Load_Variable_Image == 39){return "male/mseher";}
			else if($Load_Variable_Image == 40){return "female/wdj";}
			else if($Load_Variable_Image == 41){return "female/wtodb";}
			else if($Load_Variable_Image == 42){return "female/wseher";}//Sp7
			else if($Load_Variable_Image == 43){return "male/mrache";}
			else if($Load_Variable_Image == 44){return "male/mabt";}
			else if($Load_Variable_Image == 45){return "male/merzmagier";}
			else if($Load_Variable_Image == 46){return "female/wracheengel";}
			else if($Load_Variable_Image == 47){return "female/wabt";}
			else if($Load_Variable_Image == 48){return "female/werzmag";}
			else{return "default";}
		}
	//-----------------------------------------------------------------------------
	if($CheckIsLogged == 0){$ticketFailed = 1;}
	$username_ticket = $_SESSION['User'];
	//-----------------------------------------------------------------------------
	$stmt = $conn->prepare("SELECT * FROM $db_Ticket WHERE ticket_creatorID = :ticketName AND ticketID = :tick_ID");
	$stmt->bindParam(':ticketName', $username_ticket);
	$stmt->bindParam(':tick_ID', $ticketID);
	if($stmt->execute()){
		if($CheckIsLogged == 1){
			$i = 0;
			while( $row_ticket = $stmt->fetch()){
				$ticket_row[] = $row_ticket;
				$ticketFailed = 0;
				$i++;
			}
			if($i == 0){$ticketFailed = 1;}
		}
	}else{$ticketFailed = 1;}
	//-----------------------------------------------------------------------------
	if($ticketFailed == 0){
		$stmt = $conn->prepare("SELECT * FROM $db_awTicket WHERE t_ID = :tick_ID2 ORDER BY t_ID DESC");
		$stmt->bindParam(':tick_ID2', $ticketID);
		if($stmt->execute()){
			if($CheckIsLogged == 1){
				$i3 = 0;
				while( $row_anwser = $stmt->fetch()){
					$anwser_row[] = $row_anwser;
					$ticketFailed = 0;
					$i3++;
				}
				if($i3 == 0){$ticketFailed = 1;}
			}
		}else{$ticketFailed = 1;}
		//-----------------------------------------------------------------------------
		$iU = 0;
		while(!empty($ticket_row[$iU]['ticket_creatorID'])){
			if($_SESSION['User'] != $ticket_row[$iU]['ticket_creatorID']){$ticketFailed = 1;}
			$iU++;
		}
	}
?>
<script>
$(document).ready(function() {
	$("#go_back_ticket_support").click(function(){
		if(ticketWait == 0){
			if(loggedin == 1){
				$("html, body").animate({ scrollTop: 0 }, 1500);
				$("#wrapper").fadeOut("slow", function(){
					$( "#mainNavNews" ).removeClass("active");
					$( "#mainNavPRANGER" ).removeClass("active");
					$( "#mainNavSUPPORT" ).addClass("active");
					$('#NM_UCP').hide();
					$("#a_set").hide();
					ucphideshow=0;
					a_hideshow=0;
					$('#preview_jq_dynamic').load('content/ajax_support.php',function(){
						if(isAdmin == 1){$("#UserControlPanel").hide();}
						$("#allNewsContent").hide();
						$("#col_2").hide();
						$('#preview_jq_dynamic').show();
						$("#wrapper").fadeIn("slow",function(){
							document.title = '<?php echo $Name; ?> - Support';
							isPrangerShow = 0;
							isSupportShow = 1;
							isNewsShow = 0;
							IsRankingShow = 0;
							isNewsEditShow = 0;
						});
					});
				});
			}
		}
		return false;
	});
	$("#re_freshsupport_t").click(function(){
		if(ticketWait == 0){
			if(loggedin == 1){
				$("html, body").animate({ scrollTop: 0 }, 1500);
				$("#wrapper").fadeOut("slow", function(){
					$( "#mainNavNews" ).removeClass("active");
					$( "#mainNavPRANGER" ).removeClass("active");
					$( "#mainNavSUPPORT" ).addClass("active");
					$('#NM_UCP').hide();
					$("#a_set").hide();
					ucphideshow=0;
					a_hideshow=0;
					$('#preview_jq_dynamic').load('content/ticket_ajax/showticket.php?ticketID=<?php echo $ticketID; ?>',function(){
						if(isAdmin == 1){$("#UserControlPanel").hide();}
						$("#allNewsContent").hide();
						$("#col_2").hide();
						$('#preview_jq_dynamic').show();
						$("#wrapper").fadeIn("slow",function(){
							document.title = '<?php echo $Name; ?> - Support';
							isPrangerShow = 0;
							isSupportShow = 1;
							isNewsShow = 0;
							IsRankingShow = 0;
							isNewsEditShow = 0;
						});
					});
				});
			}
		}
		return false;
	});
	$( "#re_freshsupport_t" ).mouseover(function() {$(this).addClass( "fa-spin" );});
	$( "#re_freshsupport_t" ).mouseleave(function() {$(this).removeClass( "fa-spin" );});
	//------------------------------------------
});
</script>
<nav id="breadcrumbs" class="content_box">
    <ul>
        <li><a id="go_back_ticket_support" class="arrow_right_gray arrow"><span> </span><?php echo GetLang('Zurück','Back');?></a></li>
	</ul>
    <div class="clearfix"></div>
</nav>
<?php if($ticketFailed != 1){ ?>
<div class="content_box_white">
	<?php $i2 = 0;
	while(!empty($ticket_row[$i2]['ticketID'])){ ?>
	<h2><?php echo $Name; ?> - Ticket System - Ticket: #<?php echo $ticket_row[$i2]['ticketID']; ?> <a href="#refreshTicket" class="adm_refresh" id="re_freshsupport_t"><i class="fa fa-refresh fa-2x fa-fw"></i></a></h2>
	<p style="margin-top:15px;">Ticket-ID: <b><?php echo $ticket_row[$i2]['ticketID']; ?></b></p>
	<p><?php echo GetLang("Betreff","Subject"); ?>: <b><?php if($ticket_row[$i2]['ticket_subject'] == "Account Diebstahl"){echo GetLang("Account-Diebstahl (Fremdzugriff)","Account theft (external access)");}
		else if($ticket_row[$i2]['ticket_subject'] == "Anderer Missbrauch"){echo GetLang("Anderer Missbrauch","Other abuse");}
		else if($ticket_row[$i2]['ticket_subject'] == "Account Entsperrung"){echo GetLang("Anfrage zur Accountentsperrung","Request to unlock account");}
		else if($ticket_row[$i2]['ticket_subject'] == "Beleidigung/Anstößiger Inhalt"){echo GetLang("Beleidigung/Anstößiger Inhalt","Insults/offensive content");}
		else if($ticket_row[$i2]['ticket_subject'] == "Bugmeldung"){echo GetLang("Bugmeldung","Bugreport");}
		else if($ticket_row[$i2]['ticket_subject'] == "Meldung über Hacker/Bot User/Scripter"){echo GetLang("Meldung über Hacker/Bot User/Scripter","Report hackers/bots/scripts");}
		else if($ticket_row[$i2]['ticket_subject'] == "Sonstiges"){echo GetLang("Sonstiges","Others");}
		else {echo '<i class="fa fa-question-circle" aria-hidden="true"> </i>';}?></b>
	</p>
	<p>Account: <b><?php echo $ticket_row[$i2]['ticket_creatorID'];?></b></p>
	<p>Status: <b><?php if($ticket_row[$i2]['ticket_status'] == 1){echo '<i class="fa fa-envelope-open-o" aria-hidden="true"></i> '.GetLang("Wird bearbeitet","In process");}else{echo '<i class="fa fa-lock" aria-hidden="true"></i> '.GetLang("Geschloßen","Closed");} ?></b></p>
	<?php $i2++;} ?>
</div>
<div class="content_box_white">
	<h3 style="margin-bottom: 15px;" id="ticket_dynamic"><?php echo GetLang("Antworten zu diesem Ticket","Reply to this ticket"); ?> (<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i>)</h3>
	<?php $i4 = 0;
	while(!empty($anwser_row[$i4]['answerID'])){
		$checkAdminStep = 0;
		$stmt = $conn->prepare("SELECT Authority,Name,Profilbild FROM $db_Account WHERE Name = :userName");
		$stmt->bindParam(':userName', $anwser_row[$i4]['anwser_name']);
		if($stmt->execute()){
			$checkAdminStep = 1;
			while( $row_CheckName = $stmt->fetch()){
				$NameCheck[$i4] = $row_CheckName;
				$checkAdminStep = 0;
			}
		}else{$checkAdminStep = 1;}
		if($checkAdminStep != 1){
	if($ticketChangeCounter == 0){?>
	<div id="commentscontent">
		<div class="comment_wrapper" id="comment_<?php echo $i4 ?>" name="comment_<?php echo $i4 ?>">
			<?php if($checkAdminStep != 1){ ?><div class="user_image_wrapper"><img class="user_image" src="../../../../images/nm_ucp/probild/<?php echo LoadUserImage($NameCheck[$i4]['Profilbild']); ?>.jpg" alt="user_name"></div><?php } ?>
			<div class="comment_content">
				<span class="bubble_arrow"></span>
				<header class="comment_header"><p class="info_text"><?php
					if($checkAdminStep != 1 && $NameCheck[$i4]['Authority'] >= 2){
						echo '<span style="color:#B90000;text-shadow: #B90000 1px 1px 8px;">'.GetLang("Von","By").' <span class="crewcolor">[Crew]'.$anwser_row[$i4]['anwser_name'].'</span>'.' '.GetLang("Gesendet am:","Posted on:").' '.$anwser_row[$i4]['answer_date'].'</span>';
					}else{
						echo GetLang("Von","By").' '.$anwser_row[$i4]['anwser_name'].' '.GetLang("Gesendet am:","Posted on:").' '.$anwser_row[$i4]['answer_date'];
					}
				?></header>
				<p id="comment_<?php echo $i4 ?>_text" name="comment_<?php echo $i4 ?>_text"><?php echo $anwser_row[$i4]['anwser']; ?></p>
			</div>
		</div>
	</div>
		<?php $ticketChangeCounter = 1;}else{?>
	<div id="commentscontent">
		<div class="comment_wrapper_2" id="comment_<?php echo $i4 ?>" name="comment_<?php echo $i4 ?>">
			<?php if($checkAdminStep != 1){ ?><div class="user_image_wrapper"><img class="user_image" src="../../../../images/nm_ucp/probild/<?php echo LoadUserImage($NameCheck[$i4]['Profilbild']); ?>.jpg" alt="user_name"></div><?php } ?>
			<div class="comment_content">
				<span class="bubble_arrow"></span>
				<header class="comment_header"><p class="info_text" style="text-align: right;"><?php
					if($checkAdminStep != 1 && $NameCheck[$i4]['Authority'] >= 2){
						echo '<span style="color:#B90000;text-shadow: #B90000 1px 1px 8px;">'.GetLang("Von","By").' <span class="crewcolor">[Crew]'.$anwser_row[$i4]['anwser_name'].'</span>'.' '.GetLang("Gesendet am:","Posted on:").' '.$anwser_row[$i4]['answer_date'].'</span>';
					}else{
						echo GetLang("Von","By").' '.$anwser_row[$i4]['anwser_name'].' '.GetLang("Gesendet am:","Posted on:").' '.$anwser_row[$i4]['answer_date'];
					}
				?></header>
				<p id="comment_<?php echo $i4 ?>_text" name="comment_<?php echo $i4 ?>_text"><?php echo $anwser_row[$i4]['anwser']; ?></p>
			</div>
		</div>
	</div>
		<?php $ticketChangeCounter = 0;}
		}else{echo GetLang('<p style="black">Es ist ein Fehler aufgetreten, probiere es später erneut !</p>','<p class="black">There is an error, try it again later!</p>');} ?>
	<?php $i4++; } 
	$countofall = $i4;
	?>
	<script>$("#ticket_dynamic").html("<?php echo GetLang('Antworten zu diesem Ticket','Reply to this ticket').' ('.$countofall.')'; ?>");</script>
</div>
<?php }else{echo GetLang('<p class="white">Es ist ein Fehler aufgetreten, probiere es später erneut !</p>','<p class="white">There is an error, try it again later!</p>');} ?>
<?php }else{echo GetLang('<p class="white">Es ist ein Fehler aufgetreten, probiere es später erneut !</p>','<p class="white">There is an error, try it again later!</p>');}
}else{echo GetLang('<p class="white">Es ist ein Fehler aufgetreten, probiere es später erneut !</p>','<p class="white">There is an error, try it again later!</p>');}?>