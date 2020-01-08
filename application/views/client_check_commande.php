<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Ma Commande</h1>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Order Details Area =================-->
<section class="order_details section_gap">
    <div class="container">
        <div class="row order_d_inner">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>Point de retrait d'arrivée</h4>
                    <ul class="list">
                        <li><a><span>Adresse</span> :
                                <?php 
                        echo $commandeinfo[1]["point_retrait_adresse"]; ?></a></li>

                        <li><a><span>Nom</span> :
                                <?php 
                        echo $commandeinfo[1]["POINT_RETRAIT_nom"]; ?></a></li>

                        <li><a><span>Date de commande</span> :
                                <?php 
                            $date = date_create($commandeinfo[1]["COMMANDE_date"]);
                            echo date_format($date, 'd-m-Y') ?></a></li>

                        <li><a><span>Etat de la commande</span> :
                                <?php 
                        switch($commandeinfo[1]["COMMANDE_etat"]){
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
        </div>
        <div class="order_details_table">
            <h2>Détails de la commande</h2>
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
                        <?php 
                            $total = 0;
                            foreach($commandeinfo as $unproduit) { 
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
                                    <?php echo $unproduit["GOODIE_prix"] ?>€</p>
                            </td>
                        </tr>
                        <?php }?>
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
        <br>
        <!--<center><a class="genric-btn danger circle arrow">Annuler ma commande<span class="lnr lnr-arrow-right"></span></a></center>-->
        <center><a href="supprimer_commande_client/<?php echo($commandeinfo[1]["COMMANDE_id"]);?>" class="genric-btn danger circle arrow" onclick="return confirm('Etes-vous sûr de vouloir annuler votre commande ?');">Annuler ma commande<span class="lnr lnr-arrow-right"></span></a></center>
 

    </div>
</section>

<!--================End Order Details Area =================-->