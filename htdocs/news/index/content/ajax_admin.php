<?php 
	session_start();
	$comment_failed = 1;
	require_once '../config.php';
	require_once 'admincontrolpanel_ajax/CheckUser.php';
	require("admincontrolpanel_ajax/acp_count.php");
	function GetLang($German,$Englisch){
		if(isset($_SESSION["Sprache"])){
			if($_SESSION['Sprache'] == "Ger"){return $German;}
			else{return $Englisch;}
		}else{return $Englisch;}
	}
	if(isset($CheckisAdmin) && $CheckisAdmin >= 2){
?>
<script>
$('document').ready(function(){
	// Admin control panel -> 
	$("#acp_user").click(function(){//UserManagment
		if(a_hideshow == 1){
			$("#acp_News_show").hide();
			$("#acp_support").hide();
			$("#acp_MeldungMan").hide();
			$("#acp_Commentary").hide();
			$("#acp_UserManagment").show();
		}
	});
	$("#acp_news").click(function(){//News Managment
		if(a_hideshow == 1){
			$("#acp_UserManagment").hide();
			$("#acp_support").hide();
			$("#acp_MeldungMan").hide();
			$("#acp_Commentary").hide();
			$("#acp_News_show").show();
		}
	});
	$("#acp_meldung").click(function(){//Meldung
		if(a_hideshow == 1){
			$("#acp_News_show").hide();
			$("#acp_support").hide();
			$("#acp_UserManagment").hide();
			$("#acp_Commentary").hide();
			$("#acp_MeldungMan").show();
		}
	});
	$("#acp_supportclick").click(function(){//Support
		if(a_hideshow == 1){
			$("#acp_News_show").hide();
			$("#acp_MeldungMan").hide();
			$("#acp_UserManagment").hide();
			$("#acp_Commentary").hide();
			$("#acp_support").show();
		}
	});
	$("#acp_comment").click(function(){//Kommetare
		if(a_hideshow == 1){
			$("#acp_News_show").hide();
			$("#acp_MeldungMan").hide();
			$("#acp_UserManagment").hide();
			$("#acp_support").hide();
			$("#acp_Commentary").show();
		}
	});
	// -> Admin Control Panel -> News
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
	// --> News system -> Buttons
	$('#news_bar_bold').click(function(){wrapText('news_text', "<strong>", "</strong>");});
	$('#news_bar_bold_eng').click(function(){wrapText('news_texteng', "<strong>", "</strong>");});
	$('#news_bar_kursiv').click(function(){wrapText('news_text', "<em>", "</em>");});
	$('#news_bar_kursiv_eng').click(function(){wrapText('news_texteng', "<em>", "</em>");});
	$('#news_bar_underline').click(function(){wrapText('news_text', "<u>", "</u>");});
	$('#news_bar_underline_eng').click(function(){wrapText('news_texteng', "<u>", "</u>");});
	//--> News system -> Anzahl buchstaben
	$('#news_text').on('keyup', function(event) {
	   var len = $(this).val().length;
		$("#news_header_text_ger").html("<b>News - Text ( Deutsch )* ( " + [len] +" / 1500 )</b>");
		var limit = parseInt($(this).attr('maxlength'));
		var text = $(this).val();
		var chars = text.length;
		if(chars > limit){
			var new_text = text.substr(0, limit);
			$(this).val(new_text);
		}
	});
	$('#news_texteng').on('keyup', function(event) {
	   var len = $(this).val().length;
		$("#news_header_text_eng").html("<b>News - Text ( English )* ( " + [len] +" / 1500 )</b>");
		var limit = parseInt($(this).attr('maxlength'));
		var text = $(this).val();
		var chars = text.length;
		if(chars > limit){
			var new_text = text.substr(0, limit);
			$(this).val(new_text);
		}
	});
	$('#news_header').on('keyup', function(event) {
	   var len = $(this).val().length;
		$("#news_form_german").html("<b>News - Titre* ( " + [len] +" / 60 )</b>");
		var limit = parseInt($(this).attr('maxlength'));
		var text = $(this).val();
		var chars = text.length;
		if(chars > limit){
			var new_text = text.substr(0, limit);
			$(this).val(new_text);
		}
	});
	$('#news_header_eng').on('keyup', function(event) {
	   var len = $(this).val().length;
		$("#news_form_eng").html("<b>News - Titre* ( English ) ( " + [len] +" / 60 )</b>");
		var limit = parseInt($(this).attr('maxlength'));
		var text = $(this).val();
		var chars = text.length;
		if(chars > limit){
			var new_text = text.substr(0, limit);
			$(this).val(new_text);
		}
	});
	// --> News system -> Color picker
	$('#news_bar_color').ColorPicker({
		color: '#0000ff',
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			wrapText('news_text', "<span style=color:" + HEX_COLOR +">", "</span>");
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#news_bar_color').css('color', '#' + hex);
			HEX_COLOR = "#" + hex;
		}
	});
	$('#news_bar_color_eng').ColorPicker({
		color: '#0000ff',
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			wrapText('news_texteng', "<span style=color:" + HEX_COLOR +">", "</span>");
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#news_bar_color_eng').css('color', '#' + hex);
			HEX_COLOR = "#" + hex;
		}
	});
	// -> Click admin
	$("#submitBtnNews").click(function(){
		var dataacp = $("#createNews").serialize();
		var news_header = document.forms["createNews"]["news_header"].value;
		if (news_header == ""){
			$("#erroracp").hide();
			$("#erroracp").html('');
			$("#form_working_news_create").fadeIn(1000);
			$("#submitBtnNews").fadeOut(200);
			$("#erroracp").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Fülle das Feld `News Überschrift aus ( Deutsch )` aus.');
			$("#form_working_news_create").fadeOut(1000, function(){
				$("#erroracp").fadeIn(1000);
				$("#submitBtnNews").fadeIn(200);
			});
			return false;
		}
		var news_header = document.forms["createNews"]["news_header_eng"].value;
		if (news_header == ""){
			$("#erroracp").hide();
			$("#erroracp").html('');
			$("#form_working_news_create").fadeIn(1000);
			$("#submitBtnNews").fadeOut(200);
			$("#erroracp").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Fülle das Feld `News Überschrift aus ( Englisch )` aus.');
			$("#form_working_news_create").fadeOut(1000, function(){
				$("#erroracp").fadeIn(1000);
				$("#submitBtnNews").fadeIn(200);
			});
			return false;
		}
		var news_header = document.forms["createNews"]["news_text"].value;
		if (news_header == ""){
			$("#erroracp").hide();
			$("#erroracp").html('');
			$("#form_working_news_create").fadeIn(1000);
			$("#submitBtnNews").fadeOut(200);
			$("#erroracp").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Fülle das Feld `News Text aus ( Deutsch )` aus.');
			$("#form_working_news_create").fadeOut(1000, function(){
				$("#erroracp").fadeIn(1000);
				$("#submitBtnNews").fadeIn(200);
			});
			return false;
		}
		var news_header = document.forms["createNews"]["news_texteng"].value;
		if (news_header == ""){
			$("#erroracp").hide();
			$("#erroracp").html('');
			$("#form_working_news_create").fadeIn(1000);
			$("#submitBtnNews").fadeOut(200);
			$("#erroracp").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Fülle das Feld `News Text aus ( Englisch )` aus.');
			$("#form_working_news_create").fadeOut(1000, function(){
				$("#erroracp").fadeIn(1000);
				$("#submitBtnNews").fadeIn(200);
			});
			return false;
		}
		var news_header = document.forms["createNews"]["news_Image"].value;
		if (news_header == ""){
			$("#erroracp").hide();
			$("#erroracp").html('');
			$("#form_working_news_create").fadeIn(1000);
			$("#submitBtnNews").fadeOut(200);
			$("#erroracp").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Fülle das Feld `Bild einfügen` aus.');
			$("#form_working_news_create").fadeOut(1000, function(){
				$("#erroracp").fadeIn(1000);
				$("#submitBtnNews").fadeIn(200);
			});
			return false;
		}
		var img_content = $( "#news_Image").val();
		if(!isUrl(img_content)){
			$("#erroracp").hide();
			$("#erroracp").html('');
			$("#form_working_news_create").fadeIn(1000);
			$("#submitBtnNews").fadeOut(200);
			$("#erroracp").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Das Bild enthält keine gültige Addresse ( zB. <b>http://www.nosmagic.de/bild.png</b> )');
			$("#form_working_news_create").fadeOut(1000, function(){
				$("#erroracp").fadeIn(1000);
				$("#submitBtnNews").fadeIn(200);
			});
		   return false
		}
		$("#erroracp").hide();
		$.ajax({
			type : 'POST',
			url  : '/user/admin/createnews.php',
			data : dataacp,
			beforeSend: function()
			{
				$("#erroracp").hide();
				$("#erroracp").html('');
				$("#form_working_news_create").fadeIn(1000);
				$("#submitBtnNews").fadeOut(200);
			},
			success :  function(dataacp)
			{
				if(dataacp == "fnews_empty"){
					$("#erroracp").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Il y a une erreur. Réessayez plus tard.');
					$("#form_working_news_create").fadeOut(1000, function(){
						$("#erroracp").fadeIn(1000);
						$("#submitBtnNews").fadeIn(200);
					});
				}else if(dataacp == "fnews_hger"){
					$("#erroracp").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Zu wenig zeichen ( Mind. 15 ) => Titre* ( FRANCAIS ).');
					$("#form_working_news_create").fadeOut(1000, function(){
						$("#erroracp").fadeIn(1000);
						$("#submitBtnNews").fadeIn(200);
					});
				}else if(dataacp == "fnews_heng"){
					$("#erroracp").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Zu wenig zeichen ( Mind. 15 ) => Titre* ( FRANCAIS ).');
					$("#form_working_news_create").fadeOut(1000, function(){
						$("#erroracp").fadeIn(1000);
						$("#submitBtnNews").fadeIn(200);
					});
				}else if(dataacp == "fnews_text_ger"){
					$("#erroracp").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Zu wenig zeichen ( Mind. 60 ) => Le texte ( FRANCAIS ).');
					$("#form_working_news_create").fadeOut(1000, function(){
						$("#erroracp").fadeIn(1000);
						$("#submitBtnNews").fadeIn(200);
					});
				}else if(dataacp == "fnews_text_eng"){
					$("#erroracp").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Zu wenig zeichen ( Mind. 60 ) => Le texte ( FRANCAIS ).');
					$("#form_working_news_create").fadeOut(1000, function(){
						$("#erroracp").fadeIn(1000);
						$("#submitBtnNews").fadeIn(200);
					});
				}else if(dataacp == "fnews_url_empty"){
					$("#erroracp").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Zu wenig zeichen ( Mind. 20 ) => Image ( URL ).');
					$("#form_working_news_create").fadeOut(1000, function(){
						$("#erroracp").fadeIn(1000);
						$("#submitBtnNews").fadeIn(200);
					});
				}else if(dataacp == "fnews_error"){
					$("#erroracp").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Il y a une erreur. Réessayez plus tard.');
					$("#form_working_news_create").fadeOut(1000, function(){
						$("#erroracp").fadeIn(1000);
						$("#submitBtnNews").fadeIn(200);
					});
				}else if(dataacp == "news_success"){
					$("#erroracp").hide();
					window.location.reload(1);
				}else{
					$("#erroracp").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Il y a une erreur. Réessayez plus tard.');
					$("#form_working_news_create").fadeOut(1000, function(){
						$("#erroracp").fadeIn(1000);
						$("#submitBtnNews").fadeIn(200);
					});
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
				$("#erroracp").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Il y a une erreur. Réessayez plus tard.');
				$("#form_working_news_create").fadeOut(1000, function(){
					$("#erroracp").fadeIn(1000);
					$("#submitBtnNews").fadeIn(200);
				});
			}
		});
		return false;
	});
	$("#adm_refresh_c").click(function(){
		if(waitStatus == 0){
			waitStatus = 1;
			$('#a_set').fadeOut();
			$('#a_set').load('content/ajax_admin.php',function(){waitStatus=0;$('#a_set').fadeIn();});
		}
	});
	$( "#adm_refresh_c" ).mouseover(function() {$(this).addClass( "fa-spin" );});
	$( "#adm_refresh_c" ).mouseleave(function() {$(this).removeClass( "fa-spin" );});
	<?php $i_JV = 0;
	while(!empty($comment[$i_JV]['CommenId'])){?>
		$("#goto_comment<?php echo $comment[$i_JV]['CommenId']; ?>").click(function(){
			$("html, body").animate({ scrollTop: 0 }, 1500);
			ucphideshow=0;
			a_hideshow=0;
			is_ACP_show = 0;
			$("#wrapper").fadeOut("slow", function(){
				$('#NM_UCP').hide();
				$("#a_set").hide();
				$('#preview_jq_dynamic').load('content/news_ajax/ajax_newsdyn.php?newsid=<?php echo $comment[$i_JV]['CommNewsID']; ?>',function(){
					if(isAdmin == 1){$("#UserControlPanel").hide();}
					$("#allNewsContent").hide();
					$("#col_2").hide();
					$('#preview_jq_dynamic').show();
					$("#wrapper").fadeIn("slow",function(){
						isPrangerShow = 0;
						isSupportShow = 0;
						IsRankingShow = 0;
						isNewsShow = 1;
						isNewsEditShow = 0;
					});
				});
			});
		});
	<?php $i_JV++;} ?>
});
</script>
<div class="content_box_white">
	<h2><?php echo $Name;?> - Administration <a href="#refreshACP" class="adm_refresh" id="adm_refresh_c"><i class="fa fa-refresh fa-2x fa-fw"></i></a></h2>
	<ul class="ucp_tab" id="acp_tab">
		<li><a href="#acp_meldungcontent" id="acp_meldung"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <span class="adm_meldung"><?php echo $notification_Count; ?></span> Meldungen</a></li>
		<li><a href="#acp_commentcontent" id="acp_comment"><i class="fa fa-comments-o" aria-hidden="true"></i> <span class="adm_meldungcomment"><?php echo $comment_count; ?></span> Kommentare</a></li>
		<li><a href="#acp_supportcontent" id="acp_supportclick"><i class="fa fa-medkit" aria-hidden="true"></i> <span class="adm_meldungsup"><?php echo $support_Count; ?></span> Support</a></li>
		<?php if(isset($CheckisAdmin) && $CheckisAdmin >= 4){ ?> <li><a href="#acp_newscontent" id="acp_news"><i class="fa fa-plus" aria-hidden="true"></i> Article</a></li> <?php } ?>
	</ul>
	<div class="white_box" id="acp_MeldungMan">
		<p><span class="adm_meldungsup"><?php echo $support_Count; ?></span> Ticket(s) die bearbeitet werden müssen.</p>
		<p><span class="adm_meldungcomment"><?php echo $comment_count; ?></span> Kommentare die freigeschalten/aktiviert werden müssen.</p>
	</div>
	<div class="white_box" id="acp_UserManagment" style="display:none;">
		<p>Dieser Content folgt in der nächsten Version</p> 
	</div>
	<div class="white_box" id="acp_Commentary" style="display:none;">
	<?php if(isset($comment_failed) && $comment_failed == 0){ ?>
		<table style="width: 100%;">
			<th>#</th>
			<th>#NewsID</th>
			<th>Nummer</th>
			<th>Text</th>
			<th>Benutzer</th>
			<th>Gehe zu</th>
			<?php $i_C = 0;
			while(!empty($comment[$i_C]['CommenId'])){?>
			<tr>
				<td><?php echo $i_C + 1; ?></td>
				<td><?php echo $comment[$i_C]['CommenId']; ?></td>
				<td><?php echo $comment[$i_C]['CommNewsID']; ?></td>
				<td style="word-wrap: break-word;max-width:300px;"><?php echo $comment[$i_C]['CommText']; ?></td>
				<td><?php echo $comment[$i_C]['CommName']; ?></td>
				<td><a href="#gotocomment<?php echo $comment[$i_C]['CommenId']; ?>" id="goto_comment<?php echo $comment[$i_C]['CommenId']; ?>"><span style="color:#E90000;"><u>Gehe zu</u></span></a></td>
			</tr>
			<?php $i_C ++; } ?>
		</table>
	<?php }else{echo '<p>Es konnten keine Kommentare gefunden werden.</p>';} ?>
	</div>
	<div class="white_box" id="acp_support" style="display:none;">
	</div>
	<?php if(isset($CheckisAdmin) && $CheckisAdmin>= 4){?>
	<div class="white_box" id="acp_News_show" style="display:none;">
		<div id="erroracp"></div>
		<form name="createNews" id="createNews" method="post" style="padding: 0px 5px;">
			<input type="hidden" name="news_name" value="<?php echo $_SESSION['User']; ?>">							
			<label for="news_header" id="news_form_german"><b>News - Titre* ( FRANCAIS ) ( 0 / 60 )</b></label>
			<div class="input_wrapper"><input id="news_header" name="news_header" title="" value="" maxlength="60" type="text" style="width:100%;"></div>
			<label for="news_header_eng" id="news_form_eng"><b>News - Titre* ( FRANCAIS ) ( 0 / 60 )</b></label>
			<div class="input_wrapper"><input id="news_header_eng" name="news_header_eng" title="" value="" maxlength="60" type="text" style="width:100%;"></div>
			<div class="news_edit_bar">
				<a id="news_bar_bold"><i class="fa fa-bold" aria-hidden="true"></i></a>
				<a id="news_bar_kursiv"><i class="fa fa-italic" aria-hidden="true"></i></a>
				<a id="news_bar_underline"><i class="fa fa-underline" aria-hidden="true"></i></a>
				<a id="news_bar_color"><i class="fa fa-stop" aria-hidden="true"></i></a>
			</div>
			<label for="news_text" id="news_header_text_ger"><b>News - Text ( FRANCAIS )* ( 0 / 1500 )</b></label>
			<div class="input_wrapper"><textarea id="news_text" name="news_text" title="" value="" maxlength="1500" type="textarea" style="width:100%;min-height: 200px;"></textarea></div>
			<div class="news_edit_bar">
				<a id="news_bar_bold_eng"><i class="fa fa-bold" aria-hidden="true"></i></a>
				<a id="news_bar_kursiv_eng"><i class="fa fa-italic" aria-hidden="true"></i></a>
				<a id="news_bar_underline_eng"><i class="fa fa-underline" aria-hidden="true"></i></a>
				<a id="news_bar_color_eng"><i class="fa fa-stop" aria-hidden="true"></i></a>
			</div>
			<label for="news_texteng" style="margin-bottom: 15px;" id="news_header_text_eng"><b>News - Text ( FRANCAIS )*  ( 0 / 1500 )</b></label>
			<div class="input_wrapper"><textarea id="news_texteng" name="news_texteng" title="" value="" maxlength="1500" type="textarea" style="width:100%;min-height: 200px;"></textarea></div>
			<label for="news_Image"><b>News - Bild ( 126 x 126 ) URL*:</b></label>
			<div class="input_wrapper"><input id="news_Image" name="news_Image" title="" value="" maxlength="250" type="text" style="width:100%;"></div>
			<div id="form_working_news_create" class="form_working" style="display: none;"><?php echo GetLang('Bitte warten...','Please wait...');?></div>
			<button type="submit" id="submitBtnNews" style="margin-top: 15px;" class="btn-big">Nouvelle Article</button>
		</form>
		<br><p>* Legende: Bild : URL Einfügen ( zb. http://www.nosmagic.de/bild/beispiel.png )</p>
		<p>* Legende: Bild : Farben : &lt;span style="color: #FARBCODE;"&gt; Text &lt;/span&gt; ( Farb codes in HEX Format )</p>
	</div>
	<?php } // Ende Admin stufe 4 ?>
</div>
<?php } ?>