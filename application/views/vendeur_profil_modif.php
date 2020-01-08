<div id="profile">

    <br />
    <br />
    <br />
    <br />
    <a class="nav-link primary-btn" href="<?php echo(base_url());?>index.php/Accueil/info_vendeur/">Retour</a>

    
    <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-9">
            <?php echo form_open("Accueil/modifier_donnees_vendeur");?>
            <div class="col-md-6">
                <div class="form-group">
                    Login
                    <input type="text" class="form-control" id="login" name="login" value="<?php echo $vendeur[0]['VENDEUR_login'];?>">
                    <font color="red"><span>
                            <?php echo form_error('login'); ?></span></font>
                    <?php if ($logintaken == true){
                        echo '<font color="red">login déjà existant</font>';
                    }?>
                </div>
                <div class="form-group">
                    Nom
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $vendeur[0]['VENDEUR_nom'];?>">
                    <font color="red"><span>
                            <?php echo form_error('nom'); ?></span></font>
                </div>
                <div class="form-group">
                    Prénom
                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $vendeur[0]['VENDEUR_prenom'];?>">
                    <font color="red"><span>
                            <?php echo form_error('prenom'); ?></span></font>
                </div>
            </div>

            <div class="col-md-7 text-right">
                <button type="submit" value="submit" class="primary-btn">Valider</button>
            </div>
            </form>
        </div>
    </div>



</div>
