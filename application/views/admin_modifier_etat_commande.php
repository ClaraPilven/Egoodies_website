

<section class="order_details section_gap">
    <a class="nav-link primary-btn" href="<?php echo(base_url());?>index.php/Accueil/admin_voir_une_commande/<?php echo $commandes[0]["COMMANDE_id"]?>">Retour</a>
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
                            $date = date_create($commandes[0]["COMMANDE_date"]);
                            echo date_format($date, 'd-m-Y') ?></a></li>

                        <li>
                            <a><span>Etat de la commande</span> :
                                <?php 
                        switch($commandes[0]["COMMANDE_etat"]){
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
                        }?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
            <h2>Détails de la commande&nbsp;
                <?php echo $commandes[0]["COMMANDE_id"] ?>
            </h2>

        </div>

        <?php 
    $commande_code = "";
    foreach($commandes as $unproduit) {
    if ($commande_code != $unproduit["COMMANDE_code"]){
        $total = 0;
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
} } ?>
        <center>

            <h3>Nouvel Etat :</h3>
            <?php echo form_open("Accueil/modification_etat_commande"); ?>
            <div hidden class="col-md-12 form-group">
            <input type="text" class="form-control" name="COMMANDE_id" value="<?php echo $commandes[0]["COMMANDE_id"]; ?>">
            </div>
            <input type="radio" name="COMMANDE_etat" value="p"> Préparé&nbsp;&nbsp;
            <input type="radio" name="COMMANDE_etat" value="x"> Expédié&nbsp;&nbsp;
            <input type="radio" name="COMMANDE_etat" value="d"> Disponible&nbsp;&nbsp;
            <input type="radio" name="COMMANDE_etat" value="r"> Retiré&nbsp;&nbsp;
            <input type="radio" name="COMMANDE_etat" value="e"> Expiré&nbsp;&nbsp;
            <input type="radio" name="COMMANDE_etat" value="a"> Annulé&nbsp;&nbsp;
            <input type="submit">
            </form>
        </center>
    </div>

</section>
