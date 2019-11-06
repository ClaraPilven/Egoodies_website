<div id="profile">

    <br />
    <br />
    <br />
    <br />
    <?php 
    $titre_original = "";
    foreach($goodies as $ungoodie){ 
    
    if($ungoodie["ORIGINAL_titre"]!=$titre_original){
        $titre_original = $ungoodie["ORIGINAL_titre"];

    ?>
    
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1><?php echo $ungoodie["ORIGINAL_titre"]?></h1>
                        </div>
                    </div>
                </div>
                <div class="row">
            <?php } ?>
            <!-- single product -->
            <div class="col-lg-3 col-md-6">
                <div class="single-product">
                    <img src="<?php echo(base_url());?>style/images/<?php echo $ungoodie["GOODIE_nom_image"]?>"alt="">
                    <div class="product-details">
                        <h6>
                            <?php echo $ungoodie["GOODIE_nom"]?>
                        </h6>
                        <div class="price">
                            <h6>
                                <?php echo $ungoodie["GOODIE_prix"]?>€</h6>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
        if($ungoodie["ORIGINAL_titre"]!=$titre_original){
        ?>
        </div>
    </div>
    <?php } } ?>
</div>
</div>