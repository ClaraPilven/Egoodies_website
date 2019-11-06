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

<br/>
<br/>
<br/>
<br/>

<center>
<table class='table'>
    <tr>
        Modifiez le mot de passe ici : 
    <?php echo form_open("Accueil/modifier_mdp_vendeur");?>
        
        <input hidden name="login" value="<?php echo $vendeur[0]['VENDEUR_login']; ?>">
        
        <input type="password" placeholder="Password" id="pwd" class="masked" name="password" value="<?php echo $vendeur[0]['VENDEUR_mot_de_passe']?>" ?>
        
        <button type="button" onclick="showHide()" id="eye">
            <img src="<?php echo base_url(); ?>/style/images/eyefont.jpg" width=30px alt="eye"/>
         </button>
    </tr>
</table>
<input type="submit" name="insert" value="Enregistrer les modifications" class="btn" />
</center>
    </div>