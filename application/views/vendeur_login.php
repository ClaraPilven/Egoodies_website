<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg">
                <div class="login_form_inner">
                    <h3>Log in to enter</h3>
                    <?php echo form_open("Accueil/test_login_vendeur");?>
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" name="nom_utilisateur_vendeur" placeholder="Nom d'utilisateur" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nom d'utilisateur'">
                        <span class="text-danger">
                            <?php echo form_error('nom_utilisateur_vendeur'); ?></span>

                    </div>
                    <div class="col-md-12 form-group">
                        <input type="password" name="mdp_utilisateur_vendeur" class="form-control" placeholder="Mot de passe" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mot de passe'">
                        <span class="text-danger">
                            <?php echo form_error('mdp_utilisateur_vendeur'); ?></span>
                        <font color="red">
                            <?php if ($containserror == true){
									echo 'Le code client ou le code commande entré ne correspond à aucune commande. Veuillez réessayer.';} ?>
                        </font>
                    </div>
                    <div class="col-md-12 form-group">
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="submit" name="insert" value="Se connecter" class="btn" />
                        <?php
                                  echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';
                             ?>
                        <a href="#">Mot de passe oublié ?</a>
                    </div>
                    &nbsp;
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->