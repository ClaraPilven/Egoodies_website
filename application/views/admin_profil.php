    <div class="container">

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
                <?php echo $admin[0]['LTQCLAC_login']; ?>

            </td>
        </tr>
        <tr>
            <td>
                Mot de passe :
            </td>
            <td>
                <a href='<?php echo(base_url());?>index.php/Accueil/modifier_lemdp_admin/<?php echo $admin[0]['LTQCLAC_login'] ?>'>Modifier mon mot de passe </a>
            </td>
        </tr>
    </table>
    <center>
        <a href='<?php echo(base_url());?>index.php/Accueil/modifier_admin/<?php echo $admin[0]['LTQCLAC_login'] ?>'>Modifier <img src="<?php echo(base_url());?>/img/elements/modify.png" height=20px></a>
    </center>
</div>
