<?php 
	function GetLang($German,$Englisch){
		if(isset($_SESSION["Sprache"])){
			if($_SESSION['Sprache'] == "Ger"){return $German;}
			else{return $Englisch;}
		}else{return $Englisch;}
	}
	if(isset($_GET['newsid'])){
	session_start();
	require_once '../../config.php';
	require_once '../../../../user/admin/CheckNewsIfAdminNewsEdit.php';
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
	if(empty($_SESSION['User']) OR empty($_SESSION['passwort'])){echo GetLang('<p><span class="white">Es konnten keine Nachrichten geladen werden. Probiere es später erneut.</span></p>','<p><span class="white">Could not load news. Try again later.</span></p>');return;}
	if(isset($CheckisAdmin) && $CheckisAdmin >= 4){
		$news_edit_Failed = 1;
		if(isset($_GET['newsid']) && is_Numeric($_GET['newsid'])){
			$news_id = (int)$_GET['newsid'];
		}else{echo GetLang('<p><span class="white">Es konnten keine Nachrichten geladen werden. Probiere es später erneut.</span></p>','<p><span class="white">Could not load news. Try again later.</span></p>');return;}
		//-----------------------------------------------------------------------------------------------------------------------------------------
		$n_E = 0;
		$stmt = $conn->prepare("SELECT TOP 1 * FROM $db_News WHERE NewsID = :news_ID");
		$stmt->bindParam(':news_ID', $news_id);
		if($stmt->execute()){
			while( $row_newsedit = $stmt->fetch()){
				$news_editrow[] = $row_newsedit;
				$news_edit_Failed = 0;
				$n_E++;
			}
		}else{$news_edit_Failed = 1;}
		if($n_E == 0){$news_edit_Failed = 1;}
		if($news_edit_Failed == 0){
			$e_N = 0;
			?>
	<script>
		$(document).ready(function() {
			$("#newsedit_nav_back").click(function(){
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
						isNewsEditShow = 0;
						$("#UserControlPanel").show();
					});
				});
				return false;
			});
		});
	</script>
	<?php	$e_N = 0;
	while(!empty($news_editrow[$e_N]['NewsID'])){ ?>
	<script>
	$(document).ready(function() {
		document.title = '<?php echo $Name; ?> - News Edit #<?php echo $news_editrow[$e_N]['NewsID']; ?>';
		function wrapText(elementID, openTag, closeTag) {
			var textArea = $('#' + elementID);
			var len = textArea.val().length;
			var start = textArea[0].selectionStart;
			var end = textArea[0].selectionEnd;
			var selectedText = textArea.val().substring(start, end);
			var replacement = openTag + selectedText + closeTag;
			var limit = parseInt($(textArea).attr('maxlength'));
			var text = $(textArea).val();
			var chars = text.length;
			if(chars > limit){
				var new_text = text.substr(0, limit);
				$(this).val(new_text);
			}else{
				textArea.val(textArea.val().substring(0, start) + replacement + textArea.val().substring(end, len));
			}
		}
		function isUrl(s) {
			var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
			return regexp.test(s);
		}
		$('#editnews_textengtext').on('keyup', function(event) {
		   var len = $(this).val().length;
			$("#editnews_header_text_eng").html("<b>News Edit #<?php echo $news_editrow[$e_N]['NewsID']; ?> - Text ( English )*  ( " + [len] +" / 1500 )</b>");
			var limit = parseInt($(this).attr('maxlength'));
			var text = $(this).val();
			var chars = text.length;
			if(chars > limit){
				var new_text = text.substr(0, limit);
				$(this).val(new_text);
			}
		});
		$('#editnews_text').on('keyup', function(event) {
		   var len = $(this).val().length;
			$("#editnews_header_text_ger").html("<b>News #<?php echo $news_editrow[$e_N]['NewsID']; ?> - Text ( Deutsch )* ( " + [len] +" / 1500 )</b>");
				var limit = parseInt($(this).attr('maxlength'));
				var text = $(this).val();
				var chars = text.length;
				if(chars > limit){
					var new_text = text.substr(0, limit);
					$(this).val(new_text);
				}
		});
		$('#editnews_header').on('keyup', function(event) {
		   var len = $(this).val().length;
			$("#editnews_form_german").html("<b>News Edit #<?php echo $news_editrow[$e_N]['NewsID']; ?> - Überschrift* ( " + [len] +" / 60 )</b>");
		});
		$('#editnews_header_eng').on('keyup', function(event) {
		   var len = $(this).val().length;
			$("#editnews_form_eng").html("<b>News Edit #<?php echo $news_editrow[$e_N]['NewsID']; ?> - Überschrift*( English ) ( " + [len] +" / 60 )</b>");
		});		
		$('#editnews_bar_color').ColorPicker({
			color: '#0000ff',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				wrapText('editnews_text', "<span style=color:" + HEX_COLOR +">", "</span>");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#editnews_bar_color').css('color', '#' + hex);
				HEX_COLOR = "#" + hex;
			}
		});
		$('#editnews_bar_color_eng').ColorPicker({
			color: '#0000ff',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				wrapText('editnews_textengtext', "<span style=color:" + HEX_COLOR +">", "</span>");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#editnews_bar_color_eng').css('color', '#' + hex);
				HEX_COLOR = "#" + hex;
			}
		});
		$('#editnews_bar_bold').click(function(){wrapText('editnews_text', "<strong>", "</strong>");});
		$('#editnews_bar_bold_eng').click(function(){wrapText('editnews_textengtext', "<strong>", "</strong>");});
		$('#editnews_bar_kursiv').click(function(){wrapText('editnews_text', "<em>", "</em>");});
		$('#editnews_bar_kursiv_eng').click(function(){wrapText('editnews_textengtext', "<em>", "</em>");});
		$('#editnews_bar_underline').click(function(){wrapText('editnews_text', "<u>", "</u>");});
		$('#editnews_bar_underline_eng').click(function(){wrapText('editnews_textengtext', "<u>", "</u>");});
		$("#submitBtnNewsEdit").click(function(){
			var textareager = $("#editnews_text").val();
			var newtextger = textareager.substr(0, 1500);
			$("#editnews_text").val(newtextger);
			//--------------------------------------------
			var textareaeng = $("#editnews_textengtext").val();
			var newtexteng = textareaeng.substr(0, 1500);
			$("#editnews_textengtext").val(newtexteng);
			//--------------------------------------------
			var editDataheader = $("#editnews_header").val();
			if(editDataheader == "" || editDataheader.length < 15){
				$("#erroracpnewsedit").hide();
				$("#erroracpnewsedit").html('');
				$("#submitBtnNewsEdit").fadeOut(200);
				$("#submitBtnNewsDelete").fadeOut(200);
				$("#form_working_editnews").fadeIn(1000);
				$("#erroracpnewsedit").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Fülle das Feld `News Überschrift aus ( Deutsch )` aus. ( Mind. 15 Zeichen )');
				$("#form_working_editnews").fadeOut(1000, function(){
					$("#erroracpnewsedit").fadeIn(1000);
					$("#submitBtnNewsEdit").fadeIn(200);
					$("#submitBtnNewsDelete").fadeIn(200);
				});
				return false;
			}
			var editDataheadereng = $("#editnews_header_eng").val();
			if(editDataheadereng == "" || editDataheadereng.length < 15){
				$("#erroracpnewsedit").hide();
				$("#erroracpnewsedit").html('');
				$("#submitBtnNewsEdit").fadeOut(200);
				$("#submitBtnNewsDelete").fadeOut(200);
				$("#form_working_editnews").fadeIn(1000);
				$("#erroracpnewsedit").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Fülle das Feld `News Überschrift aus ( English )` aus. ( Mind. 15 Zeichen )');
				$("#form_working_editnews").fadeOut(1000, function(){
					$("#erroracpnewsedit").fadeIn(1000);
					$("#submitBtnNewsEdit").fadeIn(200);
					$("#submitBtnNewsDelete").fadeIn(200);
				});
				return false;
			}
			var editnewsDE_text = $("#editnews_text").val();
			if(editnewsDE_text == "" || editnewsDE_text.length < 60){
				$("#erroracpnewsedit").hide();
				$("#erroracpnewsedit").html('');
				$("#submitBtnNewsEdit").fadeOut(200);
				$("#submitBtnNewsDelete").fadeOut(200);
				$("#form_working_editnews").fadeIn(1000);
				$("#erroracpnewsedit").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Fülle das Feld `News Text aus ( Deutsch )` aus. ( Mind. 60 Zeichen )');
				$("#form_working_editnews").fadeOut(1000, function(){
					$("#erroracpnewsedit").fadeIn(1000);
					$("#submitBtnNewsEdit").fadeIn(200);
					$("#submitBtnNewsDelete").fadeIn(200);
				});
				return false;
			}
			var editnewsENG_text = $("#editnews_textengtext").val();
			if(editnewsENG_text == "" || editnewsENG_text.length < 60){
				$("#erroracpnewsedit").hide();
				$("#erroracpnewsedit").html('');
				$("#submitBtnNewsEdit").fadeOut(200);
				$("#submitBtnNewsDelete").fadeOut(200);
				$("#form_working_editnews").fadeIn(1000);
				$("#erroracpnewsedit").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Fülle das Feld `News Text aus ( English )` aus. ( Mind. 60 Zeichen )');
				$("#form_working_editnews").fadeOut(1000, function(){
					$("#erroracpnewsedit").fadeIn(1000);
					$("#submitBtnNewsEdit").fadeIn(200);
					$("#submitBtnNewsDelete").fadeIn(200);
				});
				return false;
			}
			var img_contentEDIT = $( "#editnews_Image").val();
			if( img_contentEDIT == "" || !isUrl(img_contentEDIT) || img_contentEDIT.length < 10){
				$("#erroracpnewsedit").hide();
				$("#erroracpnewsedit").html('');
				$("#submitBtnNewsEdit").fadeOut(200);
				$("#submitBtnNewsDelete").fadeOut(200);
				$("#form_working_editnews").fadeIn(1000);
				$("#erroracpnewsedit").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>  Das Bild enthält keine gültige Addresse ( zB. <b>http://www.nosmagic.de/bild.png</b> ) ( Mind. 10 Zeichen )');
				$("#form_working_editnews").fadeOut(1000, function(){
					$("#erroracpnewsedit").fadeIn(1000);
					$("#submitBtnNewsEdit").fadeIn(200);
					$("#submitBtnNewsDelete").fadeIn(200);
				});
				return false;
			}
			//----------------------
			var editdata = $("#editNews").serialize();
			$.ajax({
				type : 'POST',
				url  : 'content/news_ajax/admin_editnews.php',
				data : editdata,
				beforeSend: function()
				{
					$("#erroracpnewsedit").hide();
					$("#erroracpnewsedit").html('');
					$("#submitBtnNewsEdit").fadeOut(200);
					$("#submitBtnNewsDelete").fadeOut(200);
					$("#form_working_editnews").fadeIn(1000);
				},
				success :  function(editdata)
				{
					if(editdata == "newsedit_empty"){
						$("#erroracpnewsedit").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>  Fülle alle Felder aus!');
						$("#form_working_editnews").fadeOut(1000, function(){
							$("#erroracpnewsedit").fadeIn(1000);
							$("#submitBtnNewsEdit").fadeIn(200);
							$("#submitBtnNewsDelete").fadeIn(200);
						});
					}else if(editdata == "newsedit_ger"){
						$("#erroracpnewsedit").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Fülle das Feld `News Überschrift aus ( Deutsch )` aus. ( Mind. 15 Zeichen )');
						$("#form_working_editnews").fadeOut(1000, function(){
							$("#erroracpnewsedit").fadeIn(1000);
							$("#submitBtnNewsEdit").fadeIn(200);
							$("#submitBtnNewsDelete").fadeIn(200);
						});
					}else if(editdata == "newsedit_heng"){
						$("#erroracpnewsedit").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Fülle das Feld `News Überschrift aus ( English )` aus. ( Mind. 15 Zeichen )');
						$("#form_working_editnews").fadeOut(1000, function(){
							$("#erroracpnewsedit").fadeIn(1000);
							$("#submitBtnNewsEdit").fadeIn(200);
							$("#submitBtnNewsDelete").fadeIn(200);
						});
					}else if(editdata == "newsedit_text_ger"){
						$("#erroracpnewsedit").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Fülle das Feld `News Text aus ( Deutsch )` aus. ( Mind. 60 Zeichen )');
						$("#form_working_editnews").fadeOut(1000, function(){
							$("#erroracpnewsedit").fadeIn(1000);
							$("#submitBtnNewsEdit").fadeIn(200);
							$("#submitBtnNewsDelete").fadeIn(200);
						});
					}else if(editdata == "newsedit_text_eng"){
						$("#erroracpnewsedit").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Fülle das Feld `News Text aus ( English )` aus. ( Mind. 60 Zeichen )');
						$("#form_working_editnews").fadeOut(1000, function(){
							$("#erroracpnewsedit").fadeIn(1000);
							$("#submitBtnNewsEdit").fadeIn(200);
							$("#submitBtnNewsDelete").fadeIn(200);
						});
					}else if(editdata == "newsedit_url_empty"){
						$("#erroracpnewsedit").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>  Das Bild enthält keine gültige Addresse ( zB. http://www.nosmagic.de/bild.png ) ( <b>Mind. 10 Zeichen</b> )');
						$("#form_working_editnews").fadeOut(1000, function(){
							$("#erroracpnewsedit").fadeIn(1000);
							$("#submitBtnNewsEdit").fadeIn(200);
							$("#submitBtnNewsDelete").fadeIn(200);
						});
					}else if(editdata == "news_edit_fail"){
						$("#erroracpnewsedit").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>  Es liegt ein Fehler vor. Probiere es später erneut.');
						$("#form_working_editnews").fadeOut(1000, function(){
							$("#erroracpnewsedit").fadeIn(1000);
							$("#submitBtnNewsEdit").fadeIn(200);
							$("#submitBtnNewsDelete").fadeIn(200);
						});
					}else if(editdata == "news_edit_success"){
						$("#erroracpnewsedit").hide();
						$("#erroracpnewsedit").html('');
						$("#form_working_editnews").fadeOut(1000, function(){
							$("#submitBtnNewsEdit").fadeIn(200);
							$("#submitBtnNewsDelete").fadeIn(200);
						});
						if(isNewsShow==1 || isNewsEditShow == 0){return false;}
						$("html, body").animate({ scrollTop: 0 }, 1500);
							$('#NM_UCP').hide();
							$("#a_set").hide();
							ucphideshow=0;
							a_hideshow=0;
							$("#wrapper").fadeOut("slow", function(){
								$('#preview_jq_dynamic').load('content/news_ajax/ajax_newsdyn.php?newsid=<?php echo $news_editrow[$e_N]['NewsID']; ?>',function(){
									if(isAdmin == 1){$("#UserControlPanel").hide();}
									$("#allNewsContent").hide();
									$("#col_2").hide();
									$('#preview_jq_dynamic').show();
									$("#wrapper").fadeIn("slow",function(){
										isPrangerShow = 0;
										isSupportShow = 0;
										IsRankingShow = 0;
										isNewsEditShow = 0;
										isNewsShow = 1;
									});
								});
							});
							return false;
					}else{
						$("#erroracpnewsedit").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>  Es liegt ein Fehler vor. Probiere es später erneut.');
						$("#form_working_editnews").fadeOut(1000, function(){
							$("#erroracpnewsedit").fadeIn(1000);
							$("#submitBtnNewsEdit").fadeIn(200);
							$("#submitBtnNewsDelete").fadeIn(200);
						});
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					$("#erroracpnewsedit").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>  Es liegt ein Fehler vor. Probiere es später erneut.');
					$("#form_working_editnews").fadeOut(1000, function(){
						$("#erroracpnewsedit").fadeIn(1000);
						$("#submitBtnNewsEdit").fadeIn(200);
						$("#submitBtnNewsDelete").fadeIn(200);
					});
				}
			});
			return false;
		});
		$("#submitBtnNewsDelete").click(function(){
			if(editNewsDeleteCounter == 0){
				$(this).html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i> Drücke mich erneut um mich zu löschen ( 2 x )');
				editNewsDeleteCounter = 1;
				return false;
			}else if(editNewsDeleteCounter == 1){
				$(this).html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i> Drücke mich erneut um mich zu löschen ( 1 x )');
				editNewsDeleteCounter = 2;
				return false;
			}else if(editNewsDeleteCounter == 2){
				$(this).html('News #<?php echo $news_editrow[$e_N]['NewsID'];?> löschen');
				editNewsDeleteCounter = 3;
				//-------------------------------------------------------------
				var deletedate = $("#editNews").serialize();
				$.ajax({
					type : 'POST',
					url  : 'content/news_ajax/admin_deletenews.php',
					data : deletedate,
					beforeSend: function()
					{
						$("#erroracpnewsedit").hide();
						$("#erroracpnewsedit").html('');
						$("#submitBtnNewsEdit").fadeOut(200);
						$("#submitBtnNewsDelete").fadeOut(200);
						$("#form_working_editnews").fadeIn(1000);
					},
					success :  function(deletedate){
						if(deletedate == "news_del_fail"){
							$("#erroracpnewsedit").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>  Es liegt ein Fehler vor. Probiere es später erneut.');
							$("#form_working_editnews").fadeOut(1000, function(){
								$("#erroracpnewsedit").fadeIn(1000);
								$("#submitBtnNewsEdit").fadeIn(200);
								$("#submitBtnNewsDelete").fadeIn(200);
								editNewsDeleteCounter = 0;
							});
						}else if(deletedate == "news_del_success"){
							location.reload();
							editNewsDeleteCounter = 0;
						}else{
							$("#erroracpnewsedit").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>  Es liegt ein Fehler vor. Probiere es später erneut.');
							$("#form_working_editnews").fadeOut(1000, function(){
								$("#erroracpnewsedit").fadeIn(1000);
								$("#submitBtnNewsEdit").fadeIn(200);
								$("#submitBtnNewsDelete").fadeIn(200);
								editNewsDeleteCounter = 0;
							});
						}
						
					},
					error: function (xhr, ajaxOptions, thrownError) {
						$("#erroracpnewsedit").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>  Es liegt ein Fehler vor. Probiere es später erneut.');
						$("#form_working_editnews").fadeOut(1000, function(){
							$("#erroracpnewsedit").fadeIn(1000);
							$("#submitBtnNewsEdit").fadeIn(200);
							$("#submitBtnNewsDelete").fadeIn(200);
							editNewsDeleteCounter = 0;
						});
					}
				});
			}
			return false;
		});
	});
	</script>
<nav id="breadcrumbs" class="content_box">
	<ul><li><a id="newsedit_nav_back" class="arrow_right_gray arrow"><span> </span><?php echo GetLang('Zurück','Back');?></a></li></ul>
	<div class="clearfix"></div>
</nav>
<div class="content_box_white">
	<p><u><strong><em>News Edit - <?php echo '( Nummer : '.$news_editrow[$e_N]['NewsID'].' | Erstellt von : '.$news_editrow[$e_N]['Username'].' )'; ?></em></strong></u></p>
	<form name="editNews" id="editNews" method="post" style="padding: 0px 5px;">
		<div id="erroracpnewsedit" style="margin-bottom: 10px;"></div>
		<input type="hidden" name="editnews_ID" value="<?php echo $news_editrow[$e_N]['NewsID']; ?>">							
		<label for="editnews_header" id="editnews_form_german"><b>News Edit #<?php echo $news_editrow[$e_N]['NewsID']; ?> - Überschrift* ( 0 / 60 )</b></label>
		<div class="input_wrapper"><input id="editnews_header" name="editnews_header" title="" value="<?php echo $news_editrow[$e_N]['Header']; ?>" maxlength="60" type="text" style="width:100%;"></div>
		<label for="editnews_header_eng" id="editnews_form_eng"><b>News Edit #<?php echo $news_editrow[$e_N]['NewsID']; ?> - Überschrift* ( English ) ( 0 / 60 )</b></label>
		<div class="input_wrapper"><input id="editnews_header_eng" name="news_header_eng" title="" value="<?php echo $news_editrow[$e_N]['HeaderEng']; ?>" maxlength="60" type="text" style="width:100%;"></div>
		<div class="news_edit_bar">
			<a id="editnews_bar_bold"><i class="fa fa-bold" aria-hidden="true"></i></a>
			<a id="editnews_bar_kursiv"><i class="fa fa-italic" aria-hidden="true"></i></a>
			<a id="editnews_bar_underline"><i class="fa fa-underline" aria-hidden="true"></i></a>
			<a id="editnews_bar_color"><i class="fa fa-stop" aria-hidden="true"></i></a>
		</div>
		<label for="editnews_text" id="editnews_header_text_ger"><b>News #<?php echo $news_editrow[$e_N]['NewsID']; ?> - Text ( Deutsch )* ( 0 / 1500 )</b></label>
		<div class="input_wrapper"><textarea id="editnews_text" name="editnews_text" title="" value="" maxlength="1500" type="textarea" style="width:100%;min-height: 200px;"><?php echo $news_editrow[$e_N]['NText']; ?></textarea></div>
		<div class="news_edit_bar">
			<a id="editnews_bar_bold_eng"><i class="fa fa-bold" aria-hidden="true"></i></a>
			<a id="editnews_bar_kursiv_eng"><i class="fa fa-italic" aria-hidden="true"></i></a>
			<a id="editnews_bar_underline_eng"><i class="fa fa-underline" aria-hidden="true"></i></a>
			<a id="editnews_bar_color_eng"><i class="fa fa-stop" aria-hidden="true"></i></a>
		</div>
		<label for="editnews_texteng" style="margin-bottom: 15px;" id="editnews_header_text_eng"><b>News Edit #<?php echo $news_editrow[$e_N]['NewsID']; ?> - Text ( English )*  ( 0 / 1500 )</b></label>
		<div class="input_wrapper"><textarea id="editnews_textengtext" name="editnews_texteng" title="" value="" maxlength="1500" type="textarea" style="width:100%;min-height: 200px;"><?php echo $news_editrow[$e_N]['NTextEng']; ?></textarea></div>
		<label for="editnews_Image"><b>News Edit #<?php echo $news_editrow[$e_N]['NewsID']; ?> - Bild ( 126 x 126 ) URL*:</b></label>
		<div class="input_wrapper"><input id="editnews_Image" name="editnews_Image" title="" value="<?php echo $news_editrow[$e_N]['Image']; ?>" maxlength="250" type="text" style="width:100%;"></div>
		<div id="form_working_editnews" class="form_working" style="display: none;"><?php echo GetLang('Bitte warten...','Please wait...');?></div>
		<button type="submit" id="submitBtnNewsEdit" style="margin-top: 15px;" class="btn-big">News #<?php echo $news_editrow[$e_N]['NewsID'];?> bearbeiten</button>
		<button type="submit" id="submitBtnNewsDelete" style="margin-top: 15px;" class="btn-big">News #<?php echo $news_editrow[$e_N]['NewsID'];?> löschen</button>
	</form>
	<script>
		$(document).ready(function() {
		   var len = $("#editnews_textengtext").val().length;
			$("#editnews_header_text_eng").html("<b>News Edit #<?php echo $news_editrow[$e_N]['NewsID']; ?> - Text ( English )*  ( " + [len] +" / 1500 )</b>");
		   var len1 = $("#editnews_text").val().length;
			$("#editnews_header_text_ger").html("<b>News #<?php echo $news_editrow[$e_N]['NewsID']; ?> - Text ( Deutsch )* ( " + [len1] +" / 1500 )</b>");
		   var len2 = $("#editnews_header").val().length;
			$("#editnews_form_german").html("<b>News Edit #<?php echo $news_editrow[$e_N]['NewsID']; ?> - Überschrift* ( " + [len2] +" / 60 )</b>");
			var len3 = $("#editnews_header_eng").val().length;
			$("#editnews_form_eng").html("<b>News Edit #<?php echo $news_editrow[$e_N]['NewsID']; ?> - Überschrift*( English ) ( " + [len3] +" / 60 )</b>");
		});
	</script>
</div>
<?php $e_N++;}
			}else{echo GetLang('<p><span class="white">Es konnten keine Nachrichten geladen werden. Probiere es später erneut.</span></p>','<p><span class="white">Could not load news. Try again later.</span></p>');}
		}else{echo GetLang('<p><span class="white">Es konnten keine Nachrichten geladen werden. Probiere es später erneut.</span></p>','<p><span class="white">Could not load news. Try again later.</span></p>');}
}else{echo GetLang('<p><span class="white">Es konnten keine Nachrichten geladen werden. Probiere es später erneut.</span></p>','<p><span class="white">Could not load news. Try again later.</span></p>');} ?>