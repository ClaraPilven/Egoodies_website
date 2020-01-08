<div id="profile">

    <br />
    <br />
    <br />
    <br />
    <a class="nav-link primary-btn" href="<?php echo(base_url());?>index.php/Accueil/info_admin/">Retour</a>

    
    <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-9">
            <?php echo form_open("Accueil/modifier_donnees_admin");?>
            <div class="col-md-6">
                <div class="form-group">
                    Login
                    <input type="text" class="form-control" id="login" name="login" value="<?php echo $admin[0]['LTQCLAC_login'];?>">
                    <font color="red"><span>
                            <?php echo form_error('login'); ?></span></font>
                    <?php if ($logintaken == true){
                        echo '<font color="red">login déjà existant</font>';
                    }?>
                </div>
            </div>

            <div class="col-md-7 text-right">
                <button type="submit" value="submit" class="primary-btn">Valider</button>
            </div>
            </form>
        </div>
    </div>



</div>
