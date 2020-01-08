<br>
<br>
<br>
<div class="container">
    <a class="nav-link primary-btn" href="<?php echo(base_url());?>index.php/Accueil/afficher_commandes/">Retour</a>

    <center>
        <ul class="list">
            <li><a><span>Date de commande</span> :
                    <?php 
        $date = date_create($commande[0]["COMMANDE_date"]);
                            echo date_format($date, 'd-m-Y') ?></a></li>

            <li>
                
                <a>
                    <span>Etat de la commande</span> :
                    <?php 
                switch($commande[0]["COMMANDE_etat"]){
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
                }?>
                </a>
                <br><br>
            </li>
        </ul>
    </center>
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
        $total=0;
        foreach($commande as $unproduit){ 
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
            <?php } ?>
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
