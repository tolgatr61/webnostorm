<?php 
	session_start();
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
if($_GET){
	$news_dynamic_failed = 1;
	$commentary_failed = 1;
	$commentary_create_failed = 1;
	if(isset($_GET['step']) && $_GET['step'] == "success"){$com_Success = 1;}else{$com_Success = 0;}
	if(isset($_GET['newsid']) && is_Numeric($_GET['newsid'])){
		$news_id = (int)$_GET['newsid'];
	}else{echo GetLang('<p><span class="white">Es konnten keine Nachrichten geladen werden. Probiere es später erneut.</span></p>','<p><span class="white">Could not load news. Try again later.</span></p>');return;}
	require_once '../../config.php';
	require_once '../../../../user/admin/CheckNewsDynamic.php';
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
	$monate = array("01"=>"Jan.","02"=>"Feb.","03"=>"Mär.","04"=>"Apr.","05"=>"Mai","06"=>"Juni","07"=>"Juli","08"=>"Aug.","09"=>"Sep.",10=>"Okt.",11=>"Nov.",12=>"Dez.");
	//-----------------------------------------------------------
	$stmt = $conn->prepare("SELECT * FROM $db_News WHERE NewsID = :news_id");
	$stmt->bindParam(':news_id', $news_id);
	if($stmt->execute()){
		$dynI = 0;
		while( $row_news_dynamic = $stmt->fetch()){
			$news_dynamic_row[] = $row_news_dynamic;
			$news_dynamic_failed = 0;
			$dynI++;
		}
		$stmt = $conn->prepare("SELECT * FROM $db_Comm INNER JOIN $db_Account ON $db_Comm.[CommAccID]=$db_Account.[AccountId] WHERE CommNewsID = :commen_id");
		$stmt->bindParam(':commen_id', $news_id);
		if($stmt->execute()){
			$dynC = 0;
			while( $row_commentary = $stmt->fetch()){
				$commentary_row[] = $row_commentary;
				$commentary_failed = 0;
				$dynC++;
			}
			if($dynC == 0){$commentary_failed = 1;}
		}else{$commentary_failed = 1;}
		$stmt = $conn->prepare("SELECT TOP 3 (Name) FROM $db_Char WHERE AccountId = :check_name AND State = 1");
		$stmt->bindParam(':check_name', $AccDBID);
		if($stmt->execute()){
			$dyn_Name = 0;
			while( $row_co_Name = $stmt->fetch()){
				$char_row[] = $row_co_Name;
				$dyn_Name++;
				$commentary_create_failed = 0;
			}
			if($dyn_Name == 0){$commentary_create_failed = 1;}
		}else{$commentary_create_failed = 1;}
	}else{$news_dynamic_failed=1;}
	if($news_dynamic_failed == 0){
?>
<script>
	$(document).ready(function() {
		$("#go_back_news").click(function(){
			$("#nm_slideshow > div:gt(0)").hide();
			$("#wrapper").fadeOut("slow", function(){
				$("#allNewsContent").show();
				$("#col_2").show();
				$('#NM_UCP').hide();
				$("#a_set").hide();
				ucphideshow=0;
				a_hideshow=0;
				$('#preview_jq_dynamic').hide();
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
	});
</script>
<nav id="breadcrumbs" class="content_box">
    <ul>
        <li><a id="go_back_news" class="arrow_right_gray arrow"><span> </span><?php echo GetLang('Zurück','Retour');?></a></li>
	</ul>
    <div class="clearfix"></div>
</nav>
<div class="content_box_white">
	<article class="news">
	<?php $D_I = 0;
		while(!empty($news_dynamic_row[$D_I]['NewsID'])){?>
		<header class="article_header">
			<div class="date_news image_news_shadow">
				<span><?php $monats = date("m", strtotime($news_dynamic_row[$D_I]['date'])); echo $monate[$monats];?></span>
				<span><?php echo date("d", strtotime($news_dynamic_row[$D_I]['date'])); ?></span>
			</div>
			<div class="News_Header_Dyn">
				<h1><?php echo GetLang(strip_tags($news_dynamic_row[$D_I]['Header']),strip_tags($news_dynamic_row[$D_I]['HeaderEng'])); ?></h1>
				<span class="info_text light_grey"><?php echo GetLang(' Von ',' By ').$news_dynamic_row[$D_I]['Username'].GetLang(' - Datum ',' - Date ') ?> ( <?php echo $news_dynamic_row[$D_I]['date']; ?> )</span>
			</div>
		</header>
		<div class="article_content_dyn">
			<div class="article_text">             
				<p style="margin-top: 35px;" class="news_area"><span class="black"><?php echo GetLang(closetags(strip_tags($news_dynamic_row[$D_I]['NText'],"<strong><em><u><br><span>")),closetags(strip_tags($news_dynamic_row[$D_I]['NTextEng'],"<strong><em><u><br><span>"))); ?></span></p>
			</div>
			<div class="clear"></div>
		</div>
		<span class="clearfix"></span>
		<?php $D_I++;} ?>
	</article>
</div>
<div class="content_box_white">
	<h3 style="margin-bottom: 15px;" id="commentary_dynamic"><?php echo GetLang("Kommentare zum Artikel","Nombre de commentaire").' (0)'; ?></h3>
	<?php if(isset($commentary_failed) && $commentary_failed == 0){ ?>
	<div id="commentscontent">
		<?php $c_I = 0; $c_show = 0;
		while(!empty($commentary_row[$c_I]['CommenId'])){
			if($commentary_row[$c_I]['CommEnable'] == 1 || $CheckisAdmin >= 2){ ?>
			<div class="comment_wrapper" id="comment_<?php echo $c_show; ?>" name="comment_<?php echo $c_show; ?>">
				<div class="user_image_wrapper">
					<?php echo '<img class="user_image" src="../../../../images/nm_ucp/probild/'.LoadUserImage($commentary_row[$c_I]['Profilbild']).'.jpg" alt="user_name"/>'; ?>
				</div>
				<div class="comment_content<?php if($commentary_row[$c_I]['CommEnable'] == 1){echo ' '.'commentdisabled';} ?>" >
					<span class="bubble_arrow"></span>
					<header class="comment_header">
						<?php if($commentary_row[$c_I]['Authority'] >= 1){ ?>
							<p class="info_text"><?php echo GetLang('Von','De').' <span class="crewcolor">'.$commentary_row[$c_I]['CommName'].'</span>'.' '.GetLang("Gesendet am:","Posté le:").' '.$commentary_row[$c_I]['CommDate']; ?> 
							<?php if($commentary_row[$c_I]['CommEnable'] == 1){echo '<span class="commentdisabledcolor">';}if($CheckisAdmin >= 1){echo '<a href="#activecommentary'.$commentary_row[$c_I]['CommenId'].'" id="commentary_aktiv_'.$commentary_row[$c_I]['CommenId'].'">
							<u>Activer</u></a> | <a href="#disable'.$commentary_row[$c_I]['CommenId'].'" id="commentary_deaktiv_'.$commentary_row[$c_I]['CommenId'].'"><u>Désactiver</u></a>| <a href="#deletecomm'.$commentary_row[$c_I]['CommenId'].'" id="commentary_delete_'.$commentary_row[$c_I]['CommenId'].'"><u>Effacer</u></a></span>';} ?></p><span class="comment_nr">#<?php echo $c_show + 1; ?></span>
						<?php }else{ ?>
							<p class="info_text"><?php echo GetLang('Von','De').' '.$commentary_row[$c_I]['CommName'].' '.GetLang("Gesendet am:","Posté le:").' '.$commentary_row[$c_I]['CommDate']; ?> 
							<?php if($commentary_row[$c_I]['CommEnable'] == 1){echo '<span class="commentdisabledcolor">';}if($CheckisAdmin >= 1){echo '<a href="#activecommentary'.$commentary_row[$c_I]['CommenId'].'" id="commentary_aktiv_'.$commentary_row[$c_I]['CommenId'].'">
							<u>Activer</u></a> | <a href="#disable'.$commentary_row[$c_I]['CommenId'].'" id="commentary_deaktiv_'.$commentary_row[$c_I]['CommenId'].'"><u>Désactiver</u></a>| <a href="#deletecomm'.$commentary_row[$c_I]['CommenId'].'" id="commentary_delete_'.$commentary_row[$c_I]['CommenId'].'"><u>Effacer</u></a></span>';} ?></p><span class="comment_nr">#<?php echo $c_show + 1; ?></span>
				<?php } ?>
					</header>
					<p id="comment_<?php echo $c_show; ?>_text" name="comment_1_text"><?php echo $commentary_row[$c_I]['CommText']; ?></p>
				</div>
			</div>
			<?php if($CheckisAdmin >= 2){ ?>
				<script>
					$(document).ready(function() {
						$("#commentary_aktiv_<?php echo $commentary_row[$c_I]['CommenId']; ?>").click(function(){
							var commID = this.id.match(/\d+/);
							$.ajax({
								type : 'POST',
								url  : 'content/news_ajax/changestatus_aktiv.php',
								data : { "commentaryID" : commID },
								beforeSend: function(){
									$("#error_commentary").hide();
									$("#error_commentary").html('');
									$("#form_working_commentary").fadeIn(1000);
									$("#news_commentary").fadeOut(200);
								},
								success :  function(data)
								{
									if(data == "comm_akt_fail"){
										var commentaryACTIVText = "Das Kommentar #" + commID + " konnte nicht aktiviert werden ! ( Server Fehler )";
										$("#error_commentary").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> ' + commentaryACTIVText);
										$("#form_working_commentary").fadeOut(1000, function(){
											$("#error_commentary").fadeIn(1000);
											$("#news_commentary").fadeIn(200);
										});
									}else if(data == "comment_success"){
										$("#error_commentary").hide();
										if(isNewsShow==0){return false;}
										$("html, body").animate({ scrollTop: 0 }, 1500);
										$('#NM_UCP').hide();
										$("#a_set").hide();
										ucphideshow=0;
										a_hideshow=0;
										$('#a_set').load('content/ajax_admin.php',function(){});
										$("#wrapper").fadeOut("slow", function(){
											$('#preview_jq_dynamic').load('content/news_ajax/ajax_newsdyn.php?newsid=<?php echo $news_id; ?>',function(){
												$("#allNewsContent").hide();
												$("#col_2").hide();
												$('#preview_jq_dynamic').show();
												$("#wrapper").fadeIn("slow",function(){
													isPrangerShow = 0;
													isSupportShow = 0;
													IsRankingShow = 0;
													isNewsShow = 1;
												});
											});
										});
									}else{
										var commentaryACTIVText = "Das Kommentar #" + commID + " konnte nicht aktiviert werden ! ( Server Fehler )";
										$("#error_commentary").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> ' + commentaryACTIVText);
										$("#form_working_commentary").fadeOut(1000, function(){
											$("#error_commentary").fadeIn(1000);
											$("#news_commentary").fadeIn(200);
										});
									}
								},
								error: function (xhr, ajaxOptions, thrownError) {
									var commentaryACTIVText = "Das Kommentar #" + commID + " konnte nicht aktiviert werden ! ( Server Fehler )";
									$("#error_commentary").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> ' + commentaryACTIVText);
									$("#form_working_commentary").fadeOut(1000, function(){
										$("#error_commentary").fadeIn(1000);
										$("#news_commentary").fadeIn(200);
									});
								}
							});
							return false;
						});
						$("#commentary_deaktiv_<?php echo $commentary_row[$c_I]['CommenId']; ?>").click(function(){
							var commID = this.id.match(/\d+/);
							$.ajax({
								type : 'POST',
								url  : 'content/news_ajax/changestatus_deaktiv.php',
								data : { "commentaryID" : commID },
								beforeSend: function(){
									$("#error_commentary").hide();
									$("#error_commentary").html('');
									$("#form_working_commentary").fadeIn(1000);
									$("#news_commentary").fadeOut(200);
								},
								success :  function(data)
								{
									if(data == "comm_akt_fail"){
										var commentaryACTIVText = "Das Kommentar #" + commID + " konnte nicht deaktiviert werden ! ( Server Fehler )";
										$("#error_commentary").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i>' + commentaryACTIVText);
										$("#form_working_commentary").fadeOut(1000, function(){
											$("#error_commentary").fadeIn(1000);
											$("#news_commentary").fadeIn(200);
										});
									}else if(data == "comment_success"){
										$("#error_commentary").hide();
										if(isNewsShow==0){return false;}
										$("html, body").animate({ scrollTop: 0 }, 1500);
										$('#NM_UCP').hide();
										$("#a_set").hide();
										$('#a_set').load('content/ajax_admin.php',function(){});
										ucphideshow=0;
										a_hideshow=0;
										$("#wrapper").fadeOut("slow", function(){
											$('#preview_jq_dynamic').load('content/news_ajax/ajax_newsdyn.php?newsid=<?php echo $news_id; ?>',function(){
												$("#allNewsContent").hide();
												$("#col_2").hide();
												$('#preview_jq_dynamic').show();
												$("#wrapper").fadeIn("slow",function(){
													isPrangerShow = 0;
													isSupportShow = 0;
													IsRankingShow = 0;
													isNewsShow = 1;
												});
											});
										});
									}else{
										var commentaryACTIVText = "Das Kommentar #" + commID + " konnte nicht deaktiviert werden ! ( Server Fehler )";
										$("#error_commentary").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> ' + commentaryACTIVText);
										$("#form_working_commentary").fadeOut(1000, function(){
											$("#error_commentary").fadeIn(1000);
											$("#news_commentary").fadeIn(200);
										});
									}
								},
								error: function (xhr, ajaxOptions, thrownError) {
									var commentaryACTIVText = "Das Kommentar #" + commID + " konnte nicht aktiviert werden ! ( Server Fehler )";
									$("#error_commentary").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> ' + commentaryACTIVText);
									$("#form_working_commentary").fadeOut(1000, function(){
										$("#error_commentary").fadeIn(1000);
										$("#news_commentary").fadeIn(200);
									});
								}
							});
							return false;
						});
						$("#commentary_delete_<?php echo $commentary_row[$c_I]['CommenId']; ?>").click(function(){
							var commID = this.id.match(/\d+/);
							$.ajax({
								type : 'POST',
								url  : 'content/news_ajax/changestatus_delete.php',
								data : { "commentaryID" : commID },
								beforeSend: function(){
									$("#error_commentary").hide();
									$("#error_commentary").html('');
									$("#form_working_commentary").fadeIn(1000);
									$("#news_commentary").fadeOut(200);
								},
								success :  function(data)
								{
									if(data == "comm_akt_fail"){
										var commentaryACTIVText = "Das Kommentar #" + commID + " konnte nicht gelöscht werden ! ( Server Fehler )";
										$("#error_commentary").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i>' + commentaryACTIVText);
										$("#form_working_commentary").fadeOut(1000, function(){
											$("#error_commentary").fadeIn(1000);
											$("#news_commentary").fadeIn(200);
										});
									}else if(data == "comment_success"){
										$("#error_commentary").hide();
										if(isNewsShow==0){return false;}
										$("html, body").animate({ scrollTop: 0 }, 1500);
										$('#NM_UCP').hide();
										$("#a_set").hide();
										$('#a_set').load('content/ajax_admin.php',function(){});
										ucphideshow=0;
										a_hideshow=0;
										$("#wrapper").fadeOut("slow", function(){
											$('#preview_jq_dynamic').load('content/news_ajax/ajax_newsdyn.php?newsid=<?php echo $news_id; ?>',function(){
												$("#allNewsContent").hide();
												$("#col_2").hide();
												$('#preview_jq_dynamic').show();
												$("#wrapper").fadeIn("slow",function(){
													isPrangerShow = 0;
													isSupportShow = 0;
													IsRankingShow = 0;
													isNewsShow = 1;
												});
											});
										});
									}else{
										var commentaryACTIVText = "Das Kommentar #" + commID + " konnte nicht gelöscht werden ! ( Server Fehler )";
										$("#error_commentary").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> ' + commentaryACTIVText);
										$("#form_working_commentary").fadeOut(1000, function(){
											$("#error_commentary").fadeIn(1000);
											$("#news_commentary").fadeIn(200);
										});
									}
								},
								error: function (xhr, ajaxOptions, thrownError) {
									var commentaryACTIVText = "Das Kommentar #" + commID + " konnte nicht gelöscht werden ! ( Server Fehler )";
									$("#error_commentary").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> ' + commentaryACTIVText);
									$("#form_working_commentary").fadeOut(1000, function(){
										$("#error_commentary").fadeIn(1000);
										$("#news_commentary").fadeIn(200);
									});
								}
							});
							return false;
						});
					});
				</script>
			<?php } ?>
			<?php $c_show++;}
			$c_I++;} 
			if($c_show == 0){
				echo GetLang("Sei der erste und schreibe unter dieser Nachricht ein Kommentar.","Soyez le premier et écrivez un commentaire sous ce message.");
			}
			?>
			<script>
			$(document).ready(function() {
				$("#commentary_dynamic").html("<?php echo GetLang("Kommentare zum Artikel","Commentaire sur cette article").' ('.($c_show).')'; ?>");
			});
			</script>
	</div>
	<?php }else{echo GetLang("Sei der erste und schreibe unter dieser Nachricht ein Kommentar.","Soyez le premier et écrivez un commentaire sous ce message.");} ?>
</div>
<div class="content_box_white">
	<footer>
		<nav id="pagina"></nav>
		<div>
		<?php if(isset($CharacterCount) && $CharacterCount == 0){ ?>
			<div class="login_buschi">
				<div class="balloon">
					<?php if(isset($CheckIsLogged) && $CheckIsLogged == 0){?>
						<p class="center_text"><?php echo GetLang("Du willst auch einen Kommentar schreiben? Dann logge dich erst ein:","Vous souhaitez écrire un commentaire? Connectez-vous d'abord !"); ?></p>
						<div id="loginBtnComments"><a  href="#loginLayer" class="button fancybox"><?php echo GetLang("Einloggen","S'identifier"); ?></a></div>
					<?php }else if(isset($CharacterCount) && $CharacterCount == 0){ ?>
						<p class="center_text" style="margin: 65px 32px 20px 20px;"><?php echo GetLang("Um einen Kommentar schreiben zu können, erstelle zunächst einen Charakter.","Pour publier un commentaire, créez d'abord un personnage."); ?></p>
					<?php } ?>
				</div>
				<div class="buschi"><img src="/images/mascots/commentary-buschi.png"></div>
			</div>
		<?php }else if(isset($CheckIsLogged,$CharacterCount) && $CharacterCount >= 1 && $CheckIsLogged == 1){ ?>
			<div>
				<?php if($com_Success == 0){ ?><h3 id="commentary_header"><?php echo GetLang("Artikel kommentieren","Commentaire de l'article").' ( 0 / 150 )'; ?></h3><?php } ?>
				<div class="comment_wrapper" id="comment_creation_box">
					<?php if(isset($commentary_create_failed) && $commentary_create_failed == 0){ ?>
					<script>
					$(document).ready(function() {
						$('#charselect').change(function() {
							var CharText = $("#charselect").val();
							$('#rename_char').html(CharText);
						});
						$('#commentText').on('keyup', function(event) {
						   var len = $(this).val().length;
							$("#commentary_header").html("<?php echo GetLang("Artikel kommentieren","Commentaire de l'article"); ?> ( " + [len] + " / 150 )");
						});
						$("#news_commentary").click(function(){
							var LenghtText = $("#commentText").val().length;
							if(LenghtText == "" || LenghtText < 10){
								$("#error_commentary").hide();
								$("#error_commentary").html('');
								$("#form_working_commentary").fadeIn(1000);
								$("#news_commentary").fadeOut(200);
								var text2lang = " <?php echo GetLang("Vergewissere dich dass du alle Felder ausgefüllt hast und mindestens 10 Zeichen benutz hast.","Assurez-vous d'avoir rempli tous les champs et utilisé au moins 10 caractères."); ?>";
								$("#error_commentary").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i>' + text2lang);
								$("#form_working_commentary").fadeOut(1000, function(){
									$("#error_commentary").fadeIn(1000);
									$("#news_commentary").fadeIn(200);
								});
								return false;
							}
							$("#error_commentary").hide();
							var datacommen = $("#commentForm").serialize();
							$.ajax({
								type : 'POST',
								url  : 'content/news_ajax/createcomm.php',
								data : datacommen,
								beforeSend: function()
								{
									$("#error_commentary").hide();
									$("#error_commentary").html('');
									$("#form_working_commentary").fadeIn(1000);
									$("#news_commentary").fadeOut(200);
								},
								success :  function(datacommen)
								{
									if(datacommen == "selected_item_w"){
										var text2lang_selected = " <?php echo GetLang("Bitte überprüfe ob du einen Charakter ausgewählt hast oder dieser Exestiert. Melde dich sonst bei einen Adminstrator.","Vérifiez si vous avez sélectionné un personnage ou vérifier que ce personnage existe. Sinon, contactez un administrateur."); ?>";
										$("#error_commentary").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i>' + text2lang_selected);
										$("#form_working_commentary").fadeOut(1000, function(){
											$("#error_commentary").fadeIn(1000);
											$("#news_commentary").fadeIn(200);
										});
									}else if(datacommen == "texttoshort"){
										var text2lang_textshort = " <?php echo GetLang("Vergewissere dich dass du alle Felder ausgefüllt hast und mindestens 70 Zeichen benutz hast.","Assurez-vous d'avoir rempli tous les champs et utilisé au moins 70 caractères."); ?>";
										$("#error_commentary").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i>' + text2lang_textshort);
										$("#form_working_commentary").fadeOut(1000, function(){
											$("#error_commentary").fadeIn(1000);
											$("#news_commentary").fadeIn(200);
										});
									}else if(datacommen == "faildyn"){
										var text2lang_fail = " <?php echo GetLang("Es ist ein Fehler aufgetretten, probiere es später erneut.","Il y a une erreur, réessayez plus tard."); ?>";
										$("#error_commentary").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i>' + text2lang_fail);
										$("#form_working_commentary").fadeOut(1000, function(){
											$("#error_commentary").fadeIn(1000);
											$("#news_commentary").fadeIn(200);
										});
									}else if(datacommen == "comment_success"){
										$("#error_commentary").hide();
										if(isNewsShow==0){return false;}
										$("html, body").animate({ scrollTop: 0 }, 1500);
										$('#NM_UCP').hide();
										$("#a_set").hide();
										ucphideshow=0;
										a_hideshow=0;
										$("#wrapper").fadeOut("slow", function(){
											$('#preview_jq_dynamic').load('content/news_ajax/ajax_newsdyn.php?newsid=<?php echo $news_id; ?>&step=success',function(){
												$("#allNewsContent").hide();
												$("#col_2").hide();
												$('#preview_jq_dynamic').show();
												$("#wrapper").fadeIn("slow",function(){
													isPrangerShow = 0;
													isSupportShow = 0;
													IsRankingShow = 0;
													isNewsShow = 1;
												});
											});
										});
									}else{
										var text2lang_else = " <?php echo GetLang("Es ist ein Fehler aufgetretten, probiere es später erneut.","Il y a une erreur, réessayez plus tard."); ?>";
										$("#error_commentary").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i>' + text2lang_else);
										$("#form_working_commentary").fadeOut(1000, function(){
											$("#error_commentary").fadeIn(1000);
											$("#news_commentary").fadeIn(200);
										});	
									}
								},
								error: function (xhr, ajaxOptions, thrownError) {
									var text2lang_error = " <?php echo GetLang("Es ist ein Fehler aufgetretten, probiere es später erneut.","Il y a une erreur, réessayez plus tard."); ?>";
									$("#error_commentary").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i>' + text2lang_error);
									$("#form_working_commentary").fadeOut(1000, function(){
										$("#error_commentary").fadeIn(1000);
										$("#news_commentary").fadeIn(200);
									});
								}
							});
							return false;
						});
					});
					</script>
					<?php if($com_Success == 0){ ?>
					<div class="user_image_wrapper"> 
						<span class="bubble_arrow"></span>
						<?php echo '<img class="user_image" src="../../../../images/nm_ucp/probild/'.LoadUserImage($proImage).'.jpg" alt="user_name"/>'; ?>
					</div>
					<?php } ?>
					<div class="">
						<?php if($com_Success == 1){ ?>
							<div class="login_buschi">
								<div class="balloon">
										<p class="center_text"><?php echo GetLang("Danke für deinen Kommentar! Dieser wird nun bearbeitet!","Merci pour votre commentaire !"); ?></p>
								</div>
								<div class="buschi"><img src="/images/mascots/commentary-buschi.png"></div>
							</div>
						<?php }else{ ?>
						<form id="commentForm" name="commentForm" autocomplete="off" method="POST">
							<div class="input_wrapper">
								<div class="cmf-skinned-select" style="width: 208px; height: 22px; position: relative;">
									<div class="cmf-skinned-text" style="height: 25px; opacity: 100; overflow: hidden; position: absolute; text-indent: 0px; z-index: 1; top: 0px; left: 0px;" id="rename_char"><?php echo GetLang("Wähle einen Charakter aus","Select a character"); ?></div>
									<select name="charselect" id="charselect" style="opacity: 0; position: relative; z-index: 100;width:100%;">
										<option value="<?php echo GetLang("Wähle einen Charakter aus","Select a character"); ?>" selected="selected"><?php echo GetLang("Wähle einen Charakter aus","Select a character"); ?></option>
										<?php $ch_I = 0;
										while(!empty($char_row[$ch_I]['Name'])){?>
										<option value="<?php echo $char_row[$ch_I]['Name']; ?>"><?php echo $char_row[$ch_I]['Name']; ?></option>	
									<?php $ch_I++;} ?> 
									</select>
								</div>
							</div>
							<input name="newsID" value="<?php echo $news_id; ?>" id="newsID" maxlength="20" type="hidden">
							<input name="accountnumber" value="<?php echo $AccDBID; ?>" id="accountnumber" maxlength="20" type="hidden">
							<textarea id="commentText" name="commentText" maxlength="150" class="commentary_pad" onfocus="if (this.value=='<?php echo GetLang('Dein Kommentar','Your comment'); ?>') this.value=''" onblur="if (this.value=='') this.value='<?php echo GetLang('Dein Kommentar','Your comment'); ?>'"><?php echo GetLang('Dein Kommentar','Your comment'); ?></textarea>
							<div id="error_commentary" class="errorcommentary"></div>
							<div id="form_working_commentary" class="form_working" style="display: none;"><?php echo GetLang('Bitte warten...','Patientez...');?></div>
							<button type="submit" id="news_commentary" style="margin-top: 15px;"><?php echo GetLang("Kommentar absenden","Envoyer un commentaire"); ?></button>
						</form>
						<?php } ?>
					</div>
					<?php }else{echo '<b style="padding-left: 0px;">'.GetLang("Es ist ein Fehler aufgetreten, versuche es später erneut.","Il y a une erreur, réessayez plus tard.").'</b>';} ?>
				</div>
			</div>
		<?php }else{echo GetLang("Es ist ein Fehler aufgetreten, versuche es später erneut.","Il y a une erreur, réessayez plus tard.");} ?>
		</div>
	</footer>
</div>
<?php }else{echo GetLang('<p><span class="white">Es konnten keine Nachrichten geladen werden. Probiere es später erneut.</span></p>','<p><span class="white">Could not load news. Try again later.</span></p>');}
	}else{echo GetLang('<p><span class="white">Es konnten keine Nachrichten geladen werden. Probiere es später erneut.</span></p>','<p><span class="white">Could not load news. Try again later.</span></p>');} ?>