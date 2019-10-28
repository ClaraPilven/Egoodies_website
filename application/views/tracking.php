    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Order Tracking</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Fashon Category</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Tracking Box Area =================-->
    <section class="tracking_box_area section_gap">
        <div class="container">
            <div class="tracking_box_inner">
                <p>To track your order please enter your Order ID in the box below and press the "Track" button. This
                    was given to you on your receipt and in the confirmation email you should have received.</p>
                <?php echo form_open("Accueil/test_login_commande");?>
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" name="code_client" placeholder="code_client" onfocus="this.placeholder = ''" onblur="this.placeholder = 'code_client'">
                        <span class="text-danger">
                            <?php echo form_error('code_client'); ?></span>
                    </div>
                    <div class="col-md-12 form-group">
                         <input type="password" name="code_commande" class="form-control" placeholder="code_commande" onfocus="this.placeholder = ''" onblur="this.placeholder = 'code_commande'">
                        <span class="text-danger">
                            <?php echo form_error('code_commande'); ?></span>
                        <font color="red">
                            <?php if ($containserror == true){
									echo 'Le code client ou le code commande entré ne correspond à aucune commande. Veuillez réessayer.';} ?>
                        </font>
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" value="submit" class="primary-btn">Track Order</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--================End Tracking Box Area =================-->