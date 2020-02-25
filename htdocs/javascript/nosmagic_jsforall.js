
$(document).ready(function()
{
	// News system:
	$('#LoadDynamicNews').load('content/ajax_news.php',function(){
		newsFailed = 0;
		isNewsShow = 0;
	});
	if(NewsCounter==0){$("#nosmagic_news_newer").hide();}
	$("#nosmagic_news_older").click(function(){
		if(newsFailed == 0 && isNewsShow == 0 && isNewsEditShow == 0){
			if(IsRankingShow == 1 || isSupportShow == 1 || isPrangerShow == 1 || isNewsShow == 1){return false;}
			NewsCounter = NewsCounter + 1;
			if(NewsCounter >= 1){$("#nosmagic_news_newer").fadeIn();}
			$('#LoadDynamicNews').fadeTo("slow",0,function(){
				$('#LoadDynamicNews').slideUp("slow").load('content/ajax_news.php?page=' + NewsCounter,function(){
					$(this).slideDown("slow");
					$('#LoadDynamicNews').fadeTo("slow",1);
				});
			});
		}
	});
	$("#nosmagic_news_newer").click(function(){
		if(newsFailed == 0 && isNewsShow == 0 && isNewsEditShow == 0){
			if(IsRankingShow == 1 || isSupportShow == 1 || isPrangerShow == 1 || isNewsShow == 1){return false;}
			if(NewsCounter != 0){NewsCounter = NewsCounter - 1;}
			if(NewsCounter == 0){$("#nosmagic_news_newer").fadeOut();}
			$('#LoadDynamicNews').fadeTo("slow",0,function(){
				$('#LoadDynamicNews').slideUp("slow").load('content/ajax_news.php?page=' + NewsCounter,function(){
					$(this).slideDown("slow");
					$('#LoadDynamicNews').fadeTo("slow",1);
				});
			});
		}
	});
	$("#rank_level").click(function(){	
		if(rankinghideshow == 0){
			rankinghideshow = 1;
			$("#rank_table_reput").hide();
			$("#rank_table_hlevel").hide();
			$("#rank_table_level").fadeIn(500, function(){rankinghideshow=0;});
		}
	});
	$("#rank_rep").click(function(){
		if(rankinghideshow == 0){
			rankinghideshow=1;
			$("#rank_table_level").hide();
			$("#rank_table_hlevel").hide();
			$("#rank_table_reput").fadeIn(500, function(){rankinghideshow=0;});
		}
	});
	$("#rank_hlevel").click(function(){
		if(rankinghideshow == 0){
			rankinghideshow=1;
			$("#rank_table_reput").hide();
			$("#rank_table_level").hide();
			$("#rank_table_hlevel").fadeIn(500, function(){rankinghideshow=0;});
		}
	});
	$("#nm_ranking").click(function(){
		if(IsRankingShow==1){return false;}
		if(news_e_Showing==1){return false;}
		$("html, body").animate({ scrollTop: 0 }, 600);
		$('#NM_UCP').hide();
		$("#a_set").hide();
		ucphideshow=0;
		a_hideshow=0;
		$("#wrapper").fadeOut("slow", function(){
			$('#preview_jq_dynamic').load('content/ajax_ranking.php',function(){
				if(isAdmin == 1){$("#UserControlPanel").hide();}
				$("#allNewsContent").hide();
				$("#col_2").hide();
				$('#preview_jq_dynamic').show();
				$("#wrapper").fadeIn("slow",function(){
					document.title = '<?php echo $Name; ?> - Ranking';
					isPrangerShow = 0;
					isSupportShow = 0;
					isNewsShow = 0;
					IsRankingShow = 1;
					isNewsEditShow = 0;
				});
			});
		});
		return false;
	});
	$("#nm_support").click(function(){
		if(loggedin == 1){
			if(isSupportShow==1){return false;}
			if(news_e_Showing==1){return false;}
			$("html, body").animate({ scrollTop: 0 }, 600);
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
		return false;
	});
	$("#click_support").click(function(){
		if(loggedin == 1){
			if(isSupportShow==1){return false;}
			if(news_e_Showing==1){return false;}
			$("html, body").animate({ scrollTop: 0 }, 600);
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
		return false;
	});
	$("#footer_support").click(function(){
		if(loggedin == 1){
			if(isSupportShow==1){return false;}
			if(news_e_Showing==1){return false;}
			$("html, body").animate({ scrollTop: 0 }, 600);
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
		return false;
	});
	$("#click_pranger").click(function(){
		if(isPrangerShow==1){return false;}
		if(news_e_Showing==1){return false;}
		$("html, body").animate({ scrollTop: 0 }, 600);
		$("#wrapper").fadeOut("slow", function(){
			$( "#mainNavNews" ).removeClass("active");
			$( "#mainNavSUPPORT" ).removeClass("active");
			$( "#mainNavPRANGER" ).addClass("active");
			$('#NM_UCP').hide();
			$("#a_set").hide();
			ucphideshow=0;
			a_hideshow=0;
			$('#preview_jq_dynamic').load('content/ajax_pranger.php',function(){
				if(isAdmin == 1){$("#UserControlPanel").hide();}
				$("#allNewsContent").hide();
				$("#col_2").hide();
				$('#preview_jq_dynamic').show();
				$("#wrapper").fadeIn("slow",function(){
					isPrangerShow = 1;
					isSupportShow = 0;
					isNewsShow = 0;
					IsRankingShow = 0;
					isNewsEditShow = 0;
				});
			});
		});
		return false;
	});
	$("#footer_pranger").click(function(){
		if(isPrangerShow==1){return false;}
		if(news_e_Showing==1){return false;}
		$("html, body").animate({ scrollTop: 0 }, 600);
		$("#wrapper").fadeOut("slow", function(){
			$( "#mainNavNews" ).removeClass("active");
			$( "#mainNavSUPPORT" ).removeClass("active");
			$( "#mainNavPRANGER" ).addClass("active");
			$('#NM_UCP').hide();
			$("#a_set").hide();
			ucphideshow=0;
			a_hideshow=0;
			$('#preview_jq_dynamic').load('content/ajax_pranger.php',function(){
				if(isAdmin == 1){$("#UserControlPanel").hide();}
				$("#allNewsContent").hide();
				$("#col_2").hide();
				$('#preview_jq_dynamic').show();
				$("#wrapper").fadeIn("slow",function(){
					isPrangerShow = 1;
					isSupportShow = 0;
					isNewsShow = 0;
					IsRankingShow = 0;
					isNewsEditShow = 0;
				});
			});
		});
		return false;
	});
	$("#NewsJS").click(function(){
		if(IsRankingShow == 1 || isSupportShow == 1 || isPrangerShow == 1 || isNewsShow == 1 || isNewsEditShow == 1){
			$("html, body").animate({ scrollTop: 0 }, 600);
			$("#wrapper").fadeOut("slow", function(){
				$( "#mainNavNews" ).addClass("active");
				$( "#mainNavSUPPORT" ).removeClass("active");
				$( "#mainNavPRANGER" ).removeClass("active");
				$("#allNewsContent").show();
				$("#col_2").show();
				$('#preview_jq_dynamic').hide();
				$('#NM_UCP').hide();
				$("#a_set").hide();
				ucphideshow=0;
				a_hideshow=0;
				$("#UserControlPanel").show();
				$("#nm_slideshow > div:gt(0)").hide();
				$("#wrapper").fadeIn("slow",function(){
					document.title = "<?php echo $Name; ?> - Home";
					isPrangerShow = 0;
					isSupportShow = 0;
					isNewsShow = 0;
					IsRankingShow = 0;
					isNewsEditShow = 0;
				});
			});
			ucphideshow=0;
			a_hideshow=0;
			return;
		}
		else if(ucphideshow == 1 || a_hideshow == 1){
			$("#a_set").hide();
			$("#NM_UCP").hide();
			$("#allNewsContent").fadeIn( "slow", function(){});
			$("#col_2").fadeIn( "slow",function() {});
			$("#nm_slideshow > div:gt(0)").hide();
			ucphideshow=0;
		}
	});
});