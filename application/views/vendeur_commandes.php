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
    
&nbsp;&nbsp;&nbsp;
    A propos de votre point retrait <strong>
        <?php echo $vendeur[0]['POINT_RETRAIT_nom'] ?></strong>, à l'adresse : <strong>
        <?php echo $vendeur[0]['POINT_RETRAIT_adresse'] ?></strong> :

    <?php 
$commande_code = 'a';
echo '<br>';
echo '<br>';
echo '<br>';
if($commandes[0]["CLIENT_nom"] != null){
foreach($commandes as $unproduit) {
    if ($commande_code != $unproduit["COMMANDE_code"]){
        $total = 0;


            ?>
    <section class="order_details section_gap">
        <div class="container">
            <div class="row order_d_inner">
                <div class="col-lg-4">
                </div>
                <div class="col-lg-4">
                    <div class="details_item">
                        <h4>Point de retrait d'arrivée</h4>
                        <ul class="list">
                            <li><a><span>Date de commande</span> :
                                    <?php 
                            $date = date_create($unproduit["COMMANDE_date"]);
                            echo date_format($date, 'd-m-Y') ?></a></li>

                            <li><a><span>Etat de la commande</span> :
                                    <?php 
                        switch($unproduit["COMMANDE_etat"]){
                            case 'p':
                                echo "Préparé";
                                break;
                            case 'x':
                                echo "Expédié";
                                break;
                            case 'd':
                                echo "Disponible";
                                break;
                            case 'r':
                                echo "Retiré";
                                break;
                            case 'e':
                                echo "Expiré";
                                break;
                            case 'a':
                                echo "Annulé";
                                break;                                
                        }?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                </div>
                <h2>Détails de la commande&nbsp;<?php echo $unproduit["COMMANDE_id"] ?></h2>

            </div>
            <?php } 
    if ($commande_code != $unproduit["COMMANDE_code"]){
        $commande_code = $unproduit["COMMANDE_code"];
                ?>
            <div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Produit</th>
                                <th scope="col">Quantité</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php } ?>
                            <?php 
                                $total = $total + ($unproduit['GOODIE_prix']*$unproduit['CCG_quantite']);    ?>
                            <tr>
                                <td>
                                    <p>
                                        <?php echo $unproduit["GOODIE_nom"] ?>
                                    </p>
                                </td>
                                <td>
                                    <h5>
                                        <?php echo $unproduit["CCG_quantite"] ?>
                                    </h5>
                                </td>
                                <td>
                                    <p>
                                        <?php echo $unproduit['GOODIE_prix']*$unproduit['CCG_quantite'] ?>€</p>
                                </td>
                            </tr>
                            <?php if(next($commandes)["COMMANDE_code"] != $unproduit["COMMANDE_code"]){ ?>

                            <tr>
                            <td>
                                <h4>Total</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>
                                    <?php echo $total ?>€</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>



            <?php
} }}else{?>
            <p>Votre point de vente n'a pas de commande en cours actuellement</p> <?php } ?>
        </div>

    </section>

</div>
</body>

</html>
