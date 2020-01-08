<div id="profile">

    <br />
    <br />
    <br />
    <br />
    <center>
        <font color="lightgreen">

            <?php 
            if ($passwordchanged == true){
                echo 'Modifications appliquées';
            }                 
                ?>
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
                        <a href='<?php echo(base_url());?>index.php/Accueil/modifier_lemdp_vendeur/'>Modifier mot de passe</a>

            </td>
        </tr>
    </table>
    <center>
        <br><br>
        <a href='<?php echo(base_url());?>index.php/Accueil/modifier_vendeur/'>Modifier données <img src="<?php echo(base_url());?>/img/elements/modify.png" height=20px></a>
    </center>
</div>
