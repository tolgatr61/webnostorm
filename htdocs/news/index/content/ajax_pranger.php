<?php 
	session_start();
	function GetLang($German,$Englisch){
		if(isset($_SESSION["Sprache"])){
			if($_SESSION['Sprache'] == "Ger"){return $German;}
			else{return $Englisch;}
		}else{return $Englisch;}
	}
	require_once '../config.php';
?>
<script>
	$(document).ready(function() {
		pilloryCounter = 0;
		$("#gobackpillory").hide();
		$('#dynamic_pillory').load('content/pranger_ajax/pillory_ajax.php?page=' + pilloryCounter,function(){});
		document.title = "<?php echo $Name; ?> - <?php echo GetLang("Pranger","Pillory"); ?>";
		$("#go_back_pranger").click(function(){
			$("#nm_slideshow > div:gt(0)").hide();
			$("#wrapper").fadeOut("slow", function(){
				$( "#mainNavPRANGER" ).removeClass("active");
				$( "#mainNavNews" ).addClass("active");
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
		$("#gobackpillory").click(function(){
			if(waitStatus == 1){return false;}
			waitStatus = 1;
			if(pilloryCounter == 0){pilloryCounter == 0;$("#gobackpillory").fadeOut();waitStatus=0;return false;}
			if(pilloryCounter != 0){
				$("#gobackpillory").fadeIn();
				pilloryCounter = pilloryCounter - 1;
				if(pilloryCounter == 0){$("#gobackpillory").fadeOut();}
				$('#dynamic_pillory').load('content/pranger_ajax/pillory_ajax.php?page=' + pilloryCounter,function(){waitStatus = 0;});
			}
			return false;
		});
		$("#goolderpillory").click(function(){
			if(waitStatus == 1){return false;}
			waitStatus = 1;
			if(pilloryCounter == 0){
				$("#gobackpillory").fadeIn();
			}
			pilloryCounter = pilloryCounter + 1;
			$('#dynamic_pillory').load('content/pranger_ajax/pillory_ajax.php?page=' + pilloryCounter,function(){waitStatus=0;});
			return false;
		});
		$("#prangerSubmit").click(function(){
			if(waitStatus == 1){return false;}
			waitStatus = 1;
			var textP = $("#prangerUsername").val();
			$("#pillory_search_content").fadeOut();
			$("#error_pillory").hide();
			$("#error_pillory").html("");
			$("#form_working_pillory").fadeIn(1000);
			$("#prangerSubmit").fadeOut(200);
			if(textP == "" || textP.length < 4){
				waitStatus = 0;
				$("#error_pillory").html("<?php echo GetLang('Dieser Account konnte nicht gefunden werden. Überprüfe die Groß und Kleinschreibung !','Ce compte n&#39a pas été trouvé. Vérifiez la majuscule et les minuscules!'); ?>");
				$("#form_working_pillory").fadeOut("slow",function(){
					$("#error_pillory").fadeIn();
					$("#prangerSubmit").fadeIn("slow"); 
				});	
				return false;
			}else{
				$('#pillory_search_content').load('content/pranger_ajax/search_pillory.php?pilloryuser=' + textP,function(){
					$("#pillory_search_content").fadeIn();
					$("#error_pillory").hide();
					$("#error_pillory").html("");
					$("#form_working_pillory").fadeOut("slow",function(){
						$("#prangerSubmit").fadeIn("slow"); 
					});	
				});
				waitStatus = 0;
			}
			return false;
		});
		$("#p_list").click(function(){
			<?php echo GetLang('$("#pillarrow").css("left", "62px");','$("#pillarrow").css("left", "53px");'); ?>
			$("#pillory_search_white").hide();
			$("#pillory_list_white").show();
			return false;
		});
		$("#p_search").click(function(){
			<?php echo GetLang('$("#pillarrow").css("left", "187px");','$("#pillarrow").css("left", "162px");'); ?>
			$("#pillory_list_white").hide();
			$("#pillory_search_white").show();
			return false;
		});
	});
</script>
<nav id="breadcrumbs" class="content_box">
    <ul>
        <li><a id="go_back_pranger" class="arrow_right_gray arrow"><span> </span><?php echo GetLang('Zurück','Back');?></a></li>
	</ul>
    <div class="clearfix"></div>
</nav>
<div class="content_box_white">
	<h2><?php echo GetLang("$Name - Pranger","$Name - Pillory"); ?></h2>
	<ul class="ucp_tab" id="pillory_tab">
		<li><a href="#pillory_list" id="p_list"><i class="fa fa-list-alt" aria-hidden="true"></i> <?php echo GetLang("Globale Liste","Liste globale"); ?></a></li>
		<li><a href="#pillory_search" id="p_search"><i class="fa fa-search" aria-hidden="true"></i> <?php echo GetLang("Suche einen Account","Rechercher un compte"); ?></a></li>
	</ul>
	<?php echo GetLang('<span class="ucp_box_arrow_up" id="pillarrow" style="left: 62px;top: 104px;"></span>','<span class="ucp_box_arrow_up" id="pillarrow" style="left: 53px;top: 104px;"></span>'); ?>
	<div class="white_box" style="margin-bottom: 10px;padding-bottom:25px;" id="pillory_list_white">
		<div id="dynamic_pillory">
			<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i> <?php echo GetLang("Bitte warten...","Please wait..."); ?>
		</div>
		<p style="margin-top:15px;margin-bottom:15px;" class="pillory_nav">
			<a href="#back" id="gobackpillory"><span style="float:left;" class="pillory_nav_1"><i class="fa fa-backward" aria-hidden="true"></i> <?php echo GetLang("Neuere","Retour en arrière"); ?></span></a>
			<a href="#older" id="goolderpillory"><span style="float:right;" class="pillory_nav_2"><i class="fa fa-forward" aria-hidden="true"></i><?php echo GetLang("Ältere","Page suivante"); ?></span></a>
		</p>
	</div>
	<div class="white_box" style="margin-bottom: 10px;padding-bottom:25px;display:none;" id="pillory_search_white">
		<form id="prangerForm" name="prangerForm" method="GET">
			<label for="prangerUsername"><b><?php echo GetLang("Gebe bitte deinen Account Name ein:","Veuillez insérer votre nom de compte:"); ?></b></label>
			<input name="prangerUsername" value="" id="prangerUsername" maxlength="20" type="text" style="width:100%;">
			<div id="form_working_pillory" class="form_working" style="display: none;"><?php echo GetLang('Bitte warten...','Veuillez patienter ...');?></div>
			<button type="submit" id="prangerSubmit" style="margin-top: 3px;width:100px;"><?php echo GetLang("Suchen","Chercher"); ?></button>
		</form>
		<div class="errorpillory" id="error_pillory" style="display:none;margin-top:10px;"></div>
		<div id="pillory_search_content" style="display:none;margin-top:15px;"></div>
		<p style="margin-top: 20px;"><?php echo GetLang("( <i>Sollte dein Account nicht gefunden werden kann es auch daran liegen das dieser Noch keine Strafen hatte oder diese Dokumentiert wurde.</i> )","( <i>
Si votre compte ne peut pas être trouvé, cela peut aussi être dû au fait que cela n'a pas encore été pénalisé ou a été archivé.</i> )"); ?></p>
	</div>
	<p style="margin-top: 50px;"><strong>Copyright © 2017 <?php echo $Name; ?></strong></p>
</div>