<?php 
	session_start();
	require_once '../config.php';
	require_once '../../../user/admin/CheckNewsIfAdmin.php';
	function GetLang($German,$Englisch){
		if(isset($_SESSION["Sprache"])){
			if($_SESSION['Sprache'] == "Ger"){return $German;}
			else{return $Englisch;}
		}else{return $Englisch;}
	}
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
//---------------------------------------------------------
$current_page = 0;
$news_failed = 1;
$news_last_item = 0;
$monate = array("01"=>"Jan.","02"=>"Feb.","03"=>"Mär.","04"=>"Apr.","05"=>"Mai","06"=>"Juni","07"=>"Juli","08"=>"Aug.","09"=>"Sep.",10=>"Okt.",11=>"Nov.",12=>"Dez.");
//---------------------------------------------------------
if(isset($_GET['page'])){
	$converted_page = $_GET['page'];
	if(is_numeric($converted_page)){
		if($converted_page > 10000){$current_page=0;}
		else{$current_page = (int)$converted_page;}
	}else{$current_page = 0;}
}else{$current_page=0;}
$stmt = $conn->prepare("DECLARE @CurrentSetNumber int = :site;
DECLARE @NumRowsInSet int = 5;
SELECT * FROM $db_News ORDER BY NewsID DESC
OFFSET @NumRowsInSet * @CurrentSetNumber ROWS
FETCH NEXT @NumRowsInSet ROWS ONLY;
SET @CurrentSetNumber = @CurrentSetNumber + 1;");
$stmt->bindParam(':site', $current_page);
if($stmt->execute()){
	$pagi_news = 0;
	while( $row_news = $stmt->fetch()){
		$news_row[] = $row_news;
		$news_failed = 0;
		$pagi_news++;
	}
	$news_failed = 0;
	if($pagi_news != 5){$news_last_item = 1;}
	if($pagi_news == 0){$news_failed = 1;}
}else{$news_failed = 1;}
//---------------------------------------------------------
if($news_failed == 1){
		echo GetLang('<p><span class="white">Es konnten keine Nachrichten geladen werden. Probiere es später erneut.</span></p>','<p><span class="white">Could not load news. Try again later.</span></p>');
		?>
		<script>$("#nosmagic_news_older").hide();</script>
		<?php
	}else{
		if($news_last_item == 1){?>
		<script>$("#nosmagic_news_older").hide();</script>
	<?php }else{ ?>
		<script>$("#nosmagic_news_older").fadeIn("slow");</script>
	<?php } 
	$n_i = 0;
	while(!empty($news_row[$n_i]['NewsID'])){
		$commentaryList = 0;
		$stmt = $conn->prepare("SELECT COUNT(CommenId) AS AnzahlCommentary FROM $db_Comm WHERE CommNewsID = :newsID AND CommEnable = 1");
		$stmt->bindParam(':newsID', $news_row[$n_i]['NewsID']);
		if($stmt->execute()){
			$row0 = $stmt->fetch();
			$commentaryList = $row0['AnzahlCommentary'];
		}else{$commentaryList = -1;}
		?>
	<script>
		$("#nm_readmore<?php echo $news_row[$n_i]['NewsID']; ?>").click(function(){
			if(isNewsShow==1){return false;}
			$("html, body").animate({ scrollTop: 0 }, 1500);
			$('#NM_UCP').hide();
			$("#a_set").hide();
			ucphideshow=0;
			a_hideshow=0;
			$("#wrapper").fadeOut("slow", function(){
				$('#preview_jq_dynamic').load('content/news_ajax/ajax_newsdyn.php?newsid=<?php echo $news_row[$n_i]['NewsID']; ?>',function(){
					if(isAdmin == 1){$("#UserControlPanel").hide();}
					$("#allNewsContent").hide();
					$("#col_2").hide();
					$('#preview_jq_dynamic').show();
					$("#wrapper").fadeIn("slow",function(){
						document.title = "<?php echo $Name; ?> - News";
						isPrangerShow = 0;
						isSupportShow = 0;
						IsRankingShow = 0;
						isNewsShow = 1;
					});
				});
			});
			return false;
		});
		$("#nm_header<?php echo $news_row[$n_i]['NewsID']; ?>").click(function(){
			if(isNewsShow==1){return false;}
			$("html, body").animate({ scrollTop: 0 }, 1500);
			$('#NM_UCP').hide();
			$("#a_set").hide();
			ucphideshow=0;
			a_hideshow=0;
			$("#wrapper").fadeOut("slow", function(){
				$('#preview_jq_dynamic').load('content/news_ajax/ajax_newsdyn.php?newsid=<?php echo $news_row[$n_i]['NewsID']; ?>',function(){
					if(isAdmin == 1){$("#UserControlPanel").hide();}
					$("#allNewsContent").hide();
					$("#col_2").hide();
					$('#preview_jq_dynamic').show();
					$("#wrapper").fadeIn("slow",function(){
						document.title = "<?php echo $Name; ?> - News";
						isPrangerShow = 0;
						isSupportShow = 0;
						IsRankingShow = 0;
						isNewsShow = 1;
					});
				});
			});
			return false;
		});
		$("#nm_readmorecom<?php echo $news_row[$n_i]['NewsID']; ?>").click(function(){
			if(isNewsShow==1){return false;}
			$("html, body").animate({ scrollTop: 0 }, 1500);
			$('#NM_UCP').hide();
			$("#a_set").hide();
			ucphideshow=0;
			a_hideshow=0;
			$("#wrapper").fadeOut("slow", function(){
				$('#preview_jq_dynamic').load('content/news_ajax/ajax_newsdyn.php?newsid=<?php echo $news_row[$n_i]['NewsID']; ?>',function(){
					if(isAdmin == 1){$("#UserControlPanel").hide();}
					$("#allNewsContent").hide();
					$("#col_2").hide();
					$('#preview_jq_dynamic').show();
					$("#wrapper").fadeIn("slow",function(){
						document.title = "<?php echo $Name; ?> - News";
						isPrangerShow = 0;
						isSupportShow = 0;
						IsRankingShow = 0;
						isNewsShow = 1;
					});
				});
			});
			return false;
		});
		if(isAdmin == 1 || isNewsEditShow == 0 || loggedin == 1){
			$("#nm_edit<?php echo $news_row[$n_i]['NewsID']; ?>").click(function(){
				if(isNewsShow==1){return false;}
				$("html, body").animate({ scrollTop: 0 }, 1500);
				$('#NM_UCP').hide();
				$("#a_set").hide();
				ucphideshow=0;
				a_hideshow=0;
				$("#wrapper").fadeOut("slow", function(){
					$('#preview_jq_dynamic').load('content/news_ajax/editnews.php?newsid=<?php echo $news_row[$n_i]['NewsID']; ?>',function(){
						if(isAdmin == 1){$("#UserControlPanel").hide();}
						$("#allNewsContent").hide();
						$("#col_2").hide();
						$('#preview_jq_dynamic').show();
						$("#wrapper").fadeIn("slow",function(){
							isPrangerShow = 0;
							isSupportShow = 0;
							IsRankingShow = 0;
							isNewsShow = 0;
							isNewsEditShow = 1;
						});
					});
				});
				return false;
			});
		}
	</script>
	<article class="news" id="<?php echo $news_row[$n_i]['NewsID']; ?>">
		<header class="article_header">
			<div class="date_news">
				<span><?php $monats = date("m", strtotime($news_row[$n_i]['date'])); echo $monate[$monats];?></span>
				<span><?php echo date("d", strtotime($news_row[$n_i]['date'])); ?></span>
			</div>
			<h1><a href="#loadnews<?php echo $news_row[$n_i]['NewsID']; ?>" class="news_header" id="nm_header<?php echo $news_row[$n_i]['NewsID']; ?>"><?php echo GetLang(strip_tags($news_row[$n_i]['Header']),strip_tags($news_row[$n_i]['HeaderEng'])); ?></a></h1>
			<span class="info_text"><?php echo GetLang(' Von ',' Par ').$news_row[$n_i]['Username'].GetLang(' - Datum ',' - Date ') ?> ( <?php echo $news_row[$n_i]['date']; ?> )</span>
		</header>
		<div class="article_content">
			<div class="article_text" style="max-width:700px;word-wrap: break-word;">
				<div class="newsSmallPicture"><img width="126" height="126" src="<?php echo $news_row[$n_i]['Image']; ?>" alt="" /></div>
				<span id="nm_after_news"><?php echo GetLang(closetags(strip_tags($news_row[$n_i]['NText'])),closetags(strip_tags($news_row[$n_i]['NTextEng']))); ?></span>
			</div>
		</div>
		<div class="clear"></div>
		<footer class="article_footer">
		<?php if(isset($CheckisAdmin) && $CheckisAdmin>= 4){?>
			<a style="color: #fff;float: left;padding-left: 15px;" href="#editnews<?php echo $news_row[$n_i]['NewsID']; ?>" class="comments" id="nm_edit<?php echo $news_row[$n_i]['NewsID']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Bearbeiten</a>
		<?php }
		if($commentaryList != -1){?>
			<a style="color: #fff;" href="#loadnews<?php echo $news_row[$n_i]['NewsID']; ?>" class="comments" id="nm_readmorecom<?php echo $news_row[$n_i]['NewsID']; ?>"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php echo $commentaryList; ?></a>
		<?php } ?>	
			<a style="color: #fff;" href="#loadnews<?php echo $news_row[$n_i]['NewsID']; ?>" class="comments" id="nm_readmore<?php echo $news_row[$n_i]['NewsID']; ?>"><i class="fa fa-book" aria-hidden="true"></i> <?php echo GetLang("Lese mehr","Lire la suite"); ?></a>
		</footer>
	</article>
	<?php $n_i++;}
} ?>