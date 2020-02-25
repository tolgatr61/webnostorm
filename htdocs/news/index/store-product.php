<?php 

session_start();
setlocale(LC_TIME, 'de_DE'); 

if(!isset($_SESSION["User"]) || empty($_SESSION["User"]))
{
    header("Location: /index");
}
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

if(!isset($_GET["ProductId"]) || empty($_GET["ProductId"]) || !isset($_GET["ProductVNum"]) || empty($_GET["ProductVNum"]))
{
    header("Location: store.php");
}

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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php 
    $req = $conn->prepare("SELECT * FROM NosmallItemDreamTrix r INNER JOIN Item i ON r.VNum = i.VNum WHERE r.VNum = ?");
    $req->execute([$_GET["ProductVNum"]]);
    $result = $req->fetch();
    ?>
    <title><?php echo $site['name']; ?> - <?= $result['Name']; ?></title>
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


<!--
Additional Classes:
.nk-page-boxed
-->
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
                                                <a href="store-product.php">Amount : <?= $result2["Amount"]; ?></a>
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
                    <?php 
                    $req = $conn->prepare("SELECT * FROM NosmallItemDreamTrix r INNER JOIN Item i ON r.VNum = i.VNum WHERE r.VNum = ?");
                    $req->execute([$_GET["ProductVNum"]]);
                    $result = $req->fetch();
                    ?>
                    <li><a href="/index">Accueil</a></li>
                    <li><span class="fa fa-angle-right"></span></li>
                    <li><a href="store.php">Magasin</a></li>
                    <li><span class="fa fa-angle-right"></span></li>
                    <li><a href="#"><?= $result["Name"] ?></a></li>
                    <li><span class="fa fa-angle-right"></span></li>
                    <li><span><?= $result["Name"] ?></span></li>
                </ul>
            </div>
            <div class="nk-gap-1"></div>
            <!-- END: Breadcrumbs -->
            <div class="container">
                <div class="row vertical-gap">
                    <div class="col-lg-8">
                        <div class="nk-store-product">
                            <div class="row vertical-gap">
                                <div class="col-md-6">
                                    <!-- START: Product Photos -->
                                    <div class="nk-popup-gallery">
                                        <?php
$req = $conn->prepare("SELECT * FROM NosmallItemDreamTrix WHERE ProductId = ?"); // TODO : Move it to ProductId.
$req->execute([$_GET["ProductId"]]);
$result2 = $req->fetch();
?>
<div class="nk-gallery-item-box">
    <a href="<?= $result["Image"] ?>" class="nk-gallery-item" data-size="250x345">
        <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
        <img src="<?= $result["Image"] ?>" alt="">
    </a>
</div>
</div>
<!-- END: Product Photos -->
</div>
<div class="col-md-6">

    <h2 class="nk-product-title h3"><?= $result["Name"] ?></h2>

    <select id="SelectPerso" class="form-control">
        <option value="" disabled selected>Sélectionne ton personnage</option>
        <?php 
        $req = $conn->prepare("SELECT * FROM Character WHERE AccountId = ?");
        $req->execute([$_SESSION["AccountId"]]);
        $CharacterId = 0;
        while($result1 = $req->fetch()):
            ?>
            <option value="<?= $result1["CharacterId"] ?>"><?= $result1["Name"] ?></option>
        <?php endwhile; ?>
    </select>
    <div class="nk-product-description">
        <p><?= $result2["Description"] ?></p>
    </div>

    <!-- START: Add to Cart -->
    <div class="nk-gap-2"></div>
    <div class="nk-product-addtocart">
        <div class="nk-product-price" name="Price" id="Price"><?= $result2["Price"] ?> coins</div>
        <div class="nk-gap-1"></div>
        <div class="input-group">
            <?php 
                $req82190 = $conn->prepare("SELECT * FROM NosmallItemDreamTrix WHERE ProductId = ?");
                $req82190->execute([$_GET["ProductId"]]);
                $result82190 = $req82190->fetch();
                if($result82190["ChooseAmount"] != 0):
            ?>
                <input type="number" onclick="Price(this.value)" onchange="Price(this.value)" id="ChooseAmount" class="form-control" value="1" min="1" max="999">
            <?php endif; ?>
            <button id="AddToCart" class="nk-btn nk-btn-rounded nk-btn-color-main-1">Ajouter au panier</button>
        </div>
    </div>
    <div class="nk-gap-3"></div>
    <!-- END: Add to Cart -->

    <!-- START: Meta -->
    <div class="nk-product-meta">
        <?php 
        $req = $conn->prepare("SELECT * FROM CategoriesDreamTrix WHERE CategoriesId = ?");
        $req->execute([$result2["CategoriesId"]]);
        $result3 = $req->fetch();
        ?>
        <div><strong>Catégorie</strong>: <a href="#"><?= $result3["Name"] ?></a></div>
        <?php
        if(!empty($result2["SecondsCategoriesId"])):
            $req = $conn->prepare("SELECT * FROM SecondsCategoriesDreamTrix WHERE SecondsCategoriesId = ?");
            $req->execute([$result2["SecondsCategoriesId"]]);
            $result4 = $req->fetch();
            ?>
            <div><strong>Catégorie</strong>: <a href="#"><?= $result4["Name"] ?></a></div>
        <?php endif; ?>
    </div>
    <!-- END: Meta -->
</div>
</div>

<!-- START: Share -->
<div class="nk-gap-2"></div>
<div class="nk-post-share">
    <span class="h5">Les donations sont utilisées pour le développement du serveur !</span>
</div>
<!-- END: Share -->

<div class="nk-gap-2"></div>
<!-- START: Tabs -->

<!-- END: Tabs -->
</div>
</div>

<div class="col-lg-4">
    <aside class="nk-sidebar nk-sidebar-right nk-sidebar-sticky">
        <div class="nk-widget nk-widget-highlighted">
            <h4 class="nk-widget-title"><span><span class="text-main-1">Les plus</span> populaires</span></h4>
            <?php
            $req = $conn->query("SELECT TOP 3 r.Price, r.Image, r.ProductId, r.VNum, r.Amount, b.Name FROM NosmallItemDreamTrix r INNER JOIN Item b ON r.VNum = b.VNum ORDER BY Number_p DESC");
            while($result4 = $req->fetch()):
                ?>
                <div class="nk-widget-content">
                    <div class="nk-widget-post">
                        <a href="store-product.php?ProductId=<?= $result4["ProductId"] ?>&ProductVNum=<?= $result4["VNum"] ?>" class="nk-post-image">
                            <img src="<?= $result4["Image"] ?>">
                        </a>
                        <h3 class="nk-post-title"><a href="store-product.php?ProductId=<?= $result4["ProductId"] ?>&ProductVNum=<?= $result4["VNum"] ?>"><?= $result4["Name"] ?></a></h3>
                        <div class="nk-product-rating" data-rating="5"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                        <div class="nk-product-price"><?= $result4["Price"] ?> coins</div>
                    </div>
                </div>
                <?php
            endwhile;
            ?>
        </div>
    </aside>
</div>
</div>
</div>
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
        <script type="text/javascript">
            $("#AddToCart").on('click', function() {

                if($("#SelectPerso option:selected").val() === ""){ 
                    alert("Le champ character ne peut pas être null !");
                    return;
                }

                var data = {
                    "Amount": document.getElementById("ChooseAmount")  ? document.getElementById("ChooseAmount").value : "1",
                    "CharacterId": $("#SelectPerso :selected").val(),
                    "Price": '<?= $result2["Price"]; ?>',
                    "VNum": '<?= $result2["VNum"]; ?>',
                    "ProductId": '<?= $result2["ProductId"]; ?>',
                    "Image": '<?= $result2["Image"]; ?>'
                };

                $.ajax({
                    type: "POST",
                    url: 'shoppingcart.php',
                    data: data,
                    success: function() {
                        location.reload(true);
                    }
                });
            });
        </script>
        <script type="text/javascript">
            function Price(val)
            {
                var GetPrice;
                GetPrice = '<?= $result2["Price"]; ?>';
                var TotalPrice = val * GetPrice;
                var pricez;
                pricez = document.getElementById("Price");
                pricez.innerHTML = TotalPrice;
            }
        </script>
        <!-- END: Scripts -->



    </body>
    </html>
