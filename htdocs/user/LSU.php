<?php 
	// Copyright by NosTale - Login Lade Daten //
	function LoadUserImage($Load_Variable_Image){
		if($Load_Variable_Image == 0){return "default";}//Sp1
		else if($Load_Variable_Image == 1){return "male/mranger";}
		else if($Load_Variable_Image == 2){return "male/mkrieger";}
		else if($Load_Variable_Image == 3){return "male/mredmage";}
		else if($Load_Variable_Image == 4){return "female/wranger";}
		else if($Load_Variable_Image == 5){return "female/wkrieger";}
		else if($Load_Variable_Image == 6){return "female/wredmage";}//Sp2
		else if($Load_Variable_Image == 7){return "male/mschurke";}
		else if($Load_Variable_Image == 8){return "male/mninja";}
		else if($Load_Variable_Image == 9){return "male/mholy";}
		else if($Load_Variable_Image == 10){return "female/wschurke";}
		else if($Load_Variable_Image == 11){return "female/wninja";}
		else if($Load_Variable_Image == 12){return "female/wholy";}//Sp3
		else if($Load_Variable_Image == 13){return "male/mgunner";}
		else if($Load_Variable_Image == 14){return "male/mcrusi";}
		else if($Load_Variable_Image == 15){return "male/mice";}
		else if($Load_Variable_Image == 16){return "female/wgunner";}
		else if($Load_Variable_Image == 17){return "female/wcrusi";}
		else if($Load_Variable_Image == 18){return "female/wice";}//Sp4
		else if($Load_Variable_Image == 19){return "male/mwk";}
		else if($Load_Variable_Image == 20){return "male/mbersi";}
		else if($Load_Variable_Image == 21){return "male/mdg";}
		else if($Load_Variable_Image == 22){return "female/wwk";}
		else if($Load_Variable_Image == 23){return "female/wbersi";}
		else if($Load_Variable_Image == 24){return "female/wdg";}//Sp5
		else if($Load_Variable_Image == 25){return "male/mkano";}
		else if($Load_Variable_Image == 26){return "male/mgladi";}
		else if($Load_Variable_Image == 27){return "male/mvulki";}
		else if($Load_Variable_Image == 28){return "female/wkano";}
		else if($Load_Variable_Image == 29){return "female/wgladi";}
		else if($Load_Variable_Image == 30){return "female/wvulki";}//Sp6
		else if($Load_Variable_Image == 31){return "male/mspaeher";}
		else if($Load_Variable_Image == 32){return "male/mkm";}
		else if($Load_Variable_Image == 33){return "male/mgzb";}
		else if($Load_Variable_Image == 34){return "female/wspaeher";}
		else if($Load_Variable_Image == 35){return "female/wkm";}
		else if($Load_Variable_Image == 36){return "female/wgzb";}//Sp7
		else if($Load_Variable_Image == 37){return "male/mdj";}
		else if($Load_Variable_Image == 38){return "male/mtodb";}
		else if($Load_Variable_Image == 39){return "male/mseher";}
		else if($Load_Variable_Image == 40){return "female/wdj";}
		else if($Load_Variable_Image == 41){return "female/wtodb";}
		else if($Load_Variable_Image == 42){return "female/wseher";}//Sp7
		else if($Load_Variable_Image == 43){return "male/mrache";}
		else if($Load_Variable_Image == 44){return "male/mabt";}
		else if($Load_Variable_Image == 45){return "male/merzmagier";}
		else if($Load_Variable_Image == 46){return "female/wracheengel";}
		else if($Load_Variable_Image == 47){return "female/wabt";}
		else if($Load_Variable_Image == 48){return "female/werzmag";}
		else{return "default";}
	}
	function LoadUserCharImage($Load_VariableChar_Gender,$Load_VariableChar_Class){
		if($Load_VariableChar_Gender == 0){
			if($Load_VariableChar_Class == 0){return "m_abi";}
			else if($Load_VariableChar_Class == 2){return "m_bogi";}
			else if($Load_VariableChar_Class == 1){return "m_schwerti";}
			else if($Load_VariableChar_Class == 3){return "m_mage";}
		}else{
			if($Load_VariableChar_Class == 0){return "w_abi";}
			else if($Load_VariableChar_Class == 2){return "w_bogi";}
			else if($Load_VariableChar_Class == 1){return "w_schwerti";}
			else if($Load_VariableChar_Class == 3){return "w_mage";}
		}
	}
	function LoadUserBeruf($Load_UserBeruf){
		if($Load_UserBeruf == 0){return GetLang("Abenteuer","Aventurier");}
		else if($Load_UserBeruf == 2){return GetLang("Bogenschütze","Archer");}
		else if($Load_UserBeruf == 1){return GetLang("Schwertkämpfer","Escrimeur");}
		else if($Load_UserBeruf == 3){return GetLang("Magier","Mage");}
	}
	function GetGender($GenderID){
		if($GenderID == 0){return GetLang("Männlich","Homme");}
		else{return GetLang("Weiblich","Femme");}
	}
	function FormatNumber($Number){
		if(strlen($Number) >= 7 ){return str_replace(",",".",number_format($Number));}
		else return $Number;
	}
	function GetLang($German,$Englisch){
		if(isset($_SESSION["Sprache"])){
			if($_SESSION['Sprache'] == "Ger"){return $German;}
			else{return $Englisch;}
		}else{return $Englisch;}
	}
	function ServerOnline(){
		return 1;
		$server = "217.182.34.50";
		$port = "4002";
		$timeout = "2";
		if ($server and $port and $timeout) {$gameserver = @fsockopen("$server", $port, $timeout);}
		if($gameserver){return 1;}
		else{return 0;}
		$server = "217.182.34.50";
		$port = "4002";
		$timeout = "2";
		if ($server and $port and $timeout) 
		{$gameserver = @fsockopen("$server", $port, $timeout);}
		if($gameserver) {return 1;}
		else {return 0;}
	}

	if(empty($_SESSION['User'])){
		session_regenerate_id();
		$_SESSION['User'] = "";
	}
	if(empty($_SESSION['passwort'])){
		session_regenerate_id();
		$_SESSION['passwort'] =  "";
	}
	if(empty($_SESSION['User']) or empty($_SESSION['passwort'])){
        $lsu_Eingeloggt=0;
		return;
	}else{
        $lsu_username = $_SESSION['User'];
		$lsu_pass = $_SESSION['passwort'];
        $stmt = $conn->prepare("SELECT TOP 1 * FROM $db_Account WHERE $db_Account.[Name] = :name AND $db_Account.[Password] = :pass");
		$stmt->bindParam(':name', $lsu_username);
		$stmt->bindParam(':pass', $lsu_pass);
		if($stmt->execute()){
			if ($row = $stmt->fetch()){
				$lsu_Eingeloggt=1;
				unset($_SESSION["LOGIN_ERROR"]);
				/* -> Account tabelle */
				$lsu_Adminlevel = $row['Authority'];
				$lsu_Account_ID = $row['AccountId'];
				$lsu_Account_Name = $row['Name'];
				$lsu_Account_Email = $row['Email'];
				$lsu_IP_Adress = $row['RegistrationIP'];

				if (isset($lsu_IP_Adress) && $lsu_IP_Adress == "unknow"){
					$LOAD_IP_ADDRESS = $_SERVER['REMOTE_ADDR'];
					$stmt = $conn->prepare("UPDATE $db_Account SET RegistrationIP = :ipxaddress WHERE $db_Account.[AccountId] = :acc_ID");
					$stmt->bindParam(':ipxaddress', $LOAD_IP_ADDRESS);
					$stmt->bindParam(':acc_ID', $lsu_Account_ID);
					if($stmt->execute()){}
				}
				$stmt = $conn->prepare("SELECT * FROM $db_Char WHERE $db_Char.[AccountId] = :accID AND $db_Char.[State] = 1");
				$stmt->bindParam(':accID', $lsu_Account_ID);
				if($stmt->execute()){
					while( $row2 = $stmt->fetch())
					{
						$loaducp_char[] = $row2;
						$loaducp_char_failed = 0;
					}
				}else{$loaducp_char_failed = 1;}
			}else{
				$_SESSION['User'] = "";
				$_SESSION['passwort'] = "";
				$lsu_Eingeloggt=0;
				header("Location: index.php");
			}
		}
	}
?>