<?php 
if($_GET){
	session_start();
	function GetLang($German,$Englisch){
		if(isset($_SESSION["Sprache"])){
			if($_SESSION['Sprache'] == "Ger"){return $German;}
			else{return $Englisch;}
		}else{return $Englisch;}
	}
	//...........................
	if(isset($_GET['texttype']) && $_GET['texttype'] == "acc_thief"){
		echo nl2br(GetLang("Betroffener Account:","Involved Account:"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("Zeitpunkt des Vorfalls:","Time frame of the incident:"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("Beschreibung des Problems:","Problem description:"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("Zusätzliche wichtige Informationen:","Additional information (if necessary):"));
		echo '&#13;&#10;&#13;&#10;';
	}else if(isset($_GET['texttype']) && $_GET['texttype'] == "other"){
		echo nl2br(GetLang("Betroffener Account:","Involved Account:"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("Beschreibung des Problems:","Problem description:"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("Zusätzliche wichtige Informationen:","Additional information (if necessary):"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("Wenn möglich, sende bitte einen Screenshot.","Please attach a screenshot if possible:"));
	}else if(isset($_GET['texttype']) && $_GET['texttype'] == "unlock"){
		echo nl2br(GetLang("Betroffener Account:","Involved Account:"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("Fehlermeldung:","Received error message:"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("Grund der Beschwerde:","Complaint reason:"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("Zusätzliche wichtige Informationen:","Additional important information:"));
	}else if(isset($_GET['texttype']) && $_GET['texttype'] == "insults"){
		echo nl2br(GetLang("Beteiligte Accounts/Charaktere:","Involved accounts/characters:"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("Beschreibung des Problems:","Description of the problem:"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("Zusätzliche Informationen (wenn nötig):","Additional information (if necessary):"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("Wenn möglich, sende uns bitte einen Screenshot.","Please attach a screenshot if possible."));
	}else if(isset($_GET['texttype']) && $_GET['texttype'] == "bug"){
		echo nl2br(GetLang("Beteiligte Accounts/Charaktere:","Involved accounts/characters:"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("Wann trat der Fehler auf?:","When does the bug appear?:"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("Detaillierte Beschreibung des Fehlers:","Detailed description of the problem:"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("(Wenn möglich, füge bitte einen Screenshot hinzu.)","(Please attach a screenshot if possible.)"));
	}else if(isset($_GET['texttype']) && $_GET['texttype'] == "bug"){
		echo nl2br(GetLang("Beteiligte Accounts/Charaktere:","Involved accounts/characters:"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("Wann trat der Fehler auf?:","When does the bug appear?:"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("Detaillierte Beschreibung des Fehlers:","Detailed description of the problem:"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("(Wenn möglich, füge bitte einen Screenshot hinzu.)","(Please attach a screenshot if possible.)"));
	}else if(isset($_GET['texttype']) && $_GET['texttype'] == "hack"){
		echo nl2br(GetLang("Beteiligte Accounts/Charaktere:","Involved accounts/characters:"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("Beschreibung des Hacks:","Hack description:"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("Zusätzliche Informationen (wenn nötig):","Additional information (if necessary):"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("Wenn möglich, bitte einen Screenshot oder den Link zu einem Video mitsenden:","Please attach a screenshot or a link to a video if possible:"));
	}else if(isset($_GET['texttype']) && $_GET['texttype'] == "other"){
		echo nl2br(GetLang("Beteiligte Accounts/Charaktere:","Involved accounts/characters:"));
		echo '&#13;&#10;&#13;&#10;';
		echo nl2br(GetLang("Bitte beschreibe dein Problem:","Description of the problem:"));
		echo '&#13;&#10;&#13;&#10;';
	}
}
?>