<div id="profile">

    <br />
    <br />
    <br />
    <br />
    <section class="tracking_box_area section_gap">
        <div class="container">
            <div class="tracking_box_inner">
                <?php echo form_open("Accueil/ajout_du_vendeur");?>
                <div hidden class="col-md-12 form-group">
                    <input type="text" class="form-control" name="admin_login" value="<?php echo $admin[0]['LTQCLAC_login'] ?>">
                </div>
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="Login" placeholder="Login" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Login'">
                </div>
                <div class="col-md-12 form-group">
                    <input type="text" name="Nom" class="form-control" placeholder="Nom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nom'">
                </div>
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="Prenom" placeholder="Prénom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Prénom'">
                </div>
                <div class="col-md-12 form-group">
                    <input type="password" name="Mot_de_passe" class="form-control" placeholder="Mot de passe" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mot de passe'">
                </div>
                <input list="Point_retrait" name="Point_retrait" class="form-control" placeholder="Point Retrait">
                <datalist id="Point_retrait" >
                    <?php foreach($point_retrait as $un_point_retrait){ ?>
                        <option value="<?php echo $un_point_retrait["POINT_RETRAIT_id"], " - ", $un_point_retrait["POINT_RETRAIT_nom"] ?>">
                    <?php } ?>
                </datalist>
                <br />
                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="btn">Ajouter vendeur</button>
                </div>

                </form>
            </div>
        </div>
    </section>
