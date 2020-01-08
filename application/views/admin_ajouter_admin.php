<div id="profile">
    <br />
    <br />
    <br />
    <a class="nav-link primary-btn" href="<?php echo(base_url());?>index.php/Accueil/voir_comptes/">Retour</a>


    <section class="tracking_box_area section_gap">
        <div class="container">
            <div class="tracking_box_inner">
                <?php echo form_open("Accueil/ajout_de_admin");?>
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="Login" placeholder="Login" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Login'">
                    <span>
                        <?php echo form_error('Login'); ?></span>
                    <font color="red">
                        <?php if($logintaken == true){ echo "Le login est déjà pris"; }?>
                    </font>
                </div>
                <div class="col-md-12 form-group">
                    <input type="password" name="Mot_de_passe" class="form-control" placeholder="Mot de passe" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mot de passe'">
                    <span class="text-danger">
                        <?php echo form_error('Mot_de_passe'); ?></span>
                </div>
                <div class="col-md-12 form-group">
                    <input type="password" name="verif_mot_de_passe" class="form-control" placeholder="Confirmation du mot de passe" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirmation du mot de passe'">
                    <span class="text-danger">
                        <?php echo form_error('verif_mot_de_passe'); ?></span>
                    <font color="red">
                        <?php if($mdpequivalents == false){ echo "Les mots de passes ne sont pas équivalents"; }?>
                    </font>
                </div>

                <br />
                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="btn">Ajouter admin</button>
                </div>
                </form>
            </div>
        </div>
    </section>
