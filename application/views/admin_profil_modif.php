<div id="profile">

<br/>
<br/>
<br/>
<br/>

<center>
<table class='table'>
    <tr>
        Modifiez le mot de passe ici : 
    <?php echo form_open("Accueil/modifier_mdp_admin");?>
        
        <input hidden name="login" value="<?php echo $admin[0]['LTQCLAC_login']; ?>">
        
        <input type="password" placeholder="Password" id="pwd" class="masked" name="password" value="<?php echo $admin[0]['LTQCLAC_mot_de_passe']?>" ?>
        
        <button type="button" onclick="showHide()" id="eye">
            <img src="<?php echo base_url(); ?>/style/images/eyefont.jpg" width=30px alt="eye"/>
         </button>
    </tr>
</table>
<input type="submit" name="insert" value="Enregistrer les modifications" class="btn" />
</center>
    </div>