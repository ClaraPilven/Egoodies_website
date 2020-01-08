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
            <?php echo form_open("Accueil/modifier_mdp_vendeur");?>
            <div class="col-md-6">
                <div class="form-group">
                    Ancien mot de passe
                    <input type="text" class="form-control" id="oldpassword" name="oldpassword">
                    <font color="red"><span>
                            <?php echo form_error('oldpassword'); ?></span></font>
                    <?php if ($falseoldmdp == true){
                        echo '<font color="red">Erreur dans le mot de passe</font>';
                    }?>
                </div>
                <hr>
                <div class="form-group">
                    Nouveau mot de passe
                    <input type="password" class="form-control" id="newpassword" name="newpassword">
                    <font color="red"><span>
                            <?php echo form_error('newpassword'); ?></span></font>
                </div>
                <div class="form-group">
                    Confirmation du mot de passe
                    <input type="password" class="form-control" id="newpassword2" name="newpassword2">
                    <font color="red"><span>
                            <?php echo form_error('newpassword2'); ?></span></font>
                    <?php if ($mdpdifférents == true){
									echo '<font color="red">Les mots de passes ne correspondent pas</font>';} ?>
                </div>
            </div>

            <div class="col-md-7 text-right">
                <button type="submit" value="submit" class="primary-btn">Valider</button>
            </div>
            </form>
        </div>
    </div>



</div>
