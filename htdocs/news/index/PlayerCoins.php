<?php
	session_start();
	require 'config.php';

	$req = $conn->prepare("SELECT * FROM Account WHERE AccountId = ?");
	$req->execute([$_SESSION["AccountId"]]);
	$result = $req->fetch();
	if($result["Authority"] < 2 || empty($_SESSION["AccountId"]) || !isset($_SESSION["AccountId"]))
	{
		header('Location: store.php');
		return;
	}

	if($_POST)
	{
		$req2 = $conn->prepare("SELECT * FROM CoinsDreamTrix WHERE AccountId = ?");
		$req2->execute([$_POST["AccountId"]]);
		if(empty($req2->fetch()))
		{
			if(!empty($_POST["AddCoins"]))
			{
				$req1 = $conn->prepare("INSERT INTO CoinsDreamTrix (AccountId, Coins) VALUES (?, ?)");
				$req1->execute([$_POST["AccountId"], $_POST["AddCoins"]]);
				header('Location: adminpanel.php');
				return;
			}
		}

		if(!empty($_POST["AddCoins"]))
		{
			$req1 = $conn->prepare("UPDATE CoinsDreamTrix SET Coins += ? WHERE AccountId = ?");
			$req1->execute([$_POST["AddCoins"], $_POST["AccountId"]]);
			header('Location: adminpanel.php');
			return;
		}
		else if(!empty($_POST["RemoveCoins"]))
		{
			$req1 = $conn->prepare("UPDATE CoinsDreamTrix SET Coins -= ? WHERE AccountId = ?");
			$req1->execute([$_POST["RemoveCoins"], $_POST["AccountId"]]);
			header('Location: adminpanel.php');
			return;
		}
	}
	else
	{
		header('Location: index.php');
	}
?>