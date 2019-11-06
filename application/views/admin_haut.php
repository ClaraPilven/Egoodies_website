<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Karma Shop</title>
    <!--
		CSS
		============================================= -->
    <link rel="stylesheet" href="<?php echo(base_url());?>css/linearicons.css">
    <link rel="stylesheet" href="<?php echo(base_url());?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo(base_url());?>css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo(base_url());?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo(base_url());?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo(base_url());?>css/nice-select.css">
    <link rel="stylesheet" href="<?php echo(base_url());?>css/nouislider.min.css">
    <link rel="stylesheet" href="<?php echo(base_url());?>css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="<?php echo(base_url());?>css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="<?php echo(base_url());?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo(base_url());?>css/main.css">

</head>

<body>

    <!-- Start Header Area -->
    <header class="header_area">
        <title>Page Vendeur</title>

        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a hidden class="navbar-brand logo_h" href="<?php echo(base_url());?>index.php"><img src="<?php echo(base_url());?>img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="<?php echo(base_url());?>index.php/Accueil/voir_galerie_admin/<?php echo $admin[0]['LTQCLAC_login'] ?>">Goodies</a> <img src="<?php echo(base_url());?>/style/images/gallery.png" width=25px></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo(base_url());?>index.php/Accueil/voir_actualites/<?php echo $admin[0]['LTQCLAC_login'] ?>">Actualités</a> <img src="<?php echo(base_url());?>/style/images/news.png" width=25px></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo(base_url());?>index.php/Accueil/voir_comptes/<?php echo $admin[0]['LTQCLAC_login'] ?>">Les comptes</a> <img src="<?php echo(base_url());?>/style/images/profiles.png" width=25px></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo(base_url());?>index.php/Accueil/enter_as_admin/<?php echo $admin[0]['LTQCLAC_login'] ?>">Liste des Commandes</a> <img src="<?php echo(base_url());?>/img/features/f-icon1.png" width=25px> </li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo(base_url());?>index.php/Accueil/afficher_point_retrait/<?php echo $admin[0]['LTQCLAC_login'] ?>">Points Retrait</a> <img src="<?php echo(base_url());?>/style/images/entrepot.png" width=25px></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo(base_url());?>index.php/Accueil/info_admin/<?php echo $admin[0]['LTQCLAC_login'] ?>">Mon profil</a> <img src="<?php echo(base_url());?>/style/images/profile.png" width=25px></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo(base_url());?>index.php/Accueil/logout_as_admin">Déconnexion</a> <img src="<?php echo(base_url());?>/style/images/deconnexion.png" width=25px></li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
