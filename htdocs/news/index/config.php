<?php // config reprogrammed by cuarz
error_reporting(0);

	$WebsiteVersion="1.0.6";

	$db_Char='dbo.Character';//Character Liste
	$db_Account='dbo.Account';//Account Liste
	$db_News='dbo.NewsTable';//News
	$db_Comm='dbo.NewsCommentary';//News Kommentare
	$db_Penalty="dbo.PenaltyLog";//Penalty -> Ban
	$db_Ticket="dbo.Ticket";//Ticket ( ALLGEMEIN )
	$db_awTicket="dbo.TicketAnswer";//Ticket ( Antworten )

	$serverName = "localhost";
	$connectionInfo = "opennos";

	$site = [
		'name' => 'NosTorm',
		'url' => 'http://25.68.193.142:1433',
		'style' => '/news/index/assets',

		'download' => [
			'directory' => '/launcher/',
			'launcher' => 'DreamTrix.exe'
		],

		'social' => [
			'discord' => 'https://discord.gg/vsse3B',
			'youtube' => '',
			'twitter' => '',
			'facebook' => ''
		],

		'assets' => [
			'javascript' => '/javascript',
			'css' => '/news/index/assets/css',
			'images' => '/news/index/assets/images'
		]
	];


	$RuleWebsite = "http://dreamtrix.fr/rules";
	$YouTube = "https://www.youtube.com";
	$Board = "http://board.dreamtrix.fr";
	$Discord = "https://discord.gg/4tPNNUH";

	$Facebook = "";
	$FacebookName = "";
	$ReCaptchaPublic = "6LezuMUUAAAAALyJWxweBI_DYMOiRFzEn7UXa3iu";
    $ReCaptchaPrivate = "6LezuMUUAAAAAFKMMG83aKAjtDt05keWDSID7s41";
    
	try {

		$conn = new PDO("sqlsrv:Server=$serverName;Database=$connectionInfo", NULL, NULL);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
		echo 'Connection Failed to Database , please be patient !'; echo $e->getMessage();
	}
	
?>