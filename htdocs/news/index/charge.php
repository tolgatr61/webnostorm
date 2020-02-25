<?php
session_start();
require_once('../../vendor/autoload.php');
require_once('config.php');
\Stripe\Stripe::setApiKey("sk_live_pJWNsXKYgvQYCzVdTkoQTSTG");
$req = $conn->prepare("SELECT * FROM BuyCoinsDreamTrix WHERE CoinsId = ?");
$req->execute([$_GET["CoinsId"]]);
$result = $req->fetch();

$token  = $_POST['stripeToken'];
$email  = $_POST['stripeEmail'];

$customer = \Stripe\Customer::create([
  'email' => $email,
  'source'  => $token,
]);

$charge = \Stripe\Charge::create([
  'customer' => $customer->id,
  'amount'   => $result["Price"]."00",
  'currency' => 'EUR',
]);

if($charge->status == "succeeded")
{
	$req2 = $conn->prepare("SELECT * FROM CoinsDreamTrix WHERE AccountId = ?");
	$req2->execute([$_SESSION["AccountId"]]);
	if(empty($req2->fetch()))
	{
		$req1 = $conn->prepare("INSERT INTO CoinsDreamTrix (AccountId, Coins) VALUES (?, ?)");
		$req1->execute([$_SESSION["AccountId"], $result["Coins"]]);
	}
	else
	{
	  $req2 = $conn->prepare("UPDATE CoinsDreamTrix SET Coins = Coins + ? WHERE AccountId = ?");
	  $req2->execute([$result["Coins"], $_SESSION["AccountId"]]);
	}
  echo "Nous te remercions pour ton achat !";
}
else
{
  echo "Echec de l'achat !";
}

?>