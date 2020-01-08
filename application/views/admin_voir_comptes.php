<div class="container">

    <br />
    <br />
    <br />
    <br />
    <center>
    <font color="lightgreen">
        <?php 
        if ($compte_cree == true){
            echo "Compte crée avec succès";
        }
        ?>
    </font>
    </center>
    <h2>Vendeurs</h2>
    <table class='table'>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Login</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Point Retrait</th>

            </tr>
        </thead>
        <?php foreach($comptes as $uncompte){ ?>
        <tr>
            <td>
                <?php echo $uncompte['VENDEUR_id']; ?>
            </td>
            <td>
                <?php echo $uncompte['VENDEUR_login']; ?>
            </td>
            <td>
                <?php echo $uncompte['VENDEUR_nom']; ?>
            </td>
            <td>
                <?php echo $uncompte['VENDEUR_prenom']; ?>
            </td>
            <td>
                <?php echo $uncompte['POINT_RETRAIT_nom']; ?>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td>
                <a href="<?php echo base_url();?>index.php/Accueil/ajouter_vendeur/">Ajouter un compte</a>
            </td>
            <td>
            </td>
            <td>
            </td>
            <td>
            </td><td>
            </td>
        </tr>
    </table>
    <br />
    <h2>Administrateurs</h2>
    <?php 
    if($source[0]['LTQCLAC_source']==1){?>

    <table class='table'>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Login</th>
                <th scope="col">Source</th>

            </tr>
        </thead>
        <?php foreach($compte_admin as $un_compte_admin){ ?>
        <tr>
            <td>
                <?php echo $un_compte_admin['LTQCLAC_id']; ?>
            </td>
            <td>
                <?php echo $un_compte_admin['LTQCLAC_login']; ?>
            </td>
            <td>
                <?php if($un_compte_admin['LTQCLAC_source']==1){echo "true";} else{echo "false";} ?>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td>
                <a href="<?php echo base_url();?>index.php/Accueil/ajouter_admin/">Ajouter un compte</a>
            </td>
            <td>
            </td>
            <td>
            </td>
        </tr>
    </table>

    <?php }?>
</div>
