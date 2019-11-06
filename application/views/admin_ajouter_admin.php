<div id="profile">
    <br />
    <br />
    <br />
    <br />
    <section class="tracking_box_area section_gap">
        <div class="container">
            <div class="tracking_box_inner">
                <?php echo form_open("Accueil/ajout_de_admin");?>
                <div hidden class="col-md-12 form-group">
                    <input type="text" class="form-control" name="admin_login" value="<?php echo $admin[0]['LTQCLAC_login'] ?>">
                </div>
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="Login" placeholder="Login" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Login'">
                </div>
                <div class="col-md-12 form-group">
                    <input type="password" name="Mot_de_passe" class="form-control" placeholder="Mot de passe" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mot de passe'">
                </div>
                <br />
                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="btn">Ajouter vendeur</button>
                </div>

                </form>
            </div>
        </div>
    </section>
