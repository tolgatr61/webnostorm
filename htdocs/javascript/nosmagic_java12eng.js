$(document).ready(function()
{
	$("#ucp_arrow").css("left", "41px");
	//--------------------------------------------
	$("#UserControlPanel").click(function(){
		if(IsRankingShow == 1 || isSupportShow == 1 || isPrangerShow == 1 || isNewsShow == 1 || isNewsEditShow == 1){
			if(is_UCP_show == 0){
				$('#preview_jq_dynamic').hide();
				$("#NM_UCP").fadeIn( "slow", function(){});
				is_UCP_show = 1;
				ucphideshow=1;
			}else{
				$("#nm_slideshow > div:gt(0)").hide();
				$('#NM_UCP').hide();
				$("#preview_jq_dynamic").fadeIn( "slow", function(){});
				is_UCP_show = 0;
				ucphideshow=0;
			}
			return false;
		}
		if(a_hideshow == 1){$("#a_set").hide();ucphideshow=0;a_hideshow=0;}
		if(ucphideshow == 0){
			$("#allNewsContent").hide();
			$("#col_2").hide();
			$("#NM_UCP").fadeIn( "slow", function(){});
			a_hideshow=0;
			ucphideshow=1;
		}else{
			$("#nm_slideshow > div:gt(0)").hide();
			$("#NM_UCP").hide();
			$("#allNewsContent").fadeIn( "slow", function(){});
			$("#col_2").fadeIn( "slow",function() {});
			a_hideshow=0;
			ucphideshow=0;
		}
	});
	$("#a_account").click(function(){//Account
		if(ucphideshow == 1){
			$("#userAdministration_div").show();
			$("#userCharacter_div").hide();
			$("#ucp_arrow").css("left", "41px");
		}
	});
	$("#a_char").click(function(){//character
		if(ucphideshow == 1){
			$("#userAdministration_div").hide();
			$("#userCharacter_div").show();
			$("#ucp_arrow").css("left", "113px");
		}
	});
	$("#UCP_CHANGE_IMAGE").click(function(){
		var ucp_change_image_var = document.forms["profile_img"]["imgucp"].value;
		if(ucp_change_image_var==""){
			$("#ucp_fail_div").hide();
			$("#ucp_fail_div").html('');
			$("#form_working_ucp_img").fadeIn(1000);
			$("#UCP_CHANGE_IMAGE").fadeOut(200);
			$("#form_working_ucp_img").fadeOut(1000, function(){
				$("#UCP_CHANGE_IMAGE").fadeIn(800);
				$("#ucp_fail_div").html('<strong>Error:</strong> Check if you select a image.');
				$("#ucp_fail_div").fadeIn(1000, function(){});
			});
			return false;
		}
		var dataucp = $("#profile_img").serialize();
		$.ajax({
			type : 'POST',
			url  : '/user/ucp_change_image.php',
			data : dataucp,
			beforeSend: function()
			{
				$("#ucp_fail_div").hide();
				$("#ucp_fail_div").html('');
				$("#form_working_ucp_img").fadeIn(1000);
				$("#UCP_CHANGE_IMAGE").fadeOut(200);
			},
			success :  function(dataucp)
			{
				if(dataucp == "ucp_fail"){
					$("#form_working_ucp_img").fadeOut(1000, function(){
						$("#UCP_CHANGE_IMAGE").fadeIn(800);
						$("#ucp_fail_div").html('<strong>Error: ( Server side ) Try it again later!</strong>');
						$("#ucp_fail_div").fadeIn(1000, function(){});
					});
				}
				else if(dataucp == "ucp_success"){
					window.location.reload(1);
				}
				else if(dataucp == "ucp_fail_no"){
					$("#form_working_ucp_img").fadeOut(1000, function(){
						$("#UCP_CHANGE_IMAGE").fadeIn(800);
						$("#ucp_fail_div").html('<strong>Error:</strong> Check if you select a image!');
						$("#ucp_fail_div").fadeIn(1000, function(){});
					});
				}else{
					$("#form_working_ucp_img").fadeOut(1000, function(){
						$("#UCP_CHANGE_IMAGE").fadeIn(800);
						$("#ucp_fail_div").html('<strong>Error: ( Server side ) Try it again later!</strong>');
						$("#ucp_fail_div").fadeIn(1000, function(){});
					});
				}
			}
		});
		return false;
	});
	$("#submitBtnEmail").click(function(){
		var ucp_email_old_email = document.forms["changeemailForm"]["email_old"].value;
		var ucp_email_new_email = document.forms["changeemailForm"]["email_new"].value;
		var ucp_email_pass = document.forms["changeemailForm"]["passwort"].value;
		if(ucp_email_old_email == "" || ucp_email_new_email == "" || ucp_email_pass == ""){
			$("#ucp_email_fail_div").hide();
			$("#ucp_email_fail_div").html('');
			$("#form_working_ucp_email").fadeIn(1000);
			$("#submitBtnEmail").fadeOut(200);
			$("#form_working_ucp_email").fadeOut(1000, function(){
				$("#submitBtnEmail").fadeIn(800);
				$("#ucp_email_fail_div").html('<strong>Error:</strong> all fields is required.');
				$("#ucp_email_fail_div").fadeIn(1000, function(){});
			});
			return false;
		}
		var dataucpemail = $("#changeemailForm").serialize();
		$.ajax({
			type : 'POST',
			url  : '/user/changeemail.php',
			data : dataucpemail,
			beforeSend: function()
			{
				$("#ucp_email_fail_div").hide();
				$("#ucp_email_fail_div").html('');
				$("#form_working_ucp_email").fadeIn(1000);
				$("#submitBtnEmail").fadeOut(200);
			},
			success :  function(dataucpemail)
			{
				if(dataucpemail == "failsameemail"){
					$("#form_working_ucp_email").fadeOut(1000, function(){
						$("#submitBtnEmail").fadeIn(800);
						$("#ucp_email_fail_div").html('<strong>Error:</strong> Use differently E-Mail address.');
						$("#ucp_email_fail_div").fadeIn(1000, function(){});
					});
				}
				else if(dataucpemail == "failsameemailnoemail"){
					$("#form_working_ucp_email").fadeOut(1000, function(){
						$("#submitBtnEmail").fadeIn(800);
						$("#ucp_email_fail_div").html('<strong>Error:</strong> Please use a valid e-mail address.');
						$("#ucp_email_fail_div").fadeIn(1000, function(){});
					});
				}
				else if(dataucpemail == "failfelder"){
					$("#form_working_ucp_email").fadeOut(1000, function(){
						$("#submitBtnEmail").fadeIn(800);
						$("#ucp_email_fail_div").html('<strong>Error:</strong> all fields is required.');
						$("#ucp_email_fail_div").fadeIn(1000, function(){});
					});
				}
				else if(dataucpemail == "failquery"){
					$("#form_working_ucp_email").fadeOut(1000, function(){
						$("#submitBtnEmail").fadeIn(800);
						$("#ucp_email_fail_div").html('<strong>Error:</strong> There is a error. Try it again later.');
						$("#ucp_email_fail_div").fadeIn(1000, function(){});
					});
				}
				else if(dataucpemail == "failemailpass"){
					$("#form_working_ucp_email").fadeOut(1000, function(){
						$("#submitBtnEmail").fadeIn(800);
						$("#ucp_email_fail_div").html('<strong>Error:</strong> Log in failed! Use the right password and E-Mail address.');
						$("#ucp_email_fail_div").fadeIn(1000, function(){});
					});
				}
				else if(dataucpemail == "emailerfolgreich"){
					$("#ucp_email_fail_div").hide();
					window.location.reload(1);
				}
				else{	
					$("#form_working_ucp_email").fadeOut(1000, function(){
						$("#submitBtnEmail").fadeIn(800);
						$("#ucp_email_fail_div").html('<strong>Error:</strong> There is a error. Try it again later.');
						$("#ucp_email_fail_div").fadeIn(1000, function(){});
					});
				}
			}
		});
		return false;
	});
	$("#submitBtnPasswort").click(function(){
		var ucp_pass_old_pass = document.forms["changepwForm"]["oldPassword"].value;
		var ucp_pass_email = document.forms["changepwForm"]["tremail"].value;
		var ucp_pass_new_pass = document.forms["changepwForm"]["newPassword"].value;
		var ucp_pass_new_repass = document.forms["changepwForm"]["confirmPassword"].value;
		if(ucp_pass_old_pass == "" || ucp_pass_email == "" || ucp_pass_new_pass == "" || ucp_pass_new_repass == ""){
			$("#ucp_fail_pass").hide();
			$("#ucp_fail_pass").html('');
			$("#form_working_ucp_pass").fadeIn(1000);
			$("#submitBtnPasswort").fadeOut(200);
			$("#form_working_ucp_pass").fadeOut(1000, function(){
				$("#submitBtnPasswort").fadeIn(800);
				$("#ucp_fail_pass").html('<strong>Error:</strong> all fields is required.');
				$("#ucp_fail_pass").fadeIn(1000, function(){});
			});
			return false;
		}
		var dataucpepass = $("#changepwForm").serialize();
		$.ajax({
			type : 'POST',
			url  : '/user/changepass.php',
			data : dataucpepass,
			beforeSend: function()
			{
				$("#ucp_fail_pass").hide();
				$("#ucp_fail_pass").html('');
				$("#form_working_ucp_pass").fadeIn(1000);
				$("#submitBtnPasswort").fadeOut(200);
			},
			success :  function(dataucpepass)
			{
				if(dataucpepass == "emptyfieldfail"){
					$("#form_working_ucp_pass").fadeOut(1000, function(){
						$("#submitBtnPasswort").fadeIn(800);
						$("#ucp_fail_pass").html('<strong>Error:</strong> all fields is required.');
						$("#ucp_fail_pass").fadeIn(1000, function(){});
					});
				}else if(dataucpepass == "failemail"){
					$("#form_working_ucp_pass").fadeOut(1000, function(){
						$("#submitBtnPasswort").fadeIn(800);
						$("#ucp_fail_pass").html('<strong>Error:</strong> Please use a valid e-mail address.');
						$("#ucp_fail_pass").fadeIn(1000, function(){});
					});
				}else if(dataucpepass == "samepass"){
					$("#form_working_ucp_pass").fadeOut(1000, function(){
						$("#submitBtnPasswort").fadeIn(800);
						$("#ucp_fail_pass").html('<strong>Error:</strong> Use different passwords ( old & new password ).');
						$("#ucp_fail_pass").fadeIn(1000, function(){});
					});
				}else if(dataucpepass == "nosamepass"){
					$("#form_working_ucp_pass").fadeOut(1000, function(){
						$("#submitBtnPasswort").fadeIn(800);
						$("#ucp_fail_pass").html('<strong>Error:</strong> Passwords dont match.');
						$("#ucp_fail_pass").fadeIn(1000, function(){});
					});
				}
				else if(dataucpepass == "toshort"){
					$("#form_working_ucp_pass").fadeOut(1000, function(){
						$("#submitBtnPasswort").fadeIn(800);
						$("#ucp_fail_pass").html('<strong>Error:</strong> Password to short ( min. 5 character ).');
						$("#ucp_fail_pass").fadeIn(1000, function(){});
					});
				}
				else if(dataucpepass == "failpasssonder"){
					$("#form_working_ucp_pass").fadeOut(1000, function(){
						$("#submitBtnPasswort").fadeIn(800);
						$("#ucp_fail_pass").html('<strong>Error:</strong> No special characters allowed.');
						$("#ucp_fail_pass").fadeIn(1000, function(){});
					});
				}
				else if(dataucpepass == "failquery"){
					$("#form_working_ucp_pass").fadeOut(1000, function(){
						$("#submitBtnPasswort").fadeIn(800);
						$("#ucp_fail_pass").html('<strong>Error:</strong> There is a error. Try it again later.');
						$("#ucp_fail_pass").fadeIn(1000, function(){});
					});
				}
				else if(dataucpepass == "falschespassemail"){
					$("#form_working_ucp_pass").fadeOut(1000, function(){
						$("#submitBtnPasswort").fadeIn(800);
						$("#ucp_fail_pass").html('<strong>Fehler:</strong> LogIn failed. Please check your password and e-mail address.');
						$("#ucp_fail_pass").fadeIn(1000, function(){});
					});
				}
				else if(dataucpepass == "passsuccess"){
					$("#ucp_fail_pass").hide();
					window.location.reload(1);
				}
				else{
					$("#form_working_ucp_pass").fadeOut(1000, function(){
						$("#submitBtnPasswort").fadeIn(800);
						$("#ucp_fail_pass").html('<strong>Error:</strong> There is a error. Try it again later.');
						$("#ucp_fail_pass").fadeIn(1000, function(){});
					});
				}
			}
		});
		return false;
	});
});