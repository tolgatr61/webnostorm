<?php 
	session_start();
	function GetLang($German,$Englisch){
		if(isset($_SESSION["Sprache"])){
			if($_SESSION['Sprache'] == "Ger"){return $German;}
			else{return $Englisch;}
		}else{return $Englisch;}
	}
	require_once '../config.php';
	if(isset($_SESSION["Sprache"])){
		if($_SESSION['Sprache'] == "Ger"){echo '<script type="text/javascript" src="/../../javascript/ajax_include/nm_ajax_rank.js"></script>';
		}else{echo '<script type="text/javascript" src="/../../javascript/ajax_include/nm_ajax_rankeng.js"></script>';}
	}else{echo '<script type="text/javascript" src="/../../javascript/ajax_include/nm_ajax_rankeng.js"></script>';}
?>
<script type="text/javascript">$('#highscoreTable').load('content/ranking_ajax/ajax_ranking_get.php?rankingtype=Level',function(){});</script>	
<script>
	$("#go_back_ranking").click(function(){
		$("#wrapper").fadeOut("slow", function(){
			$("#nm_slideshow > div:gt(0)").hide();
			$("#allNewsContent").show();
			$("#col_2").show();
			$('#preview_jq_dynamic').hide();
			$('#NM_UCP').hide();
			$("#a_set").hide();
			ucphideshow=0;
			a_hideshow=0;
			$("#wrapper").fadeIn("slow",function(){
				document.title = '<?php echo $Name; ?> - Home';
				$("#UserControlPanel").show();
				IsRankingShow = 0;
				isSupportShow = 0;
				isPrangerShow = 0;
				isNewsShow = 0;
			});
		});
		return false;
	});
	
</script>
<nav id="breadcrumbs" class="content_box">
    <ul>
        <li><a id="go_back_ranking" class="arrow_right_gray arrow"><span> </span><?php echo GetLang('Zurück','Retour');?></a></li>
	</ul>
    <div class="clearfix"></div>
</nav>
<div class="content_box_white" style="margin-bottom: 15px;">
	<h1><?php echo GetLang("$Name Rangliste","$Name Classement");?></h1>
		<div id="highscoreFilter">
			<form id="highscoreform" name="highscoreform" method="GET">
				<div class="white_box">
					<div class="input_wrapper">
						<label for="classchoice"><?php echo GetLang('Klasse anzeigen','Afficher la classe');?>:</label>
						<div class="cmf-skinned-select" style="width: 146px; height: 22px; position: relative;">
							<div class="cmf-skinned-text" id="rank_class_sel" style="height: 25px; opacity: 100; overflow: hidden; position: absolute; text-indent: 0px; z-index: 1; top: 0px; left: 0px;"><?php echo GetLang('Alle','Tous'); ?></div>
							<select id="nm_rank_classchoice" class="select_skin" name="classchoice" style="opacity: 0; position: relative; z-index: 100;">
								<option value="-1" selected=""><?php echo GetLang('Alle','Tous');?></option>
								<option value="0"><?php echo GetLang('Abenteuer','Aventurier');?></option>
								<option value="1"><?php echo GetLang('Schwertkämpfer','Escrimeur');?></option>
								<option value="2"><?php echo GetLang('Bogenschütze','Archer');?></option>
								<option value="3"><?php echo GetLang('Magier','Mage');?></option>
							</select>
						</div>
					</div>
					<div class="input_wrapper">
						<label for="ranking_typ"><?php echo GetLang('Typ auswählen','Choisir un type');?>:</label>
						<div class="cmf-skinned-select" style="width: 146px; height: 22px; position: relative;">
							<div class="cmf-skinned-text" id="ranking_typ_sel" style="height: 25px; opacity: 100; overflow: hidden; position: absolute; text-indent: 0px; z-index: 1; top: 0px; left: 0px;"><?php echo GetLang('Level Ranking','Classement par niveau');?></div>
							<select id="ranking_typ" class="select_skin" name="ranking_typ" style="opacity: 0; position: relative; z-index: 100;">
								<option value="level" selected=""><?php echo GetLang('Level Ranking','Classement par niveau');?></option>
								<option value="fame"><?php echo GetLang('Ruf Ranking','Classement par réputation');?></option>
								<option value="herolvl"><?php echo GetLang('Helden Lvl Ranking','Classement par niveau héroïque');?></option>
							</select>
						</div>
					</div>
				</div>
				<div class="white_box">
					<div>
						<label for="search_name"><?php echo GetLang('Suche Charakter','Personnage');?>:</label>
						<input class="validate[length[3,15]]" id="search_highscore" name="search_highscore" title="" value="" maxlength="15" type="text">
						<div id="form_working_ranking" class="form_working" style="display: none;"><?php echo GetLang('Bitte warten...','Patientez...');?></div>
						<button id="ranking_form_submit"><?php echo GetLang('Suche','Chercher');?></button>
					</div>
				</div>
			</form>
		</div>
		<div id="highscoreTable">
		</div>
		<div class="clear"></div>
		<p style="margin-top: 15px;"><strong>Copyright © 2017 <?php echo $Name; ?></strong></p>
</div>