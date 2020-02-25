<?php
session_start();
require 'config.php';

$req = $conn->prepare("SELECT * FROM ShoppingCartDreamTrix WHERE CartId = ? AND AccountId = ?");
$req->execute([$_GET["CartId"] ,$_SESSION["AccountId"]]);
$result = $req->fetch();
$_SESSION["TotalPrice"] -= $result["TotalPrice"];
$req = $conn->prepare("DELETE FROM ShoppingCartDreamTrix WHERE CartId = ? AND AccountId = ?");
$req->execute([$_GET["CartId"] ,$_SESSION["AccountId"]]);
?>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script text="text/javascript">
		$(document).ready(function(){
			history.go(-1);
		});
	</script>
</head>