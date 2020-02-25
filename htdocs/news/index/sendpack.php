<?php
	session_start();
	require 'config.php';

		$req2 = $conn->prepare("SELECT * FROM VerificationPackDreamTrix WHERE PackId = ?");
		$req2->execute([$_POST["PackId"]]);
		if(count($req2->fetchAll()) > 0)
		{
			$_SESSION["Error"] = "Tu as déjà récupéré ce pack.";
			header('Location: store.php');
			return;
		}

		$req = $conn->prepare("SELECT * FROM PackDreamTrix WHERE PackId = ?");
		$req->execute([$_POST["PackId"]]);
		$req1 = $conn->prepare("INSERT INTO VerificationPackDreamTrix (AccountId, PackId) VALUES (?, ?)");
		$req3 = $conn->prepare("SELECT * FROM NosmallItemDreamTrix WHERE VNum = ?");
		while($result = $req->fetch())
		{
			$req3->execute([$result["VNum"]]);
			$result3 = $req3->fetch();
			$data = array(
				"CharacterId" => $_POST["CharacterId"], 
				"ItemVNum" 	  => $result["VNum"], 
				"Amount"      => $result3["Amount"],
				"Rare"        => $result3["Rare"],
				"Upgrade"     => $result3["Upgrade"],
				"Level"       => 0
			);
			$data_string = json_encode($data);
			$ch = curl_init('http://localhost:9000/Buy/');
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($data_string))
			);
			$result2 = curl_exec($ch);
			$resultStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			if($resultStatus != 200)
			{
				$_SESSION["IsError"] = 1;
			}
			curl_close($ch);
		}
		if($_SESSION["IsError"] == 1)
		{
			$_SESSION["Error"] = "Echec, contactez l'administrateur du site !";
		}
		else
		{
			$req1->execute([$_SESSION["AccountId"], $_POST["PackId"]]);
			$_SESSION["Success"] = "Votre pack a bien été envoyé directement en jeu !";
		}
?>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		window.history.go(-1);
	</script>
</head>