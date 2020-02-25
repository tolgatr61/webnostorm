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
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $site['name']; ?> - Paypal</title>
	<meta name="description" content="<?php echo $site['name']; ?> - est un serveur privé Nostale ayant le but de vous fournir un contenu inédit qu'aucun autre serveur ne vous l'a offert.">
	<meta name="keywords" content="nostale, nostale serveur privé">
	<meta name="author" content="_nK">
	<link rel="icon" type="image/png" href="assets/images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- START: Styles -->
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
	<script src="https://www.paypalobjects.com/api/checkout.js"></script>
	<!-- call/:scripts -->
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
							<li>
								<span class="nk-cart-toggle">
									<span class="fa fa-shopping-cart"></span>
									<span class="nk-badge">2</span>
								</span>
								<div class="nk-cart-dropdown">

									<div class="nk-widget-post">
										<a href="#" class="nk-post-image">
											<img src="assets/images/product-5-xs.jpg" alt="In all revolutions of">
										</a>
										<h3 class="nk-post-title">
											<a href="#" class="nk-cart-remove-item"><span class="ion-android-close"></span></a>
											<a href="#">{itemname}</a>
										</h3>
										<div class="nk-gap-1"></div>
										<div class="nk-product-price">{price}</div>
									</div>

									<div class="nk-widget-post">
										<a href="#" class="nk-post-image">
											<img src="assets/images/product-7-xs.jpg" alt="With what mingled joy">
										</a>
										<h3 class="nk-post-title">
											<a href="#" class="nk-cart-remove-item"><span class="ion-android-close"></span></a>
											<a href="#">{itemname}</a>
										</h3>
										<div class="nk-gap-1"></div>
										<div class="nk-product-price">{price}</div>
									</div>

									<div>
										<div class="nk-gap-1"></div>
										<div class="text-center">
											<div class="nk-product-price">{totalprice}</div>
										</div>

										<div class="nk-gap-2"></div>
										<div class="text-center">
											<a href="store-checkout.php" class="nk-btn nk-btn-rounded nk-btn-color-main-1 nk-btn-hover-color-white">Passer au paiement</a>
										</div>
									</div>
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
												<img src="/images/nm_ucp/probild/<?php echo LoadUserImage($lsu_Account_Profilbild); ?>.jpg" style="border-radius:4px;">
											</diV>
											<h3 class="nk-post-title" style="margin-left:-15px;margin-top:10px;margin-bottom:10px;">Bonjour, <username-color><?php echo $_SESSION["User"]; ?></username-color>.</h3>
											<h3 class="nk-post-title" style="margin-left:-15px;margin-top:10px;margin-bottom:10px;">Tu as : <?= $result["Coins"] ?> coins.</h3>
											<a href="/profile/<?php echo $myUser['Name']; ?>" class="nk-btn nk-btn-rounded nk-btn-color-main-1 nk-btn-hover-color-white" style="float:left;margin-left:-15px;margin-top:5px;">voir profil</a>
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

			<!-- START: Breadcrumbs -->
			<div class="nk-gap-1"></div>
			<div class="container">
				<ul class="nk-breadcrumbs">
					<li><a href="/index">Accueil</a></li>
					<li><span class="fa fa-angle-right"></span></li>
					<li><a href="store-catalog-alt.php">Achat Coins</a></li>
					<li><span class="fa fa-angle-right"></span></li>
					<li><span>Achat de coins</span></li>
				</ul>

				<div class="nk-gap-1"></div>
				<div class="row vertical-gap">
					<?php 
						$req = $conn->query("SELECT * FROM BuyCoinsDreamTrix");
						while($result = $req->fetch()):
					?>
						<div class="col-lg-6">
							<div class="nk-product-cat-2">
								<a class="nk-product-image" href="#">
									<img src="assets/images/coins.jpg" alt="However, I have reason"> <!-- Here, you need to add an global image for all the coins -->
								</a>
								<div class="nk-product-cont">
									<h3 class="nk-product-title h5"><a href="#"><?= $result["Coins"]; ?> coins</a></h3>
									<div class="nk-gap-1"></div>
									<div class="nk-product-rating" data-rating="5"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
									<div class="nk-gap-1"></div>
									<?= $result["Description"]; ?>
									<div class="nk-gap-2"></div>
									<div class="nk-product-price"><?= $result["Price"]; ?> €</div>
									<div class="nk-gap-1"></div>
								    <div id="paypal-button-<?= $result["CoinsId"] ?>">
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
		<!-- END: Products -->

		<!-- START: Pagination -->
		<div class="nk-gap-3"></div>
		<!-- END: Pagination -->
	</div>
	<div class="nk-gap-2"></div>
	<div class="nk-gap-2"></div>
	<div class="nk-gap-2"></div>
	<div class="nk-gap-2"></div>
	<div class="nk-gap-1"></div>
	<!-- START: Footer -->
	<?php 

include '../views/_footer.html'; // footer

?>
<!-- END: Footer -->
</div>
<!-- START: Page Background -->
<img class="nk-page-background-top" src="assets/images/bg-top-4.png" alt="">
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
					<input type="text" value="" name="search" class="form-control" placeholder="Type something and press Enter" autofocus>
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
		<!-- END: Login Modal -->
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
		<script src="<?php echo $site['url'] . $site['style']; ?>/bower_components/jquery/dist/jquery.min.js"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<?php
			$req2 = $conn->query("SELECT * FROM BuyCoinsDreamTrix");
			while($result1 = $req2->fetch())
			{
				echo "<script>
					$(document).ready(function() {
						paypal.Button.render({
							env: 'sandbox', // sandbox | production
							client: {
        						sandbox:    'CLE SANDBOX',
        						production: '<insert production client id>' // METS TA CLE PROD ICI
    						},
    						commit: true,

							payment: function (data, actions) {
					            return actions.payment.create({
					                payment: {
					                    transactions: [
					                        {
					                            amount: { total: '".$result1["Price"]."', currency: 'EUR' }
					                        }
					                    ]
					                }
					            });
							},
							onAuthorize: function (data, actions) {
								return actions.payment.execute().then(function(){
									$.ajax({
										type: 'POST',
										url: 'paypalauthorize.php',
										data: {
											paymentID: data.paymentID,
											token: data.paymentToken,
											payerID: data.payerID,
											Price: '".$result1["Price"]."'
										},
										success: function(response) {
											alert(response);
										}
									});
								});
							},
							onCancel: function (data, actions) {
								return alert('Paiement annulé');
							},
							onError: function (error) {
								return alert(error);
							}
						}, '#paypal-button-".$result1["CoinsId"]."');
					});
				</script>";
			}
		?>
		<!-- END: Scripts -->
	</body>
	</html>