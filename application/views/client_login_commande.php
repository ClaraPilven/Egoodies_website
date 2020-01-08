<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Suivi de ma Commande</h1>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Login Box Area =================-->
<section class="tracking_box_area section_gap">
    <div class="container">
        <div class="tracking_box_inner">
            <?php echo form_open("Accueil/test_login_commande");?>
            <div class="col-md-12 form-group">
                <input type="text" class="form-control" name="code_client" placeholder="code_client" onfocus="this.placeholder = ''" onblur="this.placeholder = 'code_client'">
                <span class="text-danger"><font color="red">
                    <?php echo form_error('code_client'); ?></font></span>
            </div>
            <div class="col-md-12 form-group">
                <input type="password" name="code_commande" class="form-control" placeholder="code_commande" onfocus="this.placeholder = ''" onblur="this.placeholder = 'code_commande'">
                <span class="text-danger"><font color="red">
                    <?php echo form_error('code_commande'); ?></font></span>
                <font color="red">
                    <?php if ($containserror == true){
									echo 'Le code client ou le code commande entré ne correspond à aucune commande. Veuillez réessayer.';} ?>
                </font>
            </div>
            <div class="col-md-12 form-group">
                <button type="submit" value="submit" class="primary-btn">Valider</button>
            </div>
            </form>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->
