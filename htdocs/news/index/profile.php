<?php 

session_start();
setlocale(LC_TIME, 'de_DE'); 

if (!file_exists('config.php')):
  echo '[Maintenance] The website is under Maintenance for a few moments ! Please be Patient ( Error: Cant found all Configs ) !';return;
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
<!--
Name: GoodGames - Game Portal / Store HTML Template
Version: 1.3.0
Author: nK
Website: https://nkdev.info
Purchase: https://themeforest.net/item/goodgames-portal-store-html-gaming-template/17704593?ref=_nK
Support: https://nk.ticksy.com
License: You must have a valid license purchased only from ThemeForest (the above link) in order to legally use the theme for your project.
Copyright 2018.
-->

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $site['name']; ?> - <?php echo $_GET["username"]; ?></title>
  <meta name="description" content="GoodGames - Bootstrap template for communities and games store">
  <meta name="keywords" content="game, gaming, template, HTML template, responsive, Bootstrap, premium">
  <meta name="author" content="_nK">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7cOpen+Sans:400,700" rel="stylesheet" type="text/css">

  <!-- /:styles -->
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
<body style="overflow-x:hidden;">
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
                  <head-text>REGISTRE</head-text><span class="fa fa-user-plus"></span>
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
                      <img src="/images/nm_ucp/probild/<?= LoadUserImage($lsu_Account_Profilbild); ?>.jpg" alt="In all revolutions of" style="border-radius:4px;">
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
      <a href="index.html" class="nk-nav-logo">
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
<?php

if (isset($_GET["username"])):

  $stmt = $conn->prepare("SELECT TOP 1 * FROM $db_Char WHERE $db_Char.[Name] = ?");
  $stmt->execute(array($_GET["username"]));
  $userProfile = $stmt->fetch();

  if ($userProfile != ''):

    ?>
    <div class="nk-main">
      <div class="nk-gap-1"></div>
      <div class="container">
        <ul class="nk-breadcrumbs">
          <li>
            <a href="/index">Accueil</a>
          </li>
          <li>
            <span class="fa fa-angle-right"></span>
          </li>
          <li>
            <a href="/profile/admin">Profil</a>
          </li>		        
          <li>
            <span class="fa fa-angle-right"></span>
          </li>
          <li>
            <a href="/profile/<?php echo $userProfile["Name"]; ?>"><?php echo $userProfile["Name"]; ?></a>
          </li>		        
          <li>
            <span class="fa fa-angle-right"></span>
          </li>
          <li>
            <span><?php echo $userProfile["Name"]; ?></span>
          </li>
        </ul>
      </div>

      <div class="nk-gap-1"></div>
      <!-- END: Breadcrumbs -->	        
      <div class="container">
        <div class="row vertical-gap">
          <div class="col-lg-8">

            <!-- START: Teammate Card -->
            <div class="nk-teammate-card">
              <div class="nk-teammate-card-info">
                <table>
                  <tbody>
                    <tr>
                      <td>

                        <?php

                        if ($userProfile["Class"] == 0) {
                          if ($userProfile ["Gender"] == 0){
                            echo"<img src='/news/index/assets/images/32000.png'/>";
                          }
                        }

                        if ($userProfile["Class"] == 0) {

                          if ($userProfile ["Gender"] == 1){
                            echo"<img src='/news/index/assets/images/32020.png'/>";
                          }
                        }

                        if ($userProfile["Class"] == 1) {

                          if ($userProfile ["Gender"] == 0){
                            echo"<img src='/news/index/assets/images/32040.png'/>";
                          }
                        }

                        if ($userProfile["Class"] == 1) {

                          if ($userProfile ["Gender"] == 1){
                            echo"<img src='/news/index/assets/images/32060.png'/>";
                          }
                        }

                        if ($userProfile["Class"] == 2) {
                          if ($userProfile ["Gender"] == 0){
                            echo"<img src='/news/index/assets/images/32080.png'/>";
                          }
                        }

                        if ($userProfile["Class"] == 2) {
                          if ($userProfile ["Gender"] == 1){
                            echo"<img src='/news/index/assets/images/32100.png'/>";
                          }
                        }

                        if ($userProfile["Class"] == 3) {
                          if ($userProfile ["Gender"] == 0){
                            echo"<img src='/news/index/assets/images/32120.png'/>";
                          }
                        }

                        if ($userProfile["Class"] == 3) {
                          if ($userProfile ["Gender"] == 1){
                            echo"<img src='/news/index/assets/images/32140.png'/>";
                          }
                        }

                        if ($userProfile["Class"] == 4) {
                          if ($userProfile ["Gender"] == 0){
                            echo"<img src='/news/index/assets/images/32160.png'/>";
                          }
                        }

                        if ($userProfile["Class"] == 4) {
                          if ($userProfile ["Gender"] == 1){
                            echo"<img src='/news/index/assets/images/32180.png'/>";
                          }
                        }

                        ?>
                      </td>

                      <td>
                        <table>
                          <tbody>
                            <tr>
                              <td><strong class="h5">Nom :</strong>&nbsp;&nbsp;&nbsp;</td>
                              <td><strong class="h5"><?php echo $userProfile["Name"]; ?></strong></td>
                            </tr>
                            <tr>
                              <td><strong class="h5">Classe :</strong>&nbsp;&nbsp;&nbsp;</td>
                              <td><strong class="h5">
                                <?php 

                                if ($userProfile["Class"] == 0){
                                  echo "Aventurier";
                                }
                                else if ($userProfile["Class"] == 1){ 
                                  echo "Escrimeur";
                                }
                                else if ($userProfile["Class"] == 2){
                                  echo "Archer";
                                }
                                else if ($userProfile["Class"] == 3){
                                  echo "Magicien";
                                }
                                else{ echo "Artiste Martial"; }

                                ?></strong></td>
                              </tr>
                              <tr>
                                <td><strong class="h5">Sexe :</strong>&nbsp;&nbsp;&nbsp;</td>
                                <td><strong class="h5">
                                  <?php 

                                  if ($userProfile["Gender"] == 0){
                                    echo "Homme";
                                  }
                                  else if ($userProfile["Gender"] == 1){ 
                                    echo "Femme";
                                  }
                                  ?></strong></td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <strong class="h3"><?php echo ($userProfile["TalentWin"]/$userProfile["TalentLose"]); ?></strong>
                          </td>
                          <td>
                            <strong class="h5">Arène PVP WinRate</strong>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <strong class="h3"><?php echo $userProfile["Act4Kill"]; ?> / <?php echo $userProfile["Act4Dead"]; ?></strong>
                          </td>
                          <td>
                            <strong class="h5">Acte 4 Kill/Mort</strong>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="nk-widget">
                  <div class="nk-widget-content">
                    <form action="/news/index/search.php" class="nk-form nk-form-style-1" novalidate="novalidate" method="post">
                      <div class="input-group">
                        <input type="text" class="form-control" name="searchUsername" placeholder="Recherchez un joueur" style="border:none;">
                        <button class="nk-btn nk-btn-color-main-1"><span class="ion-search"></span></button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="nk-widget nk-widget-highlighted">
                  <!-- FAIRE EN SORTE D'AFFICHER LES 3 PLUS HAUT LEVEL EN COMBAT -->
                  <h3><span><span class="text-main-1">Top 3</span> Meilleurs joueurs</span></h3>
                  <div class="nk-widget-content" style="background-color: #dd163b;border:1px solid #dd163b;">
                    <div class="nk-widget-match" style="margin-bottom: -12px;background-color: #dd163b;">
                      <a href="/profile/Athena" style="width:100%;">
                        <span class="nk-widget-match-left">
                          <span class="nk-widget-match-teams">
                            <span class="nk-widget-match-team-logo">
                              <img src="<?php echo $site['url']; ?>/images/nm_ucp/probild/<?php echo LoadUserImage(10003); ?>.jpg" alt="">
                            </span>
                            <span class="nk-widget-match-vs" style="padding-left:20px;text-transform: uppercase;">Athena</span>
                          </span>
                        </span>
                        <span class="nk-widget-match-right" style="float:right;margin-top:10px;">
                          <span class="nk-match-score" style="background-color: #fff;color:#141718;">Voir Profil</span>
                        </span>
                      </a>
                    </div>

                    <div class="nk-widget-match" style="margin-bottom: -12px;background-color: #dd163b;">
                      <a href="/profile/Fiigaro" style="width:100%;">
                        <span class="nk-widget-match-left">
                          <span class="nk-widget-match-teams">
                            <span class="nk-widget-match-team-logo">
                              <img src="<?php echo $site['url']; ?>/images/nm_ucp/probild/<?php echo LoadUserImage(10003); ?>.jpg" alt="">
                            </span>
                            <span class="nk-widget-match-vs" style="padding-left:20px;text-transform: uppercase;">Fiigaro</span>
                          </span>
                        </span>
                        <span class="nk-widget-match-right" style="float:right;margin-top:10px;">
                          <span class="nk-match-score" style="background-color: #fff;color:#141718;">Voir Profil</span>
                        </span>
                      </a>
                    </div>

                    <div class="nk-widget-match" style="margin-bottom: -15px;background-color: #dd163b;">
                      <a href="/profile/AJEDrago" style="width:100%;">
                        <span class="nk-widget-match-left">
                          <span class="nk-widget-match-teams">
                            <span class="nk-widget-match-team-logo">
                              <img src="<?php echo $site['url']; ?>/images/nm_ucp/probild/<?php echo LoadUserImage(10007); ?>.jpg" alt="">
                            </span>
                            <span class="nk-widget-match-vs" style="padding-left:20px;text-transform: uppercase;">AJEDrago</span>
                          </span>
                        </span>
                        <span class="nk-widget-match-right" style="float:right;margin-top:10px;">
                          <span class="nk-match-score" style="background-color: #fff;color:#141718;">Voir Profil</span>
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="nk-gap-1"></div>
            <div class="nk-gap-1"></div>
            <h3 class="nk-decorated-h-2"><span>statistiques</span></h3>
            <div class="nk-gap-1"></div>
            <div class="row vertical-gap">
              <div class="col-lg-4">
                <div class="nk-feature-2">
                  <div class="nk-feature-icon">
                    <div class="nk-count h2 mb-0"><?php echo $userProfile["Level"]; ?></div>
                  </div>
                  <div class="nk-feature-cont text-center">
                    <h3 class="nk-feature-title">Niveau</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="nk-feature-2">
                  <div class="nk-feature-icon">
                    <div class="nk-count h2 mb-0"><?php echo $userProfile["Reputation"]; ?></div>
                  </div>
                  <div class="nk-feature-cont text-center">
                    <h3 class="nk-feature-title">Réputation</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="nk-feature-2">
                  <div class="nk-feature-icon">
                    <div class="nk-count h2 mb-0"><?php echo $userProfile["HeroLevel"]; ?></div>
                  </div>
                  <div class="nk-feature-cont text-center">
                    <h3 class="nk-feature-title">Niveau Héroïque</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="nk-gap-3"></div>
            <!-- LE JOUEUR DOIT ETRE CONNECTÉ SUR LE COMPTE RECHERCHÉ EN QUESTION POUR QUE LE NB S'AFFICHE -->
            <h3 class="nk-decorated-h-2"><span>nosbazaar</span></h3>
            <table class="nk-table">

              <tbody>
                <tr>
                  <th>Nom de l'objet</th>
                  <th>Temps restant</th>
                  <th>Prix</th>
                  <th>État</th>
                  <th>Image</th>
                </tr>
                <tr>
                  <td>{itemname}</td>
                  <td>{dateend}</td>
                  <td>{price}</td>
                  <td>{state}</td>
                  <td>{picture}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <?php else: ?>
          <div class="nk-fullscreen-block">
            <div class="nk-fullscreen-block-middle">
              <div class="container text-center">
                <div class="row">
                  <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                    <h1 class="text-main-1" style="font-size: 150px;">404</h1>

                    <div class="nk-gap"></div>
                    <h2 class="h4">Profil non trouvé</h2>

                    <div>Rechercher à nouveau pour avoir plus de chance cette fois</div>
                    <div class="nk-gap-3"></div>

                    <div class="nk-widget">
                      <div class="nk-widget-content">
                        <form action="/news/index/search.php" class="nk-form nk-form-style-1" novalidate="novalidate" method="post">
                          <div class="input-group">
                            <input type="text" class="form-control" name="searchUsername" placeholder="Trouver profil..." style="border:none;">
                            <button class="nk-btn nk-btn-color-main-1"><span class="ion-search"></span></button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="nk-gap-3"></div>
              </div>
            </div>
          </div>
        <?php endif; else: ?>
        <div class="nk-fullscreen-block">
          <div class="nk-fullscreen-block-middle">
            <div class="container text-center">
              <div class="row">
                <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                  <h1 class="text-main-1" style="font-size: 150px;">404</h1>

                  <div class="nk-gap"></div>
                  <h2 class="h4">Profil non trouvé</h2>

                  <div>Rechercher à nouveau pour avoir plus de chance cette fois</div>
                  <div class="nk-gap-3"></div>

                  <div class="nk-widget">
                    <div class="nk-widget-content">
                      <form action="/news/index/search.php" class="nk-form nk-form-style-1" novalidate="novalidate" method="post">
                        <div class="input-group">
                          <input type="text" class="form-control" name="searchUsername" placeholder="Trouver profil..." style="border:none;">
                          <button class="nk-btn nk-btn-color-main-1"><span class="ion-search"></span></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="nk-gap-3"></div>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <div class="nk-gap-6"></div>
      <div class="nk-gap-6"></div>
      <?php 

include '../views/_footer.html'; // footer

?>
</div>

<img class="nk-page-background-top" src="<?php echo $site['url'] . $site['assets']['images']; ?>/bg-top-3.png" alt="">
<!-- END: Search Modal -->

<div class="nk-modal modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="ion-android-close"></span>
        </button>

        <h4 class="mb-0"><span class="text-main-1">Sign</span> In</h4>

        <div class="nk-gap-1"></div>
        <form action="#" class="nk-form text-white">
          <div class="row vertical-gap">
            <div class="col-md-6">
              Use email and password:

              <div class="nk-gap"></div>
              <input type="email" value="" name="email" class=" form-control" placeholder="Email">

              <div class="nk-gap"></div>
              <input type="password" value="" name="password" class="required form-control" placeholder="Password">
            </div>
            <div class="col-md-6">
              Or social account:

              <div class="nk-gap"></div>

              <ul class="nk-social-links-2">
                <li><a class="nk-social-facebook" href="#"><span class="fa fa-facebook"></span></a></li>
                <li><a class="nk-social-google-plus" href="#"><span class="fa fa-google-plus"></span></a></li>
                <li><a class="nk-social-twitter" href="#"><span class="fa fa-twitter"></span></a></li>
              </ul>
            </div>
          </div>

          <div class="nk-gap-1"></div>
          <div class="row vertical-gap">
            <div class="col-md-6">
              <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Sign In</a>
            </div>
            <div class="col-md-6">
              <div class="mnt-5">
                <small><a href="#">Forgot your password?</a></small>
              </div>
              <div class="mnt-5">
                <small><a href="#">Not a member? Sign up</a></small>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

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
</body>
</html>
