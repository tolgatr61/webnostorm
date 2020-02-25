<?php
session_start();
require_once 'config.php';

if($_POST)
{
	$req = $conn->prepare("INSERT INTO ShoppingCartDreamTrix (AccountId, ProductId, CharacterId, VNum, Price, Image, Amount, TotalPrice) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
	$req->execute([$_SESSION["AccountId"], $_POST["ProductId"], $_POST["CharacterId"], $_POST["VNum"], $_POST["Price"], $_POST["Image"], $_POST["Amount"], $_POST["Amount"] * $_POST["Price"]]);

	if(isset($_SESSION["TotalPrice"]))
	{
		$_SESSION["TotalPrice"] += $_POST["Amount"] * $_POST["Price"];
	}
	else
	{
		$_SESSION["TotalPrice"] = $_POST["Amount"] * $_POST["Price"];
	}
}
else
{
	$_SESSION["ErrorCart"] = "Tu ne peux pas passer ta commande si ton panier est vide !";
    header('Location: store.php?CategoriesId=0');
}
?>