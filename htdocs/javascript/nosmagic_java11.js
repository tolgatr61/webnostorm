$(document).ready(function() {
	$(function submitFormReg(){
		$("#reg-submit").click(function(){
			var data = $("#reg").serialize();
			var valid = $("#reg").validationEngine('validate');
			var isHuman = grecaptcha.getResponse();
			if(valid == false){return false;}
			if(isHuman.length == 0) {
				$("#errorreg").hide();
				$("#errorreg").html('');
				$("#form_working_reg").fadeIn(1000);
				$("#reg-submit").fadeOut(200);
				$("#form_working_reg").fadeOut(1000, function(){
					$("#reg-submit").fadeIn(800);
					$("#errorreg").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Das reCaptcha muss ausgefüllt werden !');
					$("#errorreg").fadeIn(1000, function(){});
				});
				return false;
			}
			$.ajax({
				type : 'POST',
				url  : '/user/register.php',
				data : data,
				beforeSend: function()
				{
					$("#errorreg").hide();
					$("#errorreg").html('');
					$("#form_working_reg").fadeIn(1000);
					$("#reg-submit").fadeOut(200);
				},
				success :  function(data)
				{
					if(data=="usernamevorhanden"){
						$("#form_working_reg").fadeOut(1000, function(){
							$("#reg-submit").fadeIn(800);
							$("#errorreg").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Benutzername bereits vorhanden !');
							$("#errorreg").fadeIn(1000, function(){});
						});
					}else if(data=="passrepeatfalse"){
						$("#form_working_reg").fadeOut(1000, function(){
							$("#reg-submit").fadeIn(800);
							$("#errorreg").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Passwort nicht identisch !');
							$("#errorreg").fadeIn(1000, function(){});
						});
					}else if(data=="emailfail"){
						$("#form_working_reg").fadeOut(1000, function(){
							$("#reg-submit").fadeIn(800);
							$("#errorreg").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Benutze eine gültige E-Mail Addresse !');
							$("#errorreg").fadeIn(1000, function(){});
						});
					}else if(data=="failusernamesonder"){
						$("#form_working_reg").fadeOut(1000, function(){
							$("#reg-submit").fadeIn(800);
							$("#errorreg").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Benutzername: Keine Sonderzeichen erlaubt !');
							$("#errorreg").fadeIn(1000, function(){});
						});
					}else if(data=="failpasswortsonder"){
						$("#form_working_reg").fadeOut(1000, function(){
							$("#reg-submit").fadeIn(800);
							$("#errorreg").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Passwort: Keine Sonderzeichen erlaubt !');
							$("#errorreg").fadeIn(1000, function(){});
						});
					}else if(data=="accountreg"){
						$("#errorreg").hide();
						window.location.reload(1);
					}
					else if(data=="fehlerquery"){
						$("#form_working_reg").fadeOut(1000, function(){
							$("#reg-submit").fadeIn(800);
							$("#errorreg").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Es liegt ein fehler vor. Versuche es später erneut. (#serverside)');
							$("#errorreg").fadeIn(1000, function(){});
						});
					}
					else if(data=="fehlerrecaptcha"){
						$("#form_working_reg").fadeOut(1000, function(){
							$("#reg-submit").fadeIn(800);
							$("#errorreg").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Das reCaptcha muss ausgefüllt werden !');
							$("#errorreg").fadeIn(1000, function(){});
						});
					}
					else if(data=="email_used"){
						$("#form_working_reg").fadeOut(1000, function(){
							$("#reg-submit").fadeIn(800);
							$("#errorreg").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Diese E-Mail Addresse wird bereits benutz !');
							$("#errorreg").fadeIn(1000, function(){});
						});
					}
					else{
						$("#form_working_reg").fadeOut(1000, function(){
							$("#reg-submit").fadeIn(800);
							$("#errorreg").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Es liegt ein fehler vor. Versuche es später erneut. (#serverside)');
							$("#errorreg").fadeIn(1000, function(){});
						});
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					$("#form_working_reg").fadeOut(1000, function(){
						$("#reg-submit").fadeIn(800);
						$("#errorreg").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Es liegt ein fehler vor. Versuche es später erneut. (#serverside)' + xhr + '-' + ajaxOptions + '-' + thrownError);
						$("#errorreg").fadeIn(1000, function(){});
					});
				}
			});
			return false;
		});
	});
	$(function submitFormLog(){
		$("#log-submit").click(function(){
			if(passwortfalsch==5){return false;}
			var login_form_UName = document.forms["log_form"]["LoginUsername"].value;
			var login_form_Pass = document.forms["log_form"]["LoginPassword"].value;
			if(login_form_UName == "" || login_form_UName.length < 4){
				$("#login_error").hide();
				$("#error_message").html('');
				$("#form_working").fadeIn(1000);
				$("#log-submit").fadeOut(200);
				$("#form_working").fadeOut(1000, function(){
					$("#log-submit").fadeIn(800);
					$("#error_message").html('<strong>Fehler:</strong> Login nicht erfolgreich. Benutzername oder Passwort falsch. Bitte achte auf die richtige Groß- und Kleinschreibung des Benutzernamens.');
					$("#login_error").fadeIn(1000, function(){});
				});
				return false;
			}else if(login_form_Pass == "" || login_form_Pass.length < 4){
				$("#login_error").hide();
				$("#error_message").html('');
				$("#form_working").fadeIn(1000);
				$("#log-submit").fadeOut(200);
				$("#form_working").fadeOut(1000, function(){
					$("#log-submit").fadeIn(800);
					$("#error_message").html('<strong>Fehler:</strong> Login nicht erfolgreich. Benutzername oder Passwort falsch. Bitte achte auf die richtige Groß- und Kleinschreibung des Benutzernamens.');
					$("#login_error").fadeIn(1000, function(){});
				});
				return false;
			}
			var datax = $("#log_form").serialize();
			$.ajax({
				type : 'POST',
				url  : '/user/login.php',
				data : datax,
				beforeSend: function()
				{
					$("#login_error").hide();
					$("#error_message").html('');
					$("#form_working").fadeIn(1000);
					$("#log-submit").fadeOut(200);
				},
				success :  function(datax)
				{
					if(datax=="fehlerqueryx")
					{
						$("#form_working").fadeOut(1000, function(){
							$("#log-submit").fadeIn(800);
							$("#error_message").html('<strong>Fehler:</strong> Es liegt ein fehler vor. Bitte probiere es später erneut.');
							$("#login_error").fadeIn(1000, function(){});
						});
					}else if(datax=="logfalsch"){
						passwortfalsch = passwortfalsch + 1;
						if(passwortfalsch == 5){
							$("#form_working").fadeOut(1000, function(){
								$("#log-submit").fadeIn(800);
								$("#error_message").html('<strong>Fehler:</strong> Du hast zu oft das Passwort falsch eingegeben. Bitte lade die Seite erneut.');
								$("#login_error").fadeIn(1000, function(){});
							});
							return false;
						}
						$("#form_working").fadeOut(1000, function(){
							$("#log-submit").fadeIn(800);
							$("#error_message").html('<strong>Fehler:</strong> Login nicht erfolgreich. Benutzername oder Passwort falsch. Bitte achte auf die richtige Groß- und Kleinschreibung des Benutzernamens.');
							$("#login_error").fadeIn(1000, function(){});
						});
					}else if(datax=="BePaLeer"){
						$("#form_working").fadeOut(1000, function(){
							$("#log-submit").fadeIn(800);
							$("#error_message").html('<strong>Fehler:</strong> Login nicht erfolgreich. Benutzername oder Passwort falsch. Bitte achte auf die richtige Groß- und Kleinschreibung des Benutzernamens.');
							$("#login_error").fadeIn(1000, function(){});
						});
					}else if(datax=="elog"){
						$("#login_error").hide();
						window.location.reload(1);
					}else if(datax=="accbanned"){
						$("#form_working").fadeOut(1000, function(){
							$("#log-submit").fadeIn(800);
							$("#error_message").html('<strong>Fehler:</strong> Dein Account wurde gesperrt. Melde dich bitte bei einen Admin und schreibe einen Entbann Beitrag in unseren Forum.');
							$("#login_error").fadeIn(1000, function(){});
						});
					}else{
						$("#form_working").fadeOut(1000, function(){
							$("#log-submit").fadeIn(800);
							$("#error_message").html('<strong>Fehler:</strong> Es liegt ein fehler vor. Bitte probiere es später erneut.');
							$("#login_error").fadeIn(1000, function(){});
						});
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					$("#form_working").fadeOut(1000, function(){
						$("#log-submit").fadeIn(800);
						$("#error_message").html('<strong>Fehler:</strong> Es liegt ein fehler vor. Bitte probiere es später erneut.');
						$("#login_error").fadeIn(1000, function(){});
					});
				}
			});
			return false;
		});
	});
});