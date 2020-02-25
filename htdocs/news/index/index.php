<?php 

session_start();
setlocale(LC_TIME, 'de_DE'); 
if (!file_exists('config.php')):
	echo '[Maintenance] e website is under Maintenance for a few moments ! Please be Patient ( Error: Cant found all Configs ) !';return;
endif;

if (!file_exists('../../user/LSU.php')):
	echo '[Maintenance] The website is under Maintenance for a few moments ! Please be Patient ( Error: Cant found all Configs ) !';
	return;
endif;

if (!file_exists('../../user/LRU.php')):
	echo '[Maintenance] The website is under Maintenance for a few moments ! Please be Patient ( Error: Cant found all Configs ) !';
	return;
endif;

require("config.php"); // noobs use requieres xD
require("../../user/LSU.php");
require("../../user/LRU.php");

if (!isset($_SESSION['Sprache'])):
	if (empty($_SESSION['Sprache'])):

		session_regenerate_id();
$_SESSION['Sprache'] = "Eng"; // Default Sprache
endif;
endif;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $site['name']; ?> - Serveur Nostale</title>
	<meta name="description" content="<?php echo $site['name']; ?> - est un serveur privé Nostale ayant le but de vous fournir un contenu inédit qu'aucun autre serveur ne vous l'a offert.">
	<meta name="keywords" content="nostale, nostale serveur privé">
	<meta name="author" content="_nK">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- call/:css -->
	<link rel="icon" type="image/png" href="<?php echo $site['assets']['images']; ?>/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7cOpen+Sans:400,700" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo $site['url'] . $site['style']; ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $site['url'] . $site['style']; ?>/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $site['url'] . $site['style']; ?>/bower_components/ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo $site['url'] . $site['style']; ?>/bower_components/flickity/dist/flickity.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $site['url'] . $site['style']; ?>/bower_components/photoswipe/dist/photoswipe.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $site['url'] . $site['style']; ?>/bower_components/photoswipe/dist/default-skin/default-skin.css">
	<link rel="stylesheet" href="<?php echo $site['url'] . $site['style']; ?>/bower_components/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css">
	<link rel="stylesheet" href="<?php echo $site['url'] . $site['style']; ?>/bower_components/summernote/dist/summernote.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $site['url'] . $site['style']; ?>/bower_components/prism/themes/prism-tomorrow.css">
	<link rel="stylesheet" href="<?php echo $site['url'] . $site['assets']['css']; ?>/goodgames.css">
	<link rel="stylesheet" href="<?php echo $site['url'] . $site['assets']['css']; ?>/custom.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<!-- other css -->
	<script type="text/javascript" src="<?php echo $site['url'] . $site['assets']['javascript']; ?>/nosmagic_var.js"></script>
	<script type="text/javascript" src="<?php echo $site['url'] . $site['assets']['javascript']; ?>/nosmagic_java1.js"></script>
	<script type="text/javascript" src="<?php echo $site['url'] . $site['assets']['javascript']; ?>/nosmagic_java2.js"></script>
	<script type="text/javascript" src="<?php echo $site['url'] . $site['assets']['javascript']; ?>/nosmagic_java3.js"></script>
	<script type="text/javascript" src="<?php echo $site['url'] . $site['assets']['javascript']; ?>/nosmagic_java4.js"></script>
	<script type="text/javascript" src="<?php echo $site['url'] . $site['assets']['javascript']; ?>/nosmagic_java5.js"></script>
	<script type="text/javascript" src="<?php echo $site['url'] . $site['assets']['javascript']; ?>/nosmagic_java6.js?v=2.0.4"></script>
	<script type="text/javascript" src="<?php echo $site['url'] . $site['assets']['javascript']; ?>/nosmagic_java7.js"></script>
	<script type="text/javascript" src="<?php echo $site['url'] . $site['assets']['javascript']; ?>/nosmagic_java8.js"></script>
	<script type="text/javascript" src="<?php echo $site['url'] . $site['assets']['javascript']; ?>/nosmagic_java9.js"></script>
	<script type="text/javascript" src="<?php echo $site['url'] . $site['assets']['javascript']; ?>/nosmagic_jsforall.js"></script>
	<!-- call/:scripts -->
	<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/jquery/dist/jquery.min.js"></script>
</head>
<body>
	<header class="nk-header nk-header-opaque">
		<!-- start/:top_header -->
		<div class="nk-contacts-top">
			<div class="container">
				<!-- social/:buttons -->
				<div class="nk-contacts-left">
					<ul class="nk-social-links">
						<li>
							<a class="nk-social-facebook" href="<?php echo $site['social']['facebook']; ?>" target="_blank">
								<span class="fa fa-facebook"></span>
							</a>
						</li>
						<li>
							<a class="nk-social-twitter" href="<?php echo $site['social']['twitter']; ?>" target="_blank">
								<span class="fa fa-twitter"></span>
							</a>
						</li>
						<li>
							<a class="nk-social-youtube" href="<?php echo $site['social']['youtube']; ?>" target="_blank">
								<span class="fa fa-youtube-play"></span>
							</a>
						</li>
					</ul>
				</div>

				<!-- /:login_buttons -->
				<div class="nk-contacts-right">
					<ul class="nk-contacts-icons">
						<?php if (isset($lsu_Eingeloggt) && $lsu_Eingeloggt == 0): ?>
							<li>
								<a href="#" data-toggle="modal" data-target="#modalRegister">
									<head-text>S'INSCRIRE</head-text><span class="fa fa-user-plus"></span>
								</a>
							</li>
							<li>
								<a href="#" data-toggle="modal" data-target="#modalLogin">
									<head-text>S'IDENTIFIER</head-text><span class="fa fa-user"></span>
								</a>
							</li>
						<?php else: 

							$stmt = $conn->prepare("SELECT cha.Name, acc.Authority FROM Character cha INNER JOIN Account acc ON cha.AccountId = acc.AccountId WHERE acc.AccountId = ?");
							$stmt->execute(array($lsu_Account_ID));
							$myUser = $stmt->fetch();
							$req = $conn->prepare("SELECT * FROM CoinsDreamTrix WHERE AccountId = ?");
							$req->execute([$_SESSION["AccountId"]]);
							$result = $req->fetch();
							?>
							<li>
								<span class="nk-cart-toggle">
									<head-text><?php echo $_SESSION['User']; ?></head-text><span class="fa fa-user"></span>
								</span>
								<div class="nk-cart-dropdown">

									<div class="nk-widget-post" style="margin-top:5px;">
										<div class="nk-post-image" style="width:70px;">
											<img src="/images/nm_ucp/probild/<?= LoadUserImage($lsu_Account_Profilbild); ?>.jpg" style="border-radius:4px;">
										</diV>
										<h3 class="nk-post-title" style="margin-left:-15px;margin-top:10px;margin-bottom:10px;">Bonjour, <username-color><?php echo $_SESSION["User"]; ?></username-color>.</h3>
										<h3 class="nk-post-title" style="margin-left:-15px;margin-top:10px;margin-bottom:10px;">Tu as : <?= $result["Coins"] ?> coins.</h3>
										<a href="/profile/<?= $myUser['Name'] ?>" class="nk-btn nk-btn-rounded nk-btn-color-main-1 nk-btn-hover-color-white" style="float:left;margin-left:-15px;margin-top:5px;">voir profil</a>
										<a href="/user/configuration" class="nk-btn nk-btn-rounded nk-btn-color-main-1 nk-btn-hover-color-white" style="float:left;margin-left:7px;margin-top:5px;">
											<i class="fa fa-cog"></i>
										</a>
										<?php
											if($myUser["Authority"] >= 2):
										?>
										<a href="news/index/adminpanel.php" class="nk-btn nk-btn-rounded nk-btn-color-main-1 nk-btn-hover-color-white" style="float:left;margin-left:-15px;margin-top:5px;">Panel Admin</a>
										<?php
											endif;
										?>
									</div>
								</div>
							</li>
							<li>
								<a href="/user/logout.php">
									<head-text>Se déconnecter</head-text><span class="fa fa-sign-out"></span>
								</a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<?php 

	if (isset($_SESSION["LOGIN_ERROR"])): ?>
		<script>
			$(function(){
				$("#modalLogin").modal('toggle');
			});
		</script>
		<?php
	endif; if (isset($_SESSION["REGISTER_ERROR"])): 
	?>
	<script>
		$(function(){
			$("#modalRegister").modal('toggle');
		});
	</script>
<?php endif; ?>
<!-- end/:top_header -->

<!-- START : Navbar -->
					<?php 

include '../views/nav.php'; // nav

?>
<!-- END : Navbar -->
	</header>
	<div id="nk-nav-mobile" class="nk-navbar nk-navbar-side nk-navbar-right-side nk-navbar-overlay-content hidden-lg-up">
		<div class="nano">
			<div class="nano-content">
				<a href="index.php" class="nk-nav-logo">
					<img src="/news/index/assets/images/logo.png" alt="" width="120">
				</a>
				<div class="nk-navbar-mobile-content">
					<ul class="nk-nav">
						<!-- Here will be inserted menu from [data-mobile-menu="#nk-nav-mobile"] -->
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Navbar Mobile -->
	<div class="nk-main">
		<div class="nk-gap-2"></div>
		<div class="container">
			<a href="index.php" class="nk-nav-logo">
				<img src="/news/index/assets/images/logohaut.png" style="display: block; margin-left: auto; margin-right: auto" alt="GoodGames" width="500">
			</a>
			<!-- START: Image Slider -->
			<div class="nk-image-slider" data-autoplay="8000">
				<div class="nk-image-slider-item">
					<img src="https://fr-images-nostale.gameforge.com//images/artworks/RadikunBeach.png" alt="" class="nk-image-slider-img" data-thumb="https://fr-images-nostale.gameforge.com//images/artworks/RadikunBeach.png">
					<div class="nk-image-slider-content">
						<h3 class="h4">Nouveau site web</h3>
						<p class="text-white">Maintenant, vous pouvez profiter de notre nouveau site Web, nous allons ajouter plus de choses au fil du temps.</p><br>
						<a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Lire la suite</a>
					</div>
				</div>

				<div class="nk-image-slider-item">
					<img src="https://fr-images-nostale.gameforge.com//images/artworks/SharesCanyon.png" alt="" class="nk-image-slider-img" data-thumb="https://fr-images-nostale.gameforge.com//images/artworks/SharesCanyon.png">
					<div class="nk-image-slider-content">
						<h3 class="h4">Nouveautés</h3>
						<p class="text-white">Beaucoup de nouveautés arrivent sur DreamTrix alors resté dans les parages !</p>
						<a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Lire la suite</a>
					</div>
				</div>

				<div class="nk-image-slider-item">
					<img src="https://fr-images-nostale.gameforge.com//images/artworks/ShimmeryCrystalCave.png" alt="" class="nk-image-slider-img" data-thumb="https://fr-images-nostale.gameforge.com//images/artworks/ShimmeryCrystalCave.png">
					<div class="nk-image-slider-content">
						<h3 class="h4">L'équipe</h3>
						<p class="text-white">L'équipe de DreamTrix fera tout pour rendre votre expérience de jeu agréable !</p><br>
						<a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Lire la suite</a>
					</div>
				</div>

				<div class="nk-image-slider-item">
					<img src="https://fr-images-nostale.gameforge.com//images/artworks/LortenForest2.png" alt="" class="nk-image-slider-img" data-thumb="https://fr-images-nostale.gameforge.com//images/artworks/LortenForest2.png">
					<div class="nk-image-slider-content">
						<h3 class="h4">Client</h3>
						<p class="text-white">Du modding client et des nouveautés exclusives à DreamTrix !</p><br>
						<a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Lire la suite</a>
					</div>
				</div>

				<div class="nk-image-slider-item">
					<img src="https://fr-images-nostale.gameforge.com//images/artworks/NosVille.png" alt="" class="nk-image-slider-img" data-thumb="https://fr-images-nostale.gameforge.com//images/artworks/NosVille.png">
					<div class="nk-image-slider-content">
						<h3 class="h4">Communauté</h3>
						<p class="text-white">Une communauté agréable vous attend !</p><br>
						<a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Lire la suite</a>
					</div>
				</div>
			</div>
			<!-- END: Image Slider -->
			<div class="nk-gap-2"></div>
			<div class="row vertical-gap">

				<div class="col-lg-4">
					<div class="nk-feature-2">
						<div class="nk-feature-icon">
							<a href="#" data-toggle="modal" data-target="#modalRegister" style="color:#fff;outline: none;">
								<span class="ion-android-person-add"></span>
							</a>
						</div>
						<div class="nk-feature-cont text-center">
							<h3 class="nk-feature-title"><a href="#" data-toggle="modal" data-target="#modalRegister" class="text-main-1">Créer</a> un compte</h3>
							<div class="nk-gap-1"></div>
							Créer un nouveau compte et rejoignez-nous !
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="nk-feature-2">
						<div class="nk-feature-icon">
							<a href="<?php echo $site['download']['directory'] . $site['download']['launcher']; ?>" style="color:#fff;outline: none;" target="_blank">
								<span class="ion-android-download"></span>
							</a>
						</div>
						<div class="nk-feature-cont text-center">
							<h3 class="nk-feature-title"><a href="<?php echo $site['download']['directory'] . $site['download']['launcher']; ?>" class="text-main-1">Télécharger</a> le launcher</h3>
							<div class="nk-gap-1"></div>
							Télécharger le launcher pour commencer à jouer !
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="nk-feature-2">
						<div class="nk-feature-icon">
							<a href="<?php echo $site['social']['discord']; ?>" style="color:#fff;outline: none;" target="_blank">
								<span class="ion-social-octocat"></span>
							</a>
						</div>
						<div class="nk-feature-cont text-center">
							<h3 class="nk-feature-title"><a href="<?php echo $site['social']['discord']; ?>" class="text-main-1">Rejoindre</a> Discord</h3>
							<div class="nk-gap-1"></div>
							Rejoignez notre discord pour rester informé sur les nouvelles du serveur !
						</div>
					</div>
				</div>
			</div>
			<!-- END: Categories -->
			<!-- START -->
			<div class="nk-gap-2"></div>
			<h3 class="nk-decorated-h-2"><span><span class="text-main-1">Dernières</span> Nouvelles</span></h3>
			<div class="nk-gap"></div>

			<div class="nk-news-box">
				<div class="nk-news-box-list">
					<div class="nano">
						<div class="nano-content">

							<div class="nk-news-box-item nk-news-box-item-active">
								<div class="nk-news-box-item-img">
									<img src="/news/index/assets/images/footer.jpg" alt="Smell magic in the air. Or maybe barbecue">
								</div>
								<img src="/news/index/assets/images/footer.jpg" alt="Smell magic in the air. Or maybe barbecue" class="nk-news-box-item-full-img">
								<h3 class="nk-news-box-item-title">DreamTrix - Nouveau site internet !</h3>

								<span class="nk-news-box-item-categories">
									<span class="bg-main-4">INFORMATION</span>
								</span>

								<div class="nk-news-box-item-text">
									<p>Bonjour à tous.</p>
									<p>Suite à de nombreux problèmes sur l'ancien site internet, nous avons décidé d'en faire un nouveau.</p>
									<p>Il y a les fonctionnalités de base mais malheureusement pour le nosmall, il n'y aura plus d'achat automatique !</p>
									<p>Il faudra envoyer un message à Worldie sur discord quand vous voudrez faire une donation !</p>
									<a href="/index" class="nk-news-box-item-url">Lire la suite</a>
								</div>
								<div class="nk-news-box-item-date"><span class="fa fa-calendar"></span> 20 Février 2019</div>
							</div>

						</div>
					</div>
				</div>
				<div class="nk-news-box-each-info">
					<div class="nano">
						<div class="nano-content">
							<!-- There will be inserted info about selected news-->
							<div class="nk-news-box-item-image">
								<span class="nk-news-box-item-categories">
									<span class="bg-main-4"></span>
								</span>
							</div>
							<h3 class="nk-news-box-item-title"></h3>
							<div class="nk-news-box-item-text">
								<p></p>
							</div>
							<a href="blog-article.html" class="nk-news-box-item-more"></a>
							<div class="nk-news-box-item-date">
								<span class="fa fa-calendar"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END -->

			<div class="nk-gap-2"></div>
			<div class="nk-blog-grid">
				<div class="row">
					<div class="col-md-6 col-lg-3"></div>
					<div class="col-md-6 col-lg-3"></div>
					<div class="col-md-6 col-lg-3"></div>
					<div class="col-md-6 col-lg-3"></div>
				</div>
			</div>
			<div class="nk-gap-2"></div>
			<div class="row vertical-gap">
				<div class="col-lg-8">
					<!-- START: Latest Posts -->
					<!-- END: Latest Posts -->
					<!-- START: Ranking -->
					<div class="nk-gap-2"></div>
					<h3 class="nk-decorated-h-2">
						<span>
							<span class="text-main-1">Top</span> Classement
						</span>
					</h3>
					<div class="nk-gap"></div>
					<div class="row"></div>
					<div class="nk-tabs">
						<ul class="nav nav-tabs nav-tabs-fill" role="tablist">
							<li class="nav-item">
								<a class="nav-link active show" href="#tabs-1-1" role="tab" data-toggle="tab" aria-selected="true">Niveau</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#tabs-1-2" role="tab" data-toggle="tab" aria-selected="false"><?php echo GetLang("Helden Level","Niveau Héroïque"); ?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#tabs-1-3" role="tab" data-toggle="tab" aria-selected="false"><?php echo GetLang("Ruf","Réputation"); ?></a>
							</li>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade active show" id="tabs-1-1">
								<div class="nk-gap"></div>
								<!-- START: tab 1-->   
								<div class="nk-blog-post nk-blog-post-border-bottom">
									<a href="blog-article.html" class="nk-post-img">
										<img src="/news/index/assets/images/Niveau.png">

										<span class="nk-post-categories">
											<span class="bg-main-1">Niveau</span>
										</span>

									</a>
								</div>
								<style>
									#rankings {width:100%;float:left;}
									#rankings #rankings-name {width:100%;float:left;}
									#rankings-name .name-top {float:left;padding:20px;text-transform: uppercase;text-align: center;font-weight: bold;}
									.color-1 {background-color:#dd163b;}
									.color-2 {background-color: #dd163b;}
									.color-3 {background-color:#dd163b;}
									#rankings #rankings-value {width:100%;float:left;}
									#rankings-value .name-value {float:left;padding:20px;text-align: center;}
								</style>
								<div class="nk-match" style="padding:0px;">
									<?php  

									if (isset($Ranking_Failed) || $Ranking_Failed == 0):

										?>
										<div id="rankings">
											<div id="rankings-name">
												<div class="name-top color-1" style="width:15%;">Rang</div>
												<div class="name-top color-1" style="width:35%;"><?php echo GetLang("Benutzername","Pseudonyme"); ?></div>
												<div class="name-top color-1" style="width:25%;">Level</div>
												<div class="name-top color-1" style="width:25%;">EXP</div>
											</div>
											<?php 

											$ci = 0; $cishow = 1; 

											while (!empty($rankinglevel[$ci]['CName'])):

												?>
												<div id="rankings-value" <?php if ($cishow % 2 == 0): ?>style="background-color:#293139;"<?php endif; ?>>
													<div class="name-value" style="width:15%;"><?php echo '#'. $cishow; ?></div>
													<div class="name-value" style="width:35%;"><?php echo $rankinglevel[$ci]['CName'];?></div>
													<div class="name-value" style="width:25%;"><?php echo $rankinglevel[$ci]['CLevel'];?></div>
													<div class="name-value" style="width:25%;"><?php echo $rankinglevel[$ci]['CLevelXp'];?></div>
												</div>
												<?php 

												$ci++; $cishow++; endwhile; 

												?>
											</div>
										<?php endif; ?>
									</div>
									<!-- END: Action Tab -->
									<div class="nk-gap"></div>
								</div>

								<div role="tabpanel" class="tab-pane fade" id="tabs-1-2">
									<div class="nk-gap"></div>

									<!-- START: tab 1-->   
									<div class="nk-blog-post nk-blog-post-border-bottom">
										<a href="blog-article.html" class="nk-post-img">
											<img src="/news/index/assets/images/Heroique.png">

											<span class="nk-post-categories">
												<span class="bg-main-3"><?php echo GetLang("Ruf","Héroïque"); ?></span>
											</span>

										</a>
									</div>
									<div class="nk-match" style="padding:0px;">
										<?php  

										if (isset($Ranking_Failed) || $Ranking_Failed == 0):

											?>
											<div id="rankings">
												<div id="rankings-name">
													<div class="name-top color-3" style="width:15%;">Rang</div>
													<div class="name-top color-3" style="width:35%;"><?php echo GetLang("Benutzername","Pseudonyme"); ?></div>
													<div class="name-top color-3" style="width:25%;"><?php echo GetLang("Helden Level","Niveau Héroïque"); ?></div>
													<div class="name-top color-3" style="width:25%;">EXP</div>
												</div>
												<?php 

												$ci = 0; $cishow = 1; 

												while (!empty($rankinghero[$ci]['CName'])):

													?>
													<div id="rankings-value" <?php if ($cishow % 2 == 0): ?>style="background-color:#293139;"<?php endif; ?>>
														<div class="name-value" style="width:15%;"><?php echo '#'. $cishow; ?></div>
														<div class="name-value" style="width:35%;"><?php echo $rankinghero[$ci]['CName'];?></div>
														<div class="name-value" style="width:25%;"><?php echo $rankinghero[$ci]['CHLevel'];?></div>
														<div class="name-value" style="width:25%;"><?php echo $rankinghero[$ci]['CHExp'];?></div>
													</div>
													<?php 

													$ci++; $cishow++; endwhile; 

													?>
												</div>
											<?php endif; ?>
										</div>

										<!-- END: Action Tab -->
										<div class="nk-gap"></div>
									</div>

									<div role="tabpanel" class="tab-pane fade" id="tabs-1-3">
										<div class="nk-gap"></div>
										<!-- START: MMO Tab -->

										<div class="nk-blog-post nk-blog-post-border-bottom">
											<a href="blog-article.html" class="nk-post-img">
												<img src="/news/index/assets/images/Reputation.png">

												<span class="nk-post-categories">
													<span class="bg-main-4"><?php echo GetLang("Helden Level","Réputation"); ?></span>
												</span>

											</a>
										</div>
										<div class="nk-match" style="padding:0px;">
											<?php  

											if (isset($Ranking_Failed) || $Ranking_Failed == 0):

												?>
												<div id="rankings">
													<div id="rankings-name">
														<div class="name-top color-2" style="width:15%;">Rang</div>
														<div class="name-top color-2" style="width:35%;"><?php echo GetLang("Benutzername","Pseudonyme"); ?></div>
														<div class="name-top color-2" style="width:25%;"><?php echo GetLang("Ruf","Réputation"); ?></div>
														<div class="name-top color-2" style="width:25%;">Level</div>
													</div>
													<?php 

													$ci = 0; $cishow = 1; 

													while (!empty($rankingrep[$ci]['CName'])):

														?>
														<div id="rankings-value" <?php if ($cishow % 2 == 0): ?>style="background-color:#293139;"<?php endif; ?>>
															<div class="name-value" style="width:15%;"><?php echo '#'. $cishow; ?></div>
															<div class="name-value" style="width:35%;"><?php echo $rankingrep[$ci]['CName'];?></div>
															<div class="name-value" style="width:25%;"><?php echo $rankingrep[$ci]['CReput'];?></div>
															<div class="name-value" style="width:25%;"><?php echo $rankingrep[$ci]['CLevel'];?></div>
														</div>
														<?php 

														$ci++; $cishow++; endwhile; 

														?>
													</div>
												<?php endif; ?>
											</div>
											<!-- END: MMO Tab -->
											<div class="nk-gap"></div>
										</div>

									</div>
								</div>
							</div>
							<!-- discord of shit -->
							<div class="col-lg-4">
								<aside style="z-index: 3;">
									<div class="nk-widget nk-widget-highlighted">
										<div class="fb-page" data-href="https://www.facebook.com/DreamTrix-362348924390206" data-width="700" data-height="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"></div>
									</div>
								</aside>
								<aside style="z-index: 2;" class="nk-sidebar nk-sidebar-right nk-sidebar-sticky">
									<div class="nk-widget nk-widget-highlighted">
										<iframe src="https://discordapp.com/widget?id=508727419348189194&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0"></iframe>
									</div>
								</aside>
							</div>
						</div>
					</div>

					<div class="nk-gap-4"></div>
					<?php 

include '../views/_footer.html'; // footer

?>
</div>



<!-- START: Page Background -->

<video class="nk-page-background-top" ng-if="videoSupported &amp;&amp; !browserSize.isMobile &amp;&amp; block.panel.background.providerName == 'sonata.media.provider.file'" ng-attr-poster="{{ block.panel.additionalImage.getUrl() }}" autoplay="true" loop="true" poster="//gf3.geo.gfsrv.net/cdned/4df8ccae9e76628d2bf0ba430b9df5.jpeg" class="" style="">
	<source ng-src="//gf3.geo.gfsrv.net/cdnec/634c26c7c800f5dffded13433ac128.mp4" type="video/mp4" src="//gf3.geo.gfsrv.net/cdnec/634c26c7c800f5dffded13433ac128.mp4">
		Your browser does not support the video format
	</video>
	<img class="nk-page-background-bottom" src="/news/index/assets/images/bg-bottom.png" alt="">

	<!-- END: Page Background -->

	<!-- START: Search Modal -->
	<div class="nk-modal modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="ion-android-close"></span>
					</button>

					<h4 class="mb-0">Search</h4>

					<div class="nk-gap-1"></div>
					<form action="#" class="nk-form nk-form-style-1">
						<input type="text" value="" name="search" class="form-control" placeholder="Type something and press Enter">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Search Modal -->

	<!-- START: Login Modal -->
	<div class="nk-modal modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content" style="width: 390px;margin-left: auto;margin-right: auto;">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="ion-android-close"></span>
					</button>
					<h4 class="mb-0">
						<span class="text-main-1">C</span>ONNEXION</h4>
						<?php if (isset($_SESSION["LOGIN_ERROR"])): ?>
							<div style="width: 100%;padding: 10px;background-color: #d71c3a;border-radius: 4px;margin-top: 20px;color: #fff;"><?php echo $_SESSION["LOGIN_ERROR"]; ?></div>
						<?php endif; ?>
						<div class="nk-gap-1"></div>
						<form name="log_form" id="log_form" class="nk-form text-white" method="post" action="/user/login.php">
							<div class="row vertical-gap">
								<div class="col-md-6" style="flex: 0 0 100%;max-width: 100%;">
									Utilisez un nom d'utilisateur et un mot de passe:
									<div id="login_error" style="display:none;">
										<div class="error_message_wrapper">
											<span class="arrow"> </span>
											<p class="error_message" id="error_message"></p>
										</div>
									</div>

									<div class="nk-gap"></div>
									<input type="text" value="" id="usernameLogin" name="LoginUsername" class="form-control" placeholder="Nom d'utilisateur">

									<div class="nk-gap"></div>
									<input type="password" value="" id="passwordLogin" name="LoginPassword" class="required form-control" placeholder="Mot de passe">
								</div>
							</div>

							<div class="nk-gap-1"></div>
							<div class="row vertical-gap">
								<div class="col-md-6" style="flex: 0 0 100%;max-width: 100%;">
									<button type="submit" id="log-submit" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block" value="Sign In">CONNEXION</button>
									<br>
									<div class="mnt-5" style="flex: 0 0 100%;max-width: 100%;">
										<!--<small><a href="#">Forgot your password?</a></small>-->
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="nk-modal modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content" style="width: 390px;margin-left: auto;margin-right: auto;">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span class="ion-android-close"></span>
						</button>
						<h4 class="mb-0">
							<span class="text-main-1">Créer</span> un compte</h4>
							<div class="nk-gap-1"></div>
							<form action="/user/register.php" class="nk-form text-white" method="post" name="reg" id="reg">
								<div class="row vertical-gap">
									<div class="col-md-6" style="flex: 0 0 100%;max-width: 100%;">
										<span id="create-text">Créer un nouveau compte !</span>
										<?php if (isset($_SESSION["REGISTER_ERROR"])): ?>
											<div style="width: 100%;padding: 10px;background-color: #d71c3a;border-radius: 4px;margin-top: 20px;color: #fff;"><?php echo $_SESSION["REGISTER_ERROR"]; ?></div>
										<?php endif; ?>
										<div class="nk-gap"></div>
										<input type="text" value="" name="username" class=" form-control" placeholder="Nom d'utilisateur">
										<div class="nk-gap"></div>
										<input type="email" value="" name="mail" class=" form-control" placeholder="Email">
										<div class="nk-gap"></div>
										<input type="password" value="" name="password" class="required form-control" placeholder="Mot de passe">
										<div class="nk-gap"></div>
										<input type="password" value="" name="passwordRepeat" class="required form-control" placeholder="Répéter le mot de passe">
										<div style="margin-top: 20px;"> </div>
										<div class="g-recaptcha" data-sitekey="6LcuzJIUAAAAAO-Y9biG3_ZunEAXGR-fhO_HUrl8"></div>
									</div>
								</div>

								<div class="nk-gap-1"></div>
								<div class="row vertical-gap">
									<div class="col-md-6"  style="flex: 0 0 100%;max-width: 100%;">
										<input type="submit" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block" id="reg-submit" value="Rejoignez-nous">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- START: Scripts -->
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/gsap/src/minified/TweenMax.min.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/gsap/src/minified/plugins/ScrollToPlugin.min.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/tether/dist/js/tether.min.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/sticky-kit/dist/sticky-kit.min.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/jarallax/dist/jarallax.min.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/jarallax/dist/jarallax-video.min.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/imagesloaded/imagesloaded.pkgd.min.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/flickity/dist/flickity.pkgd.min.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/photoswipe/dist/photoswipe.min.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/photoswipe/dist/photoswipe-ui-default.min.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/jquery-form/dist/jquery.form.min.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/jquery.countdown/dist/jquery.countdown.min.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/moment/min/moment.min.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/moment-timezone/builds/moment-timezone-with-data.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/hammer.js/hammer.min.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/nanoscroller/bin/javascripts/jquery.nanoscroller.min.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/SoundManager2/script/soundmanager2-nodebug-jsmin.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/summernote/dist/summernote.min.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/plugins/nk-share/nk-share.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/prism/prism.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/js/goodgames.min.js"></script>
			<script src="<?php echo $site['url'] . $site['style']; ?>/js/goodgames-init.js"></script>
			<script src='https://www.google.com/recaptcha/api.js'></script>
			<!-- END: Scripts -->
		</body>
		</html>