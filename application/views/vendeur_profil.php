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
                <li class="nav-item"><a class="nav-link" href='<?php echo(base_url());?>index.php/Accueil/enter_as_vendeur/<?php echo $vendeur[0]['VENDEUR_login'] ?>'>Mes Commandes</a> <img src="<?php echo(base_url());?>/img/features/f-icon1.png" width=25px> </li>
                <li class="nav-item"><a class="nav-link" href="<?php echo(base_url());?>index.php/Accueil/info_vendeur/<?php echo $vendeur[0]['VENDEUR_login'] ?>">Mon profil</a> <img src="<?php echo(base_url());?>/style/images/profile.png" width=25px></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo(base_url());?>index.php/Accueil/logout_as_vendeur">Déconnexion</a> <img src="<?php echo(base_url());?>/style/images/deconnexion.png" width=25px></li>

            </ul>
        </div>
    </div>
</nav>
</header>

<div id="profile">

    <br />
    <br />
    <br />
    <br />
    <center>
    <font color="lightgreen">

        <?php if ($passwordchanged == true){
									echo 'Modifications appliquées';} ?>
    </font>
        </center>
    <table class='table'>
        <tr>
            <td>
                login :
            </td>
            <td>
                <?php echo $vendeur[0]['VENDEUR_login']; ?>

            </td>
        </tr>
        <tr>
            <td>
                Nom :
            </td>
            <td>
                <?php echo $vendeur[0]['VENDEUR_nom']; ?>
            </td>
        </tr>
        <tr>
            <td>
                Prénom :
            </td>
            <td>
                <?php echo $vendeur[0]['VENDEUR_prenom']; ?>

            </td>
        </tr>
        <tr>
            <td>
                Mot de passe :
            </td>
            <td>
                <p>••••••••</p>
            </td>
        </tr>
    </table>
    <center>
        <a href='<?php echo(base_url());?>index.php/Accueil/modifier_vendeur/<?php echo $vendeur[0]['VENDEUR_login'] ?>'>Modifier mon mot de passe <img src="<?php echo(base_url());?>/img/elements/modify.png" height=20px>
        </a>
    </center>
</div>
