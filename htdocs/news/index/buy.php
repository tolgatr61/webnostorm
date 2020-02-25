<?php
session_start();
require 'config.php';

$req4 = $conn->prepare("SELECT * FROM CoinsDreamTrix WHERE AccountId = ?");
$req4->execute([$_SESSION["AccountId"]]);
$result3 = $req4->fetch();

$req = $conn->prepare("SELECT * FROM ShoppingCartDreamTrix WHERE AccountId = ?");
$req1 = $conn->prepare("DELETE FROM ShoppingCartDreamTrix WHERE CharacterId = ?");
$req2 = $conn->prepare("UPDATE CoinsDreamTrix SET Coins -= ? WHERE AccountId = ?");
$req3 = $conn->prepare("UPDATE NosmallItemDreamTrix SET Number_p = Number_p + 1 WHERE ProductId = ?");
$req4 = $conn->prepare("SELECT * FROM NosmallItemDreamTrix WHERE VNum = ?");
$req->execute([$_SESSION["AccountId"]]);
while($result = $req->fetch())
{
	$req4->execute([$result["VNum"]]);
	$result4 = $req4->fetch();
	if(empty($result["ProductId"]) || empty($result))
	{
		$_SESSION["Error"] = "Ce produit n'existe pas !";
		return;
	}
	if($result3["Coins"] < $result["Price"] || $result3["Coins"] - $result["TotalPrice"] < 0)
	{
		$_SESSION["Error"] = "Vous n'avez pas assez de coins pour compléter votre achat !";
		header('Location: store.php');
		return;
	}
	$data = array(
		"CharacterId" => $result["CharacterId"], 
		"ItemVNum" 	  => $result["VNum"], 
		"Amount"      => $result4["Amount"],
		"Rare"        => $result4["Rare"],
		"Upgrade"     => $result4["Upgrade"],
		"Level"       => $result4["Level"]
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
	curl_close($ch);
	$req3->execute([$result["ProductId"]]);
	$req1->execute([$result["CharacterId"]]);
	$req2->execute([$result["TotalPrice"], $_SESSION["AccountId"]]);
}
unset($_SESSION["TotalPrice"]);
unset($_SESSION["TotalAmount"]);
$_SESSION["Success"] = "Vous avez passé votre commande avec succès !";
?>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		window.history.go(-1);
	</script>
</head>