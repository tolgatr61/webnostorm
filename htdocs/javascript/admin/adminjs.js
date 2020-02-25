$(document).ready(function()
{
	isAdmin = 1;
	waitStatus = 1;
	$("#a_controlpanel").click(function(){
		if(IsRankingShow == 1 || isNewsEditShow == 1 || isSupportShow == 1 || isPrangerShow == 1 || isNewsShow == 1){
			if(is_UCP_show == 1){$('#NM_UCP').hide();ucphideshow=0;a_hideshow=0;}
			if(is_ACP_show == 0){
				$('#preview_jq_dynamic').hide();
				$("#a_set").fadeIn( "slow", function(){});
				a_hideshow=1;
				ucphideshow=0;
				is_ACP_show=1;
				is_UCP_show=0;
			}else if(is_ACP_show == 1){
				$('#a_set').hide();
				$("#preview_jq_dynamic").fadeIn( "slow", function(){});
				a_hideshow=0;
				ucphideshow=0;
				is_ACP_show=0;
				is_UCP_show=0;
			}
			return;
		}else{
			if(ucphideshow == 1){$("#NM_UCP").hide(); ucphideshow=0;a_hideshow=0;}
			if(a_hideshow == 0){
				$("#allNewsContent").hide();
				$("#col_2").hide();
				$("#a_set").fadeIn( "slow", function(){});
				a_hideshow=1;
				ucphideshow=0;
				is_ACP_show=1;
				is_UCP_show=0;
			}else{
				$("#a_set").hide();
				$("#allNewsContent").fadeIn( "slow", function(){});
				$("#col_2").fadeIn( "slow",function() {});
				a_hideshow=0;
				ucphideshow=0;
				is_ACP_show=0;
				is_UCP_show=0;
			}
			return;
		}
	});
	$('#a_set').load('content/ajax_admin.php',function(){
		waitStatus = 0;
	});
});