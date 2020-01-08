<div id="profile">
    <br>
    <br>
    <br>
    <?php
    if($commandesp != null){?>
    <div class="container">
        <table class='table'>
            <thead>
                <h1>Préparées</h1>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Point Retrait</th>
                    <th scope="col">Date de commande</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <?php foreach($commandesp as $unproduit) { ?>

            <tr>
                <td>
                    <?php echo $unproduit["COMMANDE_id"];?>
                </td>
                <td>
                    <?php echo $unproduit["POINT_RETRAIT_nom"]?>
                </td>
                <td>
                    <?php 
                            $date = date_create($unproduit["COMMANDE_date"]);
                            echo date_format($date, 'd-m-Y') ?>
                </td>
                <td>
                <a href="<?php echo base_url();?>index.php/Accueil/vendeur_voir_une_commande/<?php echo $unproduit["COMMANDE_id"];?>">Détails</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <?php } ?>
    <br>
    <?php
    if($commandesx != null){?>
    <div class="container">
        <table class='table'>
            <thead>
                <h1>Expédiées</h1>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Point Retrait</th>
                    <th scope="col">Date de commande</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <?php foreach($commandesx as $unproduit) { ?>

            <tr>
                <td>
                    <?php echo $unproduit["COMMANDE_id"];?>
                </td>
                <td>
                    <?php echo $unproduit["POINT_RETRAIT_nom"]?>
                </td>
                <td>
                    <?php 
                            $date = date_create($unproduit["COMMANDE_date"]);
                            echo date_format($date, 'd-m-Y') ?>
                </td>
                <td>
                <a href="<?php echo base_url();?>index.php/Accueil/vendeur_voir_une_commande/<?php echo $unproduit["COMMANDE_id"];?>">Détails</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <?php } ?>
    <br>
    <?php
    if($commandesd != null){?>
    <div class="container">
        <table class='table'>
            <thead>
                <h1>Disponibles</h1>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Point Retrait</th>
                    <th scope="col">Date de commande</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <?php foreach($commandesd as $unproduit) { ?>

            <tr>
                <td>
                    <?php echo $unproduit["COMMANDE_id"];?>
                </td>
                <td>
                    <?php echo $unproduit["POINT_RETRAIT_nom"]?>
                </td>
                <td>
                    <?php 
                            $date = date_create($unproduit["COMMANDE_date"]);
                            echo date_format($date, 'd-m-Y') ?>
                </td>
                <td>
                <a href="<?php echo base_url();?>index.php/Accueil/vendeur_voir_une_commande/<?php echo $unproduit["COMMANDE_id"];?>">Détails</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <?php } ?>
    <br>
    <?php
    if($commandesr != null){?>
    <div class="container">
        <table class='table'>
            <thead>
                <h1>Retirées</h1>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Point Retrait</th>
                    <th scope="col">Date de commande</th>
                    <th scope="col">Date de retrait</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <?php foreach($commandesr as $unproduit) { ?>

            <tr>
                <td>
                    <?php echo $unproduit["COMMANDE_id"];?>
                </td>
                <td>
                    <?php echo $unproduit["POINT_RETRAIT_nom"]?>
                </td>
                <td>
                    <?php 
                            $date = date_create($unproduit["COMMANDE_date"]);
                            echo date_format($date, 'd-m-Y') ?>
                </td>
                <td>
                    <?php 
                            $date = date_create($unproduit["COMMANDE_date_retrait"]);
                            echo date_format($date, 'd-m-Y') ?>
                </td>
                <td>
                <a href="<?php echo base_url();?>index.php/Accueil/vendeur_voir_une_commande/<?php echo $unproduit["COMMANDE_id"];?>">Détails</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <?php } ?>
    <br>
    <?php
    if($commandese != null){?>
    <div class="container">
        <table class='table'>
            <thead>
                <h1>Expirées</h1>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Point Retrait</th>
                    <th scope="col">Date de commande</th>

                </tr>
            </thead>
            <?php foreach($commandese as $unproduit) { ?>

            <tr>
                <td>
                    <?php echo $unproduit["COMMANDE_id"];?>
                </td>
                <td>
                    <?php echo $unproduit["POINT_RETRAIT_nom"]?>
                </td>
                <td>
                    <?php 
                            $date = date_create($unproduit["COMMANDE_date"]);
                            echo date_format($date, 'd-m-Y') ?>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <?php } ?>
    <br>
    <?php if($commandesa != null){ ?>

    <div class="container">
        <table class='table'>
            <thead>
                <h1>Annulées</h1>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Point Retrait</th>
                    <th scope="col">Date de commande</th>
                </tr>
            </thead>
            <?php foreach($commandesa as $unproduit) { ?>

            <tr>
                <td>
                    <?php echo $unproduit["COMMANDE_id"];?>
                </td>
                <td>
                    <?php echo $unproduit["POINT_RETRAIT_nom"]?>
                </td>
                <td>
                    <?php 
                            $date = date_create($unproduit["COMMANDE_date"]);
                            echo date_format($date, 'd-m-Y') ?>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <?php } ?>
</div>
