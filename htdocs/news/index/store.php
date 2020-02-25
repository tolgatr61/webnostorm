<?php 
session_start();
if(!isset($_SESSION["User"]) || empty($_SESSION["User"]))
{
    header("Location: /index");
}
if(!isset($_GET['CategoriesId']) && empty($_GET['CategoriesId']))
{
    header('Location: /news/index/store.php?CategoriesId=0');
}
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
    <title><?php echo $site['name']; ?> - Boutique</title>
    <meta name="description" content="<?php echo $site['name']; ?> - est un serveur privé Nostale ayant le but de vous fournir un contenu inédit qu'aucun autre serveur ne vous l'a offert.">
    <meta name="keywords" content="game, gaming, template, HTML template, responsive, Bootstrap, premium">
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
                            <li>
                                <?php
                                $req = $conn->prepare("SELECT * FROM ShoppingCartDreamTrix WHERE AccountId = ?");
                                $req->execute([$_SESSION["AccountId"]]);
                                $CartValues = $req->fetchAll();
                                ?>
                                <span class="nk-cart-toggle">
                                    <span class="fa fa-shopping-cart"></span>
                                    <span class="nk-badge"><?= count($CartValues); ?></span>
                                </span>

                                <div class="nk-cart-dropdown">
                                    <?php
                                    $req = $conn->prepare("SELECT * FROM ShoppingCartDreamTrix WHERE AccountId = ?");
                                    $req->execute([$_SESSION["AccountId"]]);
                                    $req1 =  $conn->prepare("SELECT * FROM Item WHERE VNum = ?");
                                    $req2 =  $conn->prepare("SELECT * FROM ShoppingCartDreamTrix WHERE Amount = ?");
                                    $req3 = $conn->prepare("SELECT * FROM Character WHERE CharacterId = ?");
                                    while($result = $req->fetch()):
                                        $req1->execute([$result["VNum"]]);
                                        $result1 = $req1->fetch();
                                        $req2->execute([$result["Amount"]]);
                                        $result2 = $req2->fetch();
                                        $req3->execute([$result["CharacterId"]]);
                                        $result3 = $req3->fetch();
                                        ?>
                                        <div class="nk-widget-post">
                                            <a href="store-product.php" class="nk-post-image">
                                                <img src="<?= $result["Image"]; ?>">
                                            </a>
                                            <h3 class="nk-post-title">
                                                <a href="deleteshoppingcartproduct.php?CartId=<?= $result["CartId"] ?>&Price=<?= $result["Price"]; ?>" class="nk-cart-remove-item"><span class="ion-android-close"></span></a>
                                                <a href="store-product.php"><?= $result1["Name"]; ?></a>
                                            </h3>
                                            <h3 class="nk-post-title">
                                                <a href="store-product.php">Montant : <?= $result2["Amount"]; ?></a>
                                            </h3>
                                            <div class="nk-gap-1"></div>
                                            <h3 class="nk-post-title">
                                                <a href="store-product.php">Personnage : <?= $result3["Name"]; ?></a>
                                            </h3>
                                            <div class="nk-gap-1"></div>
                                            <h3 class="nk-post-title">
                                                <a href="#">Prix : <?= $result["TotalPrice"]; ?></a>
                                            </h3>
                                        </div>
                                        <?php
                                    endwhile; 
                                    ?>
                                    <div>
                                        <div class="nk-gap-1"></div>
                                        <?php
                                        if(count($CartValues > 0)):
                                            ?>
                                            <div class="text-center">
                                                <div class="nk-product-price">Prix total : <?= $_SESSION["TotalPrice"]; ?></div>
                                            </div>
                                            <div class="nk-gap-2"></div>
                                            <div class="text-center">
                                                <a href="store-checkout.php" class="nk-btn nk-btn-rounded nk-btn-color-main-1 nk-btn-hover-color-white">Passer au paiement</a>
                                            </div>
                                            <?php
                                        else:
                                            unset($_SESSION["TotalPrice"]);
                                        endif;
                                        ?>
                                    </div>
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
            		<li><span>Boutique</span></li>
            	</ul>
            	<?php if(isset($_SESSION["ErrorCart"]) || !empty($_SESSION["ErrorCart"])): ?>
            	<div class="nk-gap-1"></div>
            	<div class="nk-info-box text-info">
            		<div class="nk-info-box-icon">
            			<i class="ion-information"></i>
            		</div>
            		<div class="nk-info-box-close nk-info-box-close-btn">
            			<i class="ion-close-round"></i>
            		</div>
            		<h3>Ton panier est vide !</h3>
            		<em><?= $_SESSION["ErrorCart"]; ?></em>
            		<div class="nk-gap-1"></div>
            		<a href="store.php" class="nk-btn nk-btn-rounded nk-btn-color-info">
            			<span>Boutique</span>
            			<span class="icon"><i class="ion-help-circled"></i></span>
            		</a>
            	</div>
            	<?php
            	unset($_SESSION["ErrorCart"]);
            endif;
            ?>
        </div>
            <div class="nk-gap-1"></div>
            <div class="container">
            <?php 
            if(!empty($_SESSION["Success"]) || isset($_SESSION["Success"])):
                ?>
            <div class="nk-info-box text-success">
                <div class="nk-info-box-icon">
                    <i class="ion-checkmark-round"></i>
                </div>
                <h3>Succès !</h3>
                <em><?= $_SESSION["Success"]; ?></em>
            </div>
                <?php
                unset($_SESSION["Success"]);
                endif;
            if(!empty($_SESSION["Error"]) || isset($_SESSION["Error"])):
                ?>
                <div class="nk-info-box text-danger">
                    <div class="nk-info-box-icon">
                        <i class="ion-close-round"></i>
                    </div>
                    <h3>Erreur !</h3>
                    <em><?= $_SESSION["Error"]; ?></em>
                </div>
                <?php
                unset($_SESSION["Error"]);
            endif; 
            ?>
            	<!-- START: Some Products -->
            	<div class="nk-gap-2"></div>
            	<div class="row vertical-gap">
                    <div class="col-md-6 col-lg-4">
                			<div class="nk-gallery-item-box">
                				<a class="nk-gallery-item">
                					<span class="nk-gallery-item-overlay"><span><span class="nk-icon-circles"></span></span></span>
                					<img src="assets/images/PSD_Partenaire.jpg" alt="She was bouncing">
                				</a>
                				<div class="nk-gallery-item-label">
                					<h4 class="mb-0">Pack partenaire</h4>
                				</div>
                			</div>
                			<select id="SelectPerso1" class="form-control">
                				<option value="" disabled selected>Personnage</option>
                				<?php 
                				$req = $conn->prepare("SELECT * FROM Character WHERE AccountId = ?");
                				$req->execute([$_SESSION["AccountId"]]);
                				while($result1 = $req->fetch()):
                					?>
                					<option value="<?= $result1["CharacterId"] ?>"><?= $result1["Name"] ?></option>
                				<?php endwhile; ?>
                			</select>
                            <?php
                                $req = $conn->prepare("SELECT * FROM VerificationPackDreamTrix WHERE PackId = ?");
                                $req->execute([1]);
                                if(count($req->fetchAll()) > 0):
                            ?>
                                <button style="display: flex; align-items: center; justify-content: center; width: 350px;" class="nk-btn nk-btn-rounded nk-btn-color-main-1 disabled">Déjà récupéré</button>
                            <?php
                                else:
                            ?>
                                    <button id="Pack1" style="display: flex; align-items: center; justify-content: center; width: 350px;" class="nk-btn nk-btn-rounded nk-btn-color-main-1">Récupérer</button>
                            <?php
                                endif;
                            ?>
                    </div>  
            		<div class="col-md-12 col-lg-4">
            			<div class="row vertical-gap">
            				<div class="col-md-6">
                					<div class="nk-gallery-item-box">
                						<a class="nk-gallery-item">
                							<span class="nk-gallery-item-overlay"><span><span class="nk-icon-circles"></span></span></span>
                							<img src="assets/images/PSD_Amélioration.jpg" alt="It was some time before">
                						</a>
                						<div class="nk-gallery-item-label2">
                							<h6 class="mb-0">Pack amélioration</h6>
                						</div>
                					</div>
                					<select id="SelectPerso2" class="form-control">
                						<option value="" disabled selected>Personnage</option>
                						<?php 
                    						$req = $conn->prepare("SELECT * FROM Character WHERE AccountId = ?");
                    						$req->execute([$_SESSION["AccountId"]]);
                    						while($result1 = $req->fetch()):
                						?>
                							<option value="<?= $result1["CharacterId"] ?>"><?= $result1["Name"] ?></option>
                						<?php endwhile; ?>
                					</select>
                                    <?php
                                        $req = $conn->prepare("SELECT * FROM VerificationPackDreamTrix WHERE PackId = ?");
                                        $req->execute([2]);
                                        if(count($req->fetchAll()) > 0):
                                    ?>
                                        <button style="display: flex; align-items: center; justify-content: center; width: 160px;" class="nk-btn nk-btn-rounded nk-btn-color-main-1 disabled">Déjà récupéré</button>
                                    <?php
                                        else:
                                    ?>
                                            <button id="Pack2" type="submit" style="display: flex; align-items: center; justify-content: center; width: 160px;" class="nk-btn nk-btn-rounded nk-btn-color-main-1">Récupérer</button>
                                    <?php
                                        endif;
                                    ?>
            				</div>
            				<div class="col-md-6">
                					<div class="nk-gallery-item-box">
                						<a class="nk-gallery-item">
                							<span class="nk-gallery-item-overlay"><span><span class="nk-icon-circles"></span></span></span>
                							<img src="assets/images/PSD_Hasard.jpg" alt="So saying he unbuckled">
                						</a>
                						<div class="nk-gallery-item-label2">
                							<h6 class="mb-0">Pack chanceux</h6>
                						</div>
                					</div>
                					<select id="SelectPerso3" class="form-control">
                						<option value="" disabled selected>Personnage</option>
                						<?php 
                						$req = $conn->prepare("SELECT * FROM Character WHERE AccountId = ?");
                						$req->execute([$_SESSION["AccountId"]]);
                						while($result1 = $req->fetch()):
                							?>
                							<option value="<?= $result1["CharacterId"] ?>"><?= $result1["Name"] ?></option>
                						<?php endwhile; ?>
                					</select>
                                    <?php
                                        $req = $conn->prepare("SELECT * FROM VerificationPackDreamTrix WHERE PackId = ?");
                                        $req->execute([3]);
                                        if(count($req->fetchAll()) > 0):
                                    ?>
                                        <button style="display: flex; align-items: center; justify-content: center; width: 160px;" class="nk-btn nk-btn-rounded nk-btn-color-main-1 disabled">Déjà récupéré</button>
                                    <?php
                                        else:
                                    ?>
                                            <button id="Pack3" type="submit" style="display: flex; align-items: center; justify-content: center; width: 160px;" class="nk-btn nk-btn-rounded nk-btn-color-main-1">Récupérer</button>
                                    <?php
                                        endif;
                                    ?>
            				</div>
            				<div class="col-md-6">
                					<div class="nk-gallery-item-box">
                						<a class="nk-gallery-item">
                							<span class="nk-gallery-item-overlay"><span><span class="nk-icon-circles"></span></span></span>
                							<img src="assets/images/PSD_Renforcement.jpg" alt="In all revolutions of">
                						</a>
                						<div class="nk-gallery-item-label2">
                							<h6 class="mb-0">Pack renforcement</h6>
                						</div>
                					</div>
                					<select id="SelectPerso4" class="form-control">
                						<option value="" disabled selected>Personnage</option>
                						<?php 
                						$req = $conn->prepare("SELECT * FROM Character WHERE AccountId = ?");
                						$req->execute([$_SESSION["AccountId"]]);
                						while($result1 = $req->fetch()):
                							?>
                							<option value="<?= $result1["CharacterId"] ?>"><?= $result1["Name"] ?></option>
                						<?php endwhile; ?>
                					</select>
                                    <?php
                                        $req = $conn->prepare("SELECT * FROM VerificationPackDreamTrix WHERE PackId = ?");
                                        $req->execute([4]);
                                        if(count($req->fetchAll()) > 0):
                                    ?>
                                        <button style="display: flex; align-items: center; justify-content: center; width: 160px;" class="nk-btn nk-btn-rounded nk-btn-color-main-1 disabled">Déjà récupéré</button>
                                    <?php
                                        else:
                                    ?>
                                            <button id="Pack4" type="submit" style="display: flex; align-items: center; justify-content: center; width: 160px;" class="nk-btn nk-btn-rounded nk-btn-color-main-1">Récupérer</button>
                                    <?php
                                        endif;
                                    ?>
            				</div>
            				<div class="col-md-6">
                					<div class="nk-gallery-item-box">
                						<a href="#" class="nk-gallery-item">
                							<span class="nk-gallery-item-overlay"><span><span class="nk-icon-circles"></span></span></span>
                							<img src="assets/images/PSD_Stockage.jpg" alt="Just then her head ">
                						</a>
                						<div class="nk-gallery-item-label2">
                							<h6 class="mb-0">Pack stockage</h6>
                						</div>
                					</div>
                					<select id="SelectPerso5" class="form-control">
                						<option value="" disabled selected>Personnage</option>
                						<?php 
                						$req = $conn->prepare("SELECT * FROM Character WHERE AccountId = ?");
                						$req->execute([$_SESSION["AccountId"]]);
                						$CharacterId = 0;
                						while($result1 = $req->fetch()):
                							?>
                							<option value="<?= $result1["CharacterId"] ?>"><?= $result1["Name"] ?></option>
                						<?php endwhile; ?>
                					</select>
                                    <?php
                                        $req = $conn->prepare("SELECT * FROM VerificationPackDreamTrix WHERE PackId = ?");
                                        $req->execute([5]);
                                        if(count($req->fetchAll()) > 0):
                                    ?>
                                        <button href="#" style="display: flex; align-items: center; justify-content: center; width: 160px;" class="nk-btn nk-btn-rounded nk-btn-color-main-1 disabled">Déjà récupéré</button>
                                    <?php
                                        else:
                                    ?>
                                            <button id="Pack5" type="submit" style="display: flex; align-items: center; justify-content: center; width: 160px;" class="nk-btn nk-btn-rounded nk-btn-color-main-1">Récupérer</button>
                                    <?php
                                        endif;
                                    ?>
            				</div>
            			</div>
            		</div>
            		<div class="col-md-6 col-lg-4 order-lg-3">
                			<div class="nk-gallery-item-box">
                				<a href="#" class="nk-gallery-item">
                					<span class="nk-gallery-item-overlay"><span><span class="nk-icon-circles"></span></span></span>
                					<img src="assets/images/PSD_Familier.jpg" alt="However, I have reason">
                				</a>
                				<div class="nk-gallery-item-label">
                					<h4 class="mb-0">Pack familier</h4>
                				</div>
                			</div>
                			<select id="SelectPerso6" class="form-control">
                				<option value="" disabled selected>Personnage</option>
                				<?php 
                				$req = $conn->prepare("SELECT * FROM Character WHERE AccountId = ?");
                				$req->execute([$_SESSION["AccountId"]]);
                				$CharacterId = 0;
                				while($result1 = $req->fetch()):
                					?>
                					<option value="<?= $result1["CharacterId"] ?>"><?= $result1["Name"] ?></option>
                				<?php endwhile; ?>
                			</select>
                            <?php
                                $req = $conn->prepare("SELECT * FROM VerificationPackDreamTrix WHERE PackId = ?");
                                $req->execute([6]);
                                if(count($req->fetchAll()) > 0):
                            ?>
                                <button href="#" style="display: flex; align-items: center; justify-content: center; width: 350px;" class="nk-btn nk-btn-rounded nk-btn-color-main-1 disabled">Déjà récupéré</button>
                            <?php
                                else:
                            ?>
                                    <button id="Pack6" type="submit" style="display: flex; align-items: center; justify-content: center; width: 350px;" class="nk-btn nk-btn-rounded nk-btn-color-main-1">Récupérer</button>
                            <?php
                                endif;
                            ?>
            		</div>
            	</div>
            	<!-- END: Some Products -->
            </div>
            <!-- END: Breadcrumbs -->
            <div class="container">
                <div class="nk-gap-3"></div>
                <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Top 10</span> Meilleures ventes</span></h3>
                <div class="nk-gap"></div>
                <div class="nk-carousel nk-carousel-x4" data-autoplay="5000" data-dots="false" data-cell-align="left" data-arrows="true">
                    <div class="nk-carousel-inner">
                        <?php
                        if(empty($_GET["SecondCategoriesId"]))
                        {
                            $req = $conn->prepare("SELECT TOP 10 r.Image, r.VNum, r.Amount, r.Price, r.ProductId, b.Name FROM NosmallItemDreamTrix r INNER JOIN Item b ON r.VNum = b.VNum WHERE r.CategoriesId = ? ORDER BY Number_p DESC");
                            $req->execute([$_GET["CategoriesId"]]);
                        }
                        else
                        {
                            $req = $conn->prepare("SELECT TOP 10 r.Image, r.VNum, r.Amount, r.Price, r.ProductId, b.Name FROM NosmallItemDreamTrix r INNER JOIN Item b ON r.VNum = b.VNum WHERE r.CategoriesId = ? AND SecondCategoriesId = ? ORDER BY Number_p DESC");
                            $req->execute([$_GET["CategoriesId"], $_GET["SecondCategoriesId"]]);
                        }
                        ?>
                        <?php while($test = $req->fetch()): ?>
                            <div><div class="pl-5 pr-5">
                                <div class="nk-product-cat-3">
                                    <a class="nk-product-image" href="store-product.php?ProductId=<?= $test['ProductId'] ?>&ProductVNum=<?= $test['VNum'] ?>">
                                        <img src="<?= $test['Image'] ?>">
                                    </a>
                                    <div class="nk-product-cont">
                                        <div class="nk-gap-1"></div>
                                        <h3 class="nk-product-title h5"><a href="store-product.php?ProductId=<?= $test['ProductId'] ?>&ProductVNum=<?= $test['VNum'] ?>"><?= $test['Name'] ?></a></h3>
                                        <div class="nk-gap-1"></div>
                                        <div class="nk-product-price"><?= $test['Price'] ?> coins</div>
                                    </div>
                                </div>
                            </div></div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <!-- START: Featured Games -->
                <div class="nk-gap-3"></div>
                <h3 class="nk-decorated-h-2"><span><span class="text-main-1"></span>Ventes</span></h3>
                <div class="nk-gap"></div>
                <div class="row vertical-gap">
                    <?php
                    if(empty($_GET["SecondCategoriesId"]))
                    {
                        $req = $conn->prepare("SELECT r.Image, r.Description, r.VNum, r.Amount, r.Price, r.ProductId, b.Name FROM NosmallItemDreamTrix r INNER JOIN Item b ON r.VNum = b.VNum WHERE CategoriesId = ?");
                        $req->execute([$_GET["CategoriesId"]]);
                    }
                    else
                    {
                        $req = $conn->prepare("SELECT r.Image, r.Description, r.VNum, r.Amount, r.Price, r.ProductId, b.Name FROM NosmallItemDreamTrix r INNER JOIN Item b ON r.VNum = b.VNum WHERE CategoriesId = ? AND SecondCategoriesId = ?");
                        $req->execute([$_GET["CategoriesId"], $_GET["SecondCategoriesId"]]);
                    }
                    ?>
                    <?php while($test = $req->fetch()): ?>
                        <div class="col-lg-6">
                            <div class="nk-product-cat-2">
                                <a class="nk-product-image" href="store-product.php?ProductId=<?= $test['ProductId'] ?>&ProductVNum=<?= $test['VNum'] ?>">
                                    <img src="<?= $test['Image'] ?>">
                                </a>
                                <div class="nk-product-cont">
                                    <h3 class="nk-product-title h5"><a href="store-product.php?ProductId=<?= $test['ProductId'] ?>&ProductVNum=<?= $test['VNum'] ?>"><?= $test['Name'] ?></a></h3>
                                    <div class="nk-gap-1"></div>
                                    <div class="nk-product-rating" data-rating="5"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                    <div class="nk-gap-1"></div>
                                    <?= $test['Description'] ?>
                                    <div class="nk-gap-2"></div>
                                    <div class="nk-product-price"><?= $test['Price'] ?> coins</div>
                                    <div class="nk-gap-1"></div>
                                    <a href="store-product.php?ProductId=<?= $test['ProductId'] ?>&ProductVNum=<?= $test['VNum'] ?>" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Fiche descriptive</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <!-- END: Featured Games -->
            </div>
            <div class="nk-gap-2"></div>
            <div class="nk-gap-2"></div>
            <div class="nk-gap-2"></div>
            <div class="nk-gap-2"></div>
            <div class="nk-gap-2"></div>

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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

        <!-- GoodGames -->
        <script src="assets/js/goodgames.min.js"></script>
        <script src="assets/js/goodgames-init.js"></script>
        <!-- END: Scripts -->
        <script type="text/javascript">
                $("#Pack1").on('click', function() {
                    if($("#SelectPerso1 option:selected").val() === ""){ 
                        alert("Le champ character ne peut pas être null !");
                        return;
                    }

                    var data = {
                        "PackId": 1,
                        "CharacterId": $("#SelectPerso1 :selected").val()
                    };

                    $.ajax({
                        type: "POST",
                        url: 'sendpack.php',
                        data: data,
                        success: function() {
                            location.reload(true);
                        }
                    });
                });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#Pack2").on('click', function() {
                    if($("#SelectPerso2 option:selected").val() === ""){ 
                        alert("Le champ character ne peut pas être null !");
                        return;
                    }

                    var data = {
                        "PackId": 2,
                        "CharacterId": $("#SelectPerso2 :selected").val()
                    };

                    $.ajax({
                        type: "POST",
                        url: 'pack.php',
                        data: data,
                        success: function() {
                            location.reload(true);
                        }
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#Pack3").on('click', function() {
                    if($("#SelectPerso3 option:selected").val() === ""){ 
                        alert("Le champ character ne peut pas être null !");
                        return;
                    }

                    var data = {
                        "PackId": 3,
                        "CharacterId": $("#SelectPerso3 :selected").val()
                    };

                    $.ajax({
                        type: "POST",
                        url: 'pack.php',
                        data: data,
                        success: function() {
                            location.reload(true);
                        }
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#Pack4").on('click', function() {
                    if($("#SelectPerso4 option:selected").val() === ""){ 
                        alert("Le champ character ne peut pas être null !");
                        return;
                    }

                    var data = {
                        "PackId": 4,
                        "CharacterId": $("#SelectPerso4 :selected").val()
                    };

                    $.ajax({
                        type: "POST",
                        url: 'pack.php',
                        data: data,
                        success: function() {
                            location.reload(true);
                        }
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#Pack5").on('click', function() {
                    if($("#SelectPerso5 option:selected").val() === ""){ 
                        alert("Le champ character ne peut pas être null !");
                        return;
                    }

                    var data = {
                        "PackId": 5,
                        "CharacterId": $("#SelectPerso5 :selected").val()
                    };

                    $.ajax({
                        type: "POST",
                        url: 'pack.php',
                        data: data,
                        success: function() {
                            location.reload(true);
                        }
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#Pack6").on('click', function() {
                    if($("#SelectPerso6 option:selected").val() === ""){ 
                        alert("Le champ character ne peut pas être null !");
                        return;
                    }

                    var data = {
                        "PackId": 6,
                        "CharacterId": $("#SelectPerso6 :selected").val()
                    };

                    $.ajax({
                        type: "POST",
                        url: 'pack.php',
                        data: data,
                        success: function() {
                            location.reload(true);
                        }
                    });
                });
            });
        </script>
    </body>
    </html>