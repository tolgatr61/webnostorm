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

$req = $conn->prepare("SELECT * FROM Account WHERE AccountId = ?");
$req->execute([$_SESSION["AccountId"]]);
$result = $req->fetch();
if($result["Authority"] < 2 || empty($_SESSION["AccountId"]) || !isset($_SESSION["AccountId"]))
{
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<!--
Name: GoodGames - Game Portal / Store HTML Template
Version: 1.4.1
Author: nK
Website: https://nkdev.info/
Purchase: https://themeforest.net/item/goodgames-portal-store-html-gaming-template/17704593?ref=_nK
Support: https://nk.ticksy.com/
License: You must have a valid license purchased only from ThemeForest (the above link) in order to legally use the theme for your project.
Copyright 2018.
-->

<html lang="en">
<head>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $site['name']; ?> - Panel Admin</title>
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


<!--
Additional Classes:
.nk-page-boxed
-->
<body>





<!--
Additional Classes:
.nk-header-opaque
-->
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

                        $stmt = $conn->prepare("SELECT cha.Name FROM Character cha WHERE AccountId = ?");
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
                                    <!-- Show that if the authority is > 1 -->
                                    <a href="news/index/adminpanel.php" class="nk-btn nk-btn-rounded nk-btn-color-main-1 nk-btn-hover-color-white" style="float:left;margin-left:-15px;margin-top:5px;">Panel Admin</a>
                                    <!-- Show that if the authority is > 1 -->
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



<!-- START : Navbar -->
<?php 

include '../views/nav.php'; // nav

?>
<!-- END : Navbar -->

</header>



<!--
START: Navbar Mobile

Additional Classes:
.nk-navbar-left-side
.nk-navbar-right-side
.nk-navbar-lg
.nk-navbar-overlay-content
-->
<div id="nk-nav-mobile" class="nk-navbar nk-navbar-side nk-navbar-right-side nk-navbar-overlay-content d-lg-none">
    <div class="nano">
        <div class="nano-content">
            <a href="index.html" class="nk-nav-logo">
                <img src="assets/images/logo.png" alt="" width="120">
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

            <li><span>PANEL ADMIN</span></li>

        </ul>
    </div>
    <div class="nk-gap-1"></div>
    <!-- END: Breadcrumbs -->

    <div class="container">
        <div class="nk-accordion" id="accordion-1" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="accordion-1-1-heading">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion-1" href="#accordion-1-1" aria-expanded="true" aria-controls="accordion-1-1">
                        Information sur le joueur <span class="panel-heading-arrow fa fa-angle-down"></span>
                    </a>
                </div>
                <div id="accordion-1-1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-1-1-heading">
                    <form action="adminpanel.php" method="post" class="nk-form nk-form-style-1">
                        <div class="input-group">
                            <input type="text" name="PlayerName" class="form-control" placeholder="Recherchez un joueur (Character Name)">
                            <button type="submit" class="nk-btn nk-btn-color-main-1">
                                <span class="fa fa-search"></span>
                            </button>
                        </div>
                    </form>
                    <div class="nk-gap-1"></div>
                    <?php
                        if($_POST["PlayerName"]):
                            $req = $conn->prepare("SELECT * FROM Character WHERE Name = ?");
                            $req->execute([$_POST["PlayerName"]]);
                            $CharacterTable = $req->fetch();
                            $req1 = $conn->prepare("SELECT * FROM Account WHERE AccountId = ?");
                            $req1->execute([$CharacterTable["AccountId"]]);
                            $AccountTable = $req1->fetch();
                            $req2 = $conn->prepare("SELECT * FROM CoinsDreamTrix WHERE AccountId = ?");
                            $req2->execute([$CharacterTable["AccountId"]]);
                            $CoinsDreamTrixTable = $req2->fetch();
                    ?>
                        <table class="nk-table">
                            <thead>
                                <tr>
                                    <th colspan="3">Information du joueur <?= $CharacterTable["Name"] ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Account ID</td>
                                    <td><?= $CharacterTable["AccountId"] ?></td>
                                </tr>
                                <tr>
                                    <td>Character ID</td>
                                    <td><?= $CharacterTable["CharacterId"] ?></td>
                                </tr>
                                <tr>
                                    <td>Adresse IP</td>
                                    <td><?= $AccountTable["RegistrationIP"] ?></td>
                                </tr>
                                <tr>
                                    <td>Coins</td>
                                    <td><?= $CoinsDreamTrixTable["Coins"] ?></td>
                                </tr>
                                <tr>
                                    <td>Pseudonyme</td>
                                    <td><?= $CharacterTable["Name"] ?></td>
                                </tr>
                                <tr>
                                    <td>Classe</td>
                                    <td><?= $CharacterTable["Class"] ?></td>
                                </tr>
                                <tr>
                                    <td>Niveau de combat</td>
                                    <td><?= $CharacterTable["Level"] ?></td>
                                </tr>
                                <tr>
                                    <td>Niveau de métier</td>
                                    <td><?= $CharacterTable["JobLevel"] ?></td>
                                </tr>
                                <tr>
                                    <td>Dignité</td>
                                    <td><?= $CharacterTable["Dignity"] ?></td>
                                </tr>
                                <tr>
                                    <td>Réputation</td>
                                    <td><?= $CharacterTable["Reputation"] ?></td>
                                </tr>
                                <tr>
                                    <td>Or</td>
                                    <td><?= $CharacterTable["Gold"] ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="nk-gap-1"></div>
                    <?php
                        endif;
                    ?>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="accordion-1-2-heading">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion-1" href="#accordion-1-2" aria-expanded="true" aria-controls="accordion-1-2">
                        Information sur le NosBazaar <span class="panel-heading-arrow fa fa-angle-down"></span>
                    </a>
                </div>
                <div id="accordion-1-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-1-2-heading">
                    <form action="adminpanel.php" method="post" class="nk-form nk-form-style-1">
                        <div class="input-group">
                            <input type="text" name="PlayerCharacterId" class="form-control" placeholder="Recherchez un joueur (CharacterId)">
                            <button class="nk-btn nk-btn-color-main-1">
                                <span class="fa fa-search"></span>
                            </button>
                        </div>
                    </form>
                    <div class="nk-gap-1"></div>
                    <?php 
                        if($_POST["PlayerCharacterId"]):
                            $req = $conn->prepare("SELECT * FROM Character WHERE CharacterId = ?");
                            $req->execute([$_POST["PlayerCharacterId"]]);
                            $CharacterTable = $req->fetch();
                    ?>
                    <table class="nk-table">
                        <thead>
                            <tr>
                                <th colspan="4">Information du NosBazaar de <?= $CharacterTable["Name"] ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Nom de l'objet</th>
                                <th>Date d'expiration</th>
                                <th>Prix</th>
                                <th>Image</th>
                            </tr>
                            <?php
                                $req1 = $conn->prepare("SELECT * FROM BazaarItem BI INNER JOIN ItemInstance ItemI ON BI.ItemInstanceId = ItemI.Id INNER JOIN Item i ON ItemI.ItemVNum = i.VNum WHERE BI.SellerId = ?");
                                $req1->execute([$_POST["PlayerCharacterId"]]);
                                while($result1 = $req1->fetch()):
                            ?>
                            <tr>
                                <td><?= $result1["Name"] ?></td>
                                <td><?= date('d/m/Y H:i:s',strtotime('+'.$result1["Duration"].'hour', strtotime($result1["DateStart"]))) ?></td>
                                <td><?= $result1["Price"] ?></td>
                                <td><img src="assets/images/item<?= $result1["VNum"] ?>.png"></td>
                            </tr>
                            <?php
                                endwhile;
                            ?>
                        </tbody>
                    </table>
                    <div class="nk-gap-1"></div>
                    <?php 
                        endif;
                    ?>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="accordion-1-3-heading">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion-1" href="#accordion-1-3" aria-expanded="true" aria-controls="accordion-1-3">
                        Gestionnaire de coins <span class="panel-heading-arrow fa fa-angle-down"></span>
                    </a>
                </div>
                <div id="accordion-1-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-1-3-heading">
                    <form method="POST" action="PlayerCoins.php" class="nk-form">
                        <div class="row vertical-gap">
                            <div class="col-lg-6">

                                <label for="lname">AccountId du joueur<span class="text-main-2"></span></label>
                                <input type="text" class="form-control required" name="AccountId" id="lname">

                                <div class="nk-gap-1"></div>
                                <label for="company">Ajouter des coins</label>
                                <input type="text" class="form-control" name="AddCoins" id="company">

                                <div class="nk-gap-1"></div>
                                <label for="company">Retirer des coins</label>
                                <input type="text" class="form-control" name="RemoveCoins" id="company">
                                <div class="nk-gap-1"></div>
                                <button type="submit" class="nk-btn nk-btn-xs nk-btn-rounded nk-btn-color-white">Appliquer</button>
                            </div>
                        </div>
                        <div class="nk-gap-2"></div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <!-- START: Footer -->
    <div class="nk-gap-6"></div>
    <div class="nk-gap-6"></div>
    <div class="nk-gap-3"></div>
    <?php 

include '../views/_footer.html'; // footer

?>
</div>
<!-- END: Footer -->


</div>




<!-- START: Page Background -->

<img class="nk-page-background-top" src="assets/images/bg-top.png" alt="">
<img class="nk-page-background-bottom" src="assets/images/bg-bottom.png" alt="">

<!-- END: Page Background -->

<!-- START: Scripts -->

<!-- Object Fit Polyfill -->
<script src="assets/vendor/object-fit-images/dist/ofi.min.js"></script>

<!-- GSAP -->
<script src="assets/vendor/gsap/src/minified/TweenMax.min.js"></script>
<script src="assets/vendor/gsap/src/minified/plugins/ScrollToPlugin.min.js"></script>

<!-- Popper -->
<script src="assets/vendor/popper.js/dist/umd/popper.min.js"></script>

<!-- Bootstrap -->
<script src="assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Sticky Kit -->
<script src="assets/vendor/sticky-kit/dist/sticky-kit.min.js"></script>

<!-- Jarallax -->
<script src="assets/vendor/jarallax/dist/jarallax.min.js"></script>
<script src="assets/vendor/jarallax/dist/jarallax-video.min.js"></script>

<!-- imagesLoaded -->
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>

<!-- Flickity -->
<script src="assets/vendor/flickity/dist/flickity.pkgd.min.js"></script>

<!-- Photoswipe -->
<script src="assets/vendor/photoswipe/dist/photoswipe.min.js"></script>
<script src="assets/vendor/photoswipe/dist/photoswipe-ui-default.min.js"></script>

<!-- Jquery Validation -->
<script src="assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>

<!-- Jquery Countdown + Moment -->
<script src="assets/vendor/jquery-countdown/dist/jquery.countdown.min.js"></script>
<script src="assets/vendor/moment/min/moment.min.js"></script>
<script src="assets/vendor/moment-timezone/builds/moment-timezone-with-data.min.js"></script>

<!-- Hammer.js -->
<script src="assets/vendor/hammerjs/hammer.min.js"></script>

<!-- NanoSroller -->
<script src="assets/vendor/nanoscroller/bin/javascripts/jquery.nanoscroller.js"></script>

<!-- SoundManager2 -->
<script src="assets/vendor/soundmanager2/script/soundmanager2-nodebug-jsmin.js"></script>

<!-- Seiyria Bootstrap Slider -->
<script src="assets/vendor/bootstrap-slider/dist/bootstrap-slider.min.js"></script>

<!-- Summernote -->
<script src="assets/vendor/summernote/dist/summernote-bs4.min.js"></script>

<!-- nK Share -->
<script src="assets/plugins/nk-share/nk-share.js"></script>

<!-- GoodGames -->
<script src="assets/js/goodgames.min.js"></script>
<script src="assets/js/goodgames-init.js"></script>
<!-- END: Scripts -->



</body>
</html>
