<div id="profile">

    <br />
    <br />
    <br />
    <a class="nav-link primary-btn" href="<?php echo(base_url());?>index.php/Accueil/voir_comptes/">Retour</a>

    <section class="tracking_box_area section_gap">
        <div class="container">
            <div class="tracking_box_inner">
                <?php echo form_open("Accueil/ajout_du_vendeur");?>
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="Login" placeholder="Login" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Login'">
                    <span>
                            <?php echo form_error('Login'); ?></span>
                    <font color="red">
                        <?php if($logintaken == true){ echo "Le login est déjà pris"; }?>
                    </font>
                </div>
                <div class="col-md-12 form-group">
                    <input type="text" name="Nom" class="form-control" placeholder="Nom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nom'">
                    <span>
                            <?php echo form_error('Nom'); ?></span>
                </div>
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="Prenom" placeholder="Prénom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Prénom'">
                    <span>
                            <?php echo form_error('Prenom'); ?></span>
                </div>
                <div class="col-md-12 form-group">
                    <input type="password" name="Mot_de_passe" class="form-control" placeholder="Mot de passe" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mot de passe'">
                    <span>
                            <?php echo form_error('Mot_de_passe'); ?></span>
                </div>
                <div class="col-md-12 form-group">
                    <input type="password" name="verif_mot_de_passe" class="form-control" placeholder="Confirmation du mot de passe" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirmation du mot de passe'">
                    <span>
                            <?php echo form_error('verif_mot_de_passe'); ?></span>
                     <font color="red">
                        <?php if($mdpequivalents == false){ echo "Les mots de passes ne sont pas équivalents"; }?>
                    </font>
                </div>
                <div class="col-md-12 form-group">

                <select name="Point_retrait">
                    <?php 
                        foreach($point_retrait as $un_pt){
                            foreach($un_pt as $pt){
                                echo "<option>$pt</option>";
                            }
                        }
                    ?>
                </select>
                </div>
                <br/>
                
                
                
                
                
                <!--<datalist id="Point_retrait">
                    <?php foreach($point_retrait as $un_point_retrait){ ?>
                        <option value="<?php echo $un_point_retrait["POINT_RETRAIT_id"], " - ", $un_point_retrait["POINT_RETRAIT_nom"] ?>">
                    <?php } ?>
                </datalist> -->
                
                
                
                <span>
                            <?php echo form_error('Point_retrait'); ?></span>
                <br />
                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="btn">Ajouter vendeur</button>
                </div>

                </form>
            </div>
        </div>
    </section>
