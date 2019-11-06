<div id="profile">
    <br />
    <br />
    <br />
    <br />

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

                            <li>
                                <a><span>Etat de la commande</span> :
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
                        }?></a>
                            </li>
                            <a href="<?php echo base_url();?>index.php/Accueil/modifier_etat_commande?LTQCLAC_login=<?php echo $admin[0]['LTQCLAC_login']; ?>&COMMANDE_id=<?php echo $unproduit["COMMANDE_id"];?>">Modifier Etat</a>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                </div>
                <h2>Détails de la commande&nbsp;
                    <?php echo $unproduit["COMMANDE_id"] ?>
                </h2>

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
            <p>Aucune commande en cours actuellement</p>
            <?php } ?>
        </div>

    </section>


</div>
</body>

</html>
