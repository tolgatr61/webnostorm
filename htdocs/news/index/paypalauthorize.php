<?php
	session_start();
	require 'config.php';

	if($_POST)
	{
		include 'PaypalExpress.class.php';
    	$paypal = new PaypalExpress;

    	$paymentID = $_POST['paymentID'];
    	$token = $_POST['token'];
    	$payerID = $_POST['payerID'];
    	$price = $_POST['Price'];

    	$paymentCheck = $paypal->validate($paymentID, $token, $payerID, $productID);
    	if($paymentCheck && $paymentCheck->state == 'approved')
    	{
			$req = $conn->prepare("SELECT * FROM BuyCoinsDreamTrix WHERE Price = ?");
			$req->execute([$price]);
			$result = $req->fetch();

			$req1 = $conn->prepare("SELECT * FROM CoinsDreamTrix WHERE AccountId = ?");
			$req1->execute([$_SESSION["AccountId"]]);
			if(count($req1->fetchAll()) <= 0)
			{
				$req2 = $conn->prepare("INSERT INTO CoinsDreamTrix (AccountId, Coins) VALUES (?, ?)");
				$req2->execute([$_SESSION["AccountId"], $result["Coins"]]);
				echo "L'équipe de DreamTrix te remercie pour ton achat ! Ton compte a été crédité de ".$result["Coins"]." coins";
			}
			else
			{
				$req3 = $conn->prepare("UPDATE CoinsDreamTrix SET Coins += ? WHERE AccountId = ?");
				$req3->execute([$result["Coins"], $_SESSION["AccountId"]]);
				echo "L'équipe de DreamTrix te remercie pour ton achat ! Ton compte a été crédité de ".$result["Coins"]." coins";
			}
    	}
	}
?>