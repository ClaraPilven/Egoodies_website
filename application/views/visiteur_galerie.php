<section>
    <div id="profile">

        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />


        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- single product -->
                    <?php 
                    foreach($originaux as $unoriginal){ 
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <a href="<?php echo(base_url());?>index.php/Accueil/afficher_goodie_original/<?php echo $unoriginal["ORIGINAL_id"]; ?>"><img src="<?php echo(base_url());?>style/images/<?php echo $unoriginal["ORIGINAL_nom_image"]?>"alt=""></a>
                            <div class="product-details">
                                <h6 align="center">
                                    <?php echo $unoriginal["ORIGINAL_titre"]?>
                                </h6>
                                <div class="price">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  } ?>

                </div>
            </div>
        </div>
    </div>
</section>
