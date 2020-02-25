<?php 
	try
	{
	session_start();
	function GetLang($German,$Englisch){
		if(isset($_SESSION["Sprache"])){
			if($_SESSION['Sprache'] == "Ger"){return $German;}
			else{return $Englisch;}
		}else{return $Englisch;}
	}
	if(empty($_SESSION['User']) OR empty($_SESSION['passwort'])){echo GetLang('Du musst eingeloggt sein um diese Funktion zu nutzen !','You must be logged in to use this feature !');return;}
	//----------------------------------------------------------------------------------------------
	$ticket_username = $_SESSION['User'];
	require_once '../config.php';
	$stmt = $conn->prepare("SELECT COUNT(*) AS TicketAnzahl FROM $db_Ticket WHERE $db_Ticket.[ticket_creatorID] = :t_name");
	$stmt->bindParam(':t_name', $ticket_username);
	$anzahl_ticket = -1;
	if($stmt->execute()){
		$row = $stmt->fetch();
		$anzahl_ticket = $row['TicketAnzahl'];
	}else{$anzahl_ticket = -1;}
	//---
	$stmt = $conn->prepare("SELECT COUNT(*) AS TicketAnzahlWork FROM $db_Ticket WHERE $db_Ticket.[ticket_creatorID] = :t_name AND $db_Ticket.[ticket_status]= 1");
	$stmt->bindParam(':t_name', $ticket_username);
	$anzahl_worked_ticket = -1;
	if($stmt->execute()){
		$row = $stmt->fetch();
		$anzahl_worked_ticket = $row['TicketAnzahlWork'];
	}else{$anzahl_worked_ticket = -1;}
	//---
	$ticket_can_created = 0;
	$stmt = $conn->prepare("SELECT * FROM $db_Ticket WHERE $db_Ticket.[ticket_creatorID] = :t_xname ORDER BY $db_Ticket.[ticketID] DESC");
	$stmt->bindParam(':t_xname', $ticket_username);
	if($stmt->execute()){
		$ticket_can_created = 0;
		while( $row_t = $stmt->fetch()){
			$get_row_ticket[] = $row_t;
			$ticket_can_created=1;
		}
	}else{$ticket_can_created = 0;}
	}
catch (Exception $e) {
    echo 'Exception abgefangen: ',  $e->getMessage(), "\n";
}
?>
<script>
	$(document).ready(function() {
		var isAllreadyChecked = 0;
		$( "#submitBtnTicket" ).prop( "disabled", true );
		$( "#ticket_text_area" ).prop( "disabled", true );
		$("#go_back_support").click(function(){
			$("#wrapper").fadeOut("slow", function(){
				$("#nm_slideshow > div:gt(0)").hide();
				$( "#mainNavSUPPORT" ).removeClass("active");
				$( "#mainNavNews" ).addClass("active");
				$("#allNewsContent").show();
				$("#col_2").show();
				$('#preview_jq_dynamic').hide();
				$('#NM_UCP').hide();
				$("#a_set").hide();
				ucphideshow=0;
				a_hideshow=0;
				$("#wrapper").fadeIn("slow",function(){
					document.title = '<?php echo $Name; ?> - Home';
					IsRankingShow = 0;
					isSupportShow = 0;
					isPrangerShow = 0;
					isNewsShow = 0;
					$("#UserControlPanel").show();
				});
			});
			return false;
		});
		//----------------------------------
		$("#select_ticket").change(function () {
			if(isAllreadyChecked == 1){return false;}
			if(ticketWait == 1){return false;}
			ticketWait = 1;
			$("#re_freshsupport").addClass( "fa-spin" );
			var ticket_item = $(this).val();
			if(ticket_item == 0){
				$("#ticket_text_area").fadeTo("slow",0, function(){
					$("#rank_class_sel").html("<?php echo GetLang("Account-Diebstahl (Fremdzugriff)","Account theft (external access)"); ?>");
					$("#ticket_text_area").load("content/ticket_ajax/ajax_ticket_text.php?texttype=acc_thief",function(){
						$("#ticket_text_area").fadeTo("slow",1);
						$("#re_freshsupport").removeClass( "fa-spin" );
					});
					$( "#submitBtnTicket" ).prop( "disabled", false );
					$( "#ticket_text_area" ).prop( "disabled", false );
				});
			}else if(ticket_item == 1){
				$("#ticket_text_area").fadeTo("slow",0, function(){
					$("#rank_class_sel").html("<?php echo GetLang("Anderer Missbrauch","Other abuse"); ?>");
					$("#ticket_text_area").load("content/ticket_ajax/ajax_ticket_text.php?texttype=other",function(){
						$("#ticket_text_area").fadeTo("slow",1);
						$("#re_freshsupport").removeClass( "fa-spin" );
					});
					$( "#submitBtnTicket" ).prop( "disabled", false );
					$( "#ticket_text_area" ).prop( "disabled", false );
				});
			}else if(ticket_item == 2){
				$("#ticket_text_area").fadeTo("slow",0, function(){
					$("#rank_class_sel").html("<?php echo GetLang("Anfrage zur Accountentsperrung","Request to unlock account"); ?>");
					$("#ticket_text_area").load("content/ticket_ajax/ajax_ticket_text.php?texttype=unlock",function(){
						$("#ticket_text_area").fadeTo("slow",1);
						$("#re_freshsupport").removeClass( "fa-spin" );
					});
					$( "#submitBtnTicket" ).prop( "disabled", false );
					$( "#ticket_text_area" ).prop( "disabled", false );
				});
			}else if(ticket_item == 3){
				$("#ticket_text_area").fadeTo("slow",0, function(){
					$("#rank_class_sel").html("<?php echo GetLang("Beleidigung/Anstößiger Inhalt","Insults/offensive content"); ?>");
					$("#ticket_text_area").load("content/ticket_ajax/ajax_ticket_text.php?texttype=insults",function(){
						$("#ticket_text_area").fadeTo("slow",1);
						$("#re_freshsupport").removeClass( "fa-spin" );
					});
					$( "#submitBtnTicket" ).prop( "disabled", false );
					$( "#ticket_text_area" ).prop( "disabled", false );
				});
			}else if(ticket_item == 4){
				$("#ticket_text_area").fadeTo("slow",0, function(){
					$("#rank_class_sel").html("<?php echo GetLang("Bugmeldung","Bugreport"); ?>");
					$("#ticket_text_area").load("content/ticket_ajax/ajax_ticket_text.php?texttype=bug",function(){
						$("#ticket_text_area").fadeTo("slow",1);
						$("#re_freshsupport").removeClass( "fa-spin" );
					});
					$( "#submitBtnTicket" ).prop( "disabled", false );
					$( "#ticket_text_area" ).prop( "disabled", false );
				});
			}else if(ticket_item == 5){
				$("#ticket_text_area").fadeTo("slow",0, function(){
					$("#rank_class_sel").html("<?php echo GetLang("Meldung über Hacker/Bot User/Scripter","Report hackers/bots/scripts"); ?>");
					$("#ticket_text_area").load("content/ticket_ajax/ajax_ticket_text.php?texttype=hack",function(){
						$("#ticket_text_area").fadeTo("slow",1);
						$("#re_freshsupport").removeClass( "fa-spin" );
					});
					$( "#submitBtnTicket" ).prop( "disabled", false );
					$( "#ticket_text_area" ).prop( "disabled", false );
				});
			}else if(ticket_item == 6){
				$("#ticket_text_area").fadeTo("slow",0, function(){
					$("#rank_class_sel").html("<?php echo GetLang("Sonstiges","Others"); ?>");
					$("#ticket_text_area").load("content/ticket_ajax/ajax_ticket_text.php?texttype=other",function(){
						$("#ticket_text_area").fadeTo("slow",1);
						$("#re_freshsupport").removeClass( "fa-spin" );
					});
					$( "#submitBtnTicket" ).prop( "disabled", false );
					$( "#ticket_text_area" ).prop( "disabled", false );
				});
			}
			ticketWait = 0;
		});
		$('#ticket_text_area').on('keyup', function(event) {
		   var len = $(this).val().length;
			$("#ticket_text").html("<?php echo GetLang("Deine Problembeschreibung:","Description of your problem:"); ?> (  " + [len] + " / 550 )");
		});
		$('#submitBtnTicket').click(function(){
			if(ticketWait == 1){return false;}
			ticketWait = 1;
			var textval = $("#ticket_text_area").val();
			if(textval == "" || textval.length < 275){
				$("#ucp_fail_ticket").hide();
				$("#ucp_fail_ticket").html('');
				$("#form_working_ticket_write").fadeIn(1000);
				$("#submitBtnTicket").fadeOut(200);
				$("#form_working_ticket_write").fadeOut(1000, function(){
					$("#submitBtnTicket").fadeIn(800);
					$("#ucp_fail_ticket").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> <?php echo GetLang("Zu wenig Text ( Mind. 275 Zeichen )","Too little text (at least 275 characters)"); ?>');
					$("#ucp_fail_ticket").fadeIn(1000, function(){});
				});
			}
			var data_ticket_write = $("#ticketWriteTicket").serialize();
			$.ajax({
				type : 'POST',
				url  : 'content/ticket_ajax/createticket.php',
				data : data_ticket_write,
				beforeSend: function()
				{
					$("#ucp_fail_ticket").hide();
					$("#ucp_fail_ticket").html('');
					$("#form_working_ticket_write").fadeIn(1000);
					$("#submitBtnTicket").fadeOut(200);
				},
				success :  function(data_ticket_write)
				{
					if(data_ticket_write == "all_field"){
						$("#form_working_ticket_write").fadeOut(1000, function(){
							$("#submitBtnTicket").fadeIn(800);
							$("#ucp_fail_ticket").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> <?php echo GetLang("Fülle bitte alle Felder aus.","all fields is required."); ?>');
							$("#ucp_fail_ticket").fadeIn(1000, function(){});
						});
					}else if(data_ticket_write == "ticket_failed"){
						$("#form_working_ticket_write").fadeOut(1000, function(){
							$("#submitBtnTicket").fadeIn(800);
							$("#ucp_fail_ticket").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> <?php echo GetLang("Es ist ein Fehler aufgetaucht , probiere es später erneut !","There is an error, try it again later!"); ?>');
							$("#ucp_fail_ticket").fadeIn(1000, function(){});
						});
					}else if(data_ticket_write == "ticket_success"){
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
					}else if(data_ticket_write == "tooshort"){
						$("#form_working_ticket_write").fadeOut(1000, function(){
							$("#submitBtnTicket").fadeIn(800);
							$("#ucp_fail_ticket").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> <?php echo GetLang("Zu wenig Text ( Mind. 275 Zeichen )","Too little text (at least 275 characters)"); ?>');
							$("#ucp_fail_ticket").fadeIn(1000, function(){});
						});
					}else{
						$("#form_working_ticket_write").fadeOut(1000, function(){
							$("#submitBtnTicket").fadeIn(800);
							$("#ucp_fail_ticket").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> <?php echo GetLang("Es ist ein Fehler aufgetaucht , probiere es später erneut !","There is an error, try it again later!"); ?>');
							$("#ucp_fail_ticket").fadeIn(1000, function(){});
						});
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					$("#form_working_ticket_write").fadeOut(1000, function(){
						$("#submitBtnTicket").fadeIn(800);
						$("#ucp_fail_ticket").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> <?php echo GetLang("Es ist ein Fehler aufgetaucht , probiere es später erneut !","There is an error, try it again later!"); ?>');
						$("#ucp_fail_ticket").fadeIn(1000, function(){});
					});
				}
			});
			ticketWait = 0;
			return false;
		});
		$("#ticket_text_area").keydown(function() {
			var limit = parseInt($(this).attr('maxlength'));
			var text = $(this).val();
			var chars = text.length;
			if(chars > limit){
				var new_text = text.substr(0, limit);
				$(this).val(new_text);
			}
			if(isAllreadyChecked == 0){
				  $("#selectionSupport").slideUp();
				  $("#selectionSupport").fadeOut();
				  $("#ticket_betreff_label").fadeOut();
				  isAllreadyChecked = 1;
			}
		});
		//-----------------------------------------------------
		$("#ticket_write").click(function(){
			$("#white_my_tickets").hide();
			$("#white_ticket_history").hide();
			$("#white_write_tickets").show();
			<?php echo GetLang('$("#support_arrow").css("left", "187px");','$("#support_arrow").css("left", "155px");'); ?>
		});
		$("#ticket_history").click(function(){
			$("#white_my_tickets").hide();
			$("#white_write_tickets").hide();
			$("#white_ticket_history").show();
			<?php echo GetLang('$("#support_arrow").css("left", "313px");','$("#support_arrow").css("left", "263px");'); ?>
		});
		$("#ticket_my_ticket").click(function(){
			$("#white_ticket_history").hide();
			$("#white_write_tickets").hide();
			$("#white_my_tickets").show();
			<?php echo GetLang('$("#support_arrow").css("left", "62px");','$("#support_arrow").css("left", "54px");'); ?>
		});
		$( "#re_freshsupport" ).mouseover(function() {if(ticketWait == 0){$(this).addClass( "fa-spin" );}});
		$( "#re_freshsupport" ).mouseleave(function() {if(ticketWait == 0){$(this).removeClass( "fa-spin" );}});
		$("#re_freshsupport").click(function(){
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
		});
		return false;
	});
</script>
<nav id="breadcrumbs" class="content_box">
    <ul>
        <li><a id="go_back_support" class="arrow_right_gray arrow"><span> </span><?php echo GetLang('Zurück','Back');?></a></li>
	</ul>
    <div class="clearfix"></div>
</nav>
<div class="content_box_white">
	<h2><?php echo $Name; ?> - <?php echo GetLang("Ticket System","Support system"); ?> <a href="#refreshSupport" class="adm_refresh" id="re_freshsupport"><i class="fa fa-refresh fa-2x fa-fw"></i></a></h2>
	<ul class="ucp_tab" id="support_tab">
		<li><a href="#my_tickets" id="ticket_my_ticket"><i class="fa fa-list" aria-hidden="true"></i> <?php echo GetLang("Meine Tickets","My tickets"); ?></a></li>
		<li><a href="#writeticket" id="ticket_write"><i class="fa fa-plus-circle" aria-hidden="true"></i> <?php echo GetLang("Schreibe ein Ticket","Write a ticket"); ?></a></li>
		<?php if($anzahl_ticket != 0){ ?>
			<li><a href="#historyticket" id="ticket_history"><i class="fa fa-history" aria-hidden="true"></i> <?php echo GetLang("Ticketverlauf","Ticket history"); ?></a></li>
		<?php } ?>
	</ul>
	<?php echo GetLang('<span class="ucp_box_arrow_up" id="support_arrow" style="left: 62px;top: 104px;"></span>','<span class="ucp_box_arrow_up" id="support_arrow" style="left: 54px;top: 104px;"></span>'); ?>
	<div class="white_box" id="white_my_tickets">
		<p><strong><?php echo GetLang("Hallo,","Hello,").'</strong> '.$_SESSION['User'].'.'; ?> </p>
		<p><i style="color: #d1143c;"><?php 
			if($anzahl_worked_ticket == -1){echo GetLang("Es ist ein Fehler aufgetreten, probiere es später erneut !","There is an error, try it again later!");}
			else{
				if($anzahl_worked_ticket == 0){echo GetLang("Du hast derzeit keine offenen Tickets.","You currently have no open tickets.");}
				else{echo GetLang('Du hast derzeit '.$anzahl_worked_ticket.' offene Ticket(s).','You currently have '.$anzahl_worked_ticket.' opened ticket(s).');}
			} ?></i></p>
		<p><?php 
			if($anzahl_ticket == -1){echo GetLang("Es ist ein Fehler aufgetreten, probiere es später erneut !","There is an error, try it again later!");}
			else{
				echo GetLang('Du hast bereits von diesem Account '.$anzahl_ticket.' Ticket(s) geschrieben.','You have already posted '.$anzahl_ticket.' ticket(s) from this account.'); 
			}
		?></p>
	</div>
	<div class="white_box" style="display:none;" id="white_write_tickets">
		<form name="ticketWriteTicket" id="ticketWriteTicket" method="post" style="padding: 0px 5px;">
			<input type="hidden" name="ticket_name" value="<?php echo $_SESSION['User']; ?>">
			<div id="ucp_fail_ticket" class="error_acp_edit" style="display:none;"></div>
			<label for="ticket_betreff" id="ticket_betreff_label"><b><?php echo GetLang("Betreff","Subject"); ?>:</b></label>
			<div class="input_wrapper" id="selectionSupport">
				<div class="cmf-skinned-select" style="height: 22px; position: relative;">
					<div class="cmf-skinned-text" id="rank_class_sel" style="height: 25px; opacity: 100; overflow: hidden; position: absolute; text-indent: 0px; z-index: 1; top: 0px; left: 0px;"><?php echo GetLang("Bitte auswählen","Please select"); ?></div>
					<select id="select_ticket" class="select_skin" name="select_ticket" style="opacity: 0; position: relative; z-index: 100;width:100%;">
						<option value="0"><?php echo GetLang("Account-Diebstahl (Fremdzugriff)","Account theft (external access)"); ?></option>
						<option value="1"><?php echo GetLang("Anderer Missbrauch","Other abuse"); ?></option>
						<option value="2"><?php echo GetLang("Anfrage zur Accountentsperrung","Request to unlock account"); ?></option>
						<option value="3"><?php echo GetLang("Beleidigung/Anstößiger Inhalt","Insults/offensive content"); ?></option>
						<option value="4"><?php echo GetLang("Bugmeldung","Bugreport"); ?></option>
						<option value="5"><?php echo GetLang("Meldung über Hacker/Bot User/Scripter","Report hackers/bots/scripts"); ?></option>
						<option value="6"><?php echo GetLang("Sonstiges","Others"); ?></option>
					</select>
				</div>
			</div>
			<label for="ticket_text_area" style="margin-bottom: 15px;" id="ticket_text"><b><?php echo GetLang("Deine Problembeschreibung:","Description of your problem:"); ?></b></label>
			<div class="input_wrapper">
				<textarea id="ticket_text_area" name="ticket_text" title="" value="" maxlength="550" type="textarea" style="display:none;padding-left: 3px;width:100%;min-height: 200px;"></textarea>
			</div>
			<div id="form_working_ticket_write" class="form_working" style="display: none;"><?php echo GetLang('Bitte warten...','Please wait...');?></div>
			<button type="submit" id="submitBtnTicket" style="margin-top: 10px;margin-bottom: 15px;" class="btn-big"><?php echo GetLang("Sende Ticket","Send ticket"); ?></button>
			<p><?php echo GetLang("Du kannst deine Bilder auf zB. auf <a>http://www.pic-upload.de/</a> hochladen.","You can for example upload you image at <a>https://picload.org/</a>."); ?></p>
		</form>
	</div>
	<?php if($anzahl_ticket != 0){ ?>
	<div class="white_box" style="display:none;" id="white_ticket_history">
		<?php if(isset($ticket_can_created) && $ticket_can_created == 1){ ?>
			<table style="width: 100%;">
				<th>#TicketID</th>
				<th><?php echo GetLang("Betreff","Subject");?></th>
				<th><?php echo GetLang("Datum","Date");?></th>
				<th>Status</th>
				<th></th>
				<?php 
				$i = 0;
				while(!empty($get_row_ticket[$i]['ticket_creatorID'])){ ?>
				<script>
					$("#<?php echo 'ticketid_'.$get_row_ticket[$i]['ticketID']; ?>").click(function(){
						var ticketID = this.id.match(/\d+/);
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
									$('#preview_jq_dynamic').load('content/ticket_ajax/showticket.php?ticketID=' + ticketID,function(){
										if(isAdmin == 1){$("#UserControlPanel").hide();}
										$("#allNewsContent").hide();
										$("#col_2").hide();
										$('#preview_jq_dynamic').show();
										$("#wrapper").fadeIn("slow",function(){
											document.title = '<?php echo $Name; ?> - Support #' + ticketID;
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
					});
				</script>
				<tr>
					<td><?php echo 'Ticket ID: <b>'.$get_row_ticket[$i]['ticketID'].'</b>'; ?></td>
					<td><?php if($get_row_ticket[$i]['ticket_subject'] == "Account Diebstahl"){echo GetLang("Account-Diebstahl (Fremdzugriff)","Account theft (external access)");}
						else if($get_row_ticket[$i]['ticket_subject'] == "Anderer Missbrauch"){echo GetLang("Anderer Missbrauch","Other abuse");}
						else if($get_row_ticket[$i]['ticket_subject'] == "Account Entsperrung"){echo GetLang("Anfrage zur Accountentsperrung","Request to unlock account");}
						else if($get_row_ticket[$i]['ticket_subject'] == "Beleidigung/Anstößiger Inhalt"){echo GetLang("Beleidigung/Anstößiger Inhalt","Insults/offensive content");}
						else if($get_row_ticket[$i]['ticket_subject'] == "Bugmeldung"){echo GetLang("Bugmeldung","Bugreport");}
						else if($get_row_ticket[$i]['ticket_subject'] == "Meldung über Hacker/Bot User/Scripter"){echo GetLang("Meldung über Hacker/Bot User/Scripter","Report hackers/bots/scripts");}
						else if($get_row_ticket[$i]['ticket_subject'] == "Sonstiges"){echo GetLang("Sonstiges","Others");}
						else {echo '<i class="fa fa-question-circle" aria-hidden="true"> </i>';}
					?></td>
					<td><?php echo $get_row_ticket[$i]['ticket_date']; ?></td>
					<td><?php if($get_row_ticket[$i]['ticket_status'] == 1){echo '<i class="fa fa-envelope-open-o" aria-hidden="true"></i> '.GetLang("Wird bearbeitet...","In process...");}else{echo '<i class="fa fa-lock" aria-hidden="true"></i> '.GetLang("Geschloßen","Closed");} ?></td>
					<td><a href="#<?php echo 'go_ticketid_'.$get_row_ticket[$i]['ticketID']; ?>" id="<?php echo 'ticketid_'.$get_row_ticket[$i]['ticketID']; ?>"><span style="color:#D40000;"><u><?php echo GetLang("Öffnen","Open"); ?> <i class="fa fa-sign-in" aria-hidden="true"></i></u></span></a></td>
				</tr>
				<?php $i++;} ?>
			</table>
		<?php }else{echo GetLang("Es ist ein Fehler aufgetreten, probiere es später erneut !","There is an error, try it again later!");} ?>
	</div>
	<?php } ?>
	<p style="margin-top: 15px;"><strong>Copyright © 2017 <?php echo $Name; ?></strong></p>
</div>