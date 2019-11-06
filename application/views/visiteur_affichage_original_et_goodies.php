<br/>
<br/>
<br/>

<section class="order_details section_gap">
    <div class="container">
        <div class="row order_d_inner">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <div align="center">
                <img src="<?php echo(base_url());?>style/images/<?php echo $goodies[0]["ORIGINAL_nom_image"]?>"alt="" width="320px">
                </div>
                <br/>

                <div class="details_item">
                    <ul class="list">
                        <li><a><span>Original :</span>
                                <?php echo $goodies[0]["ORIGINAL_titre"]; ?></a></li>
                        <li><a><span>Description :</span>
                                <?php echo $goodies[0]["ORIGINAL_description"]; ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>


        <div class="single-product-slider">
            <div class="container">

                <div class="row">
                    <!-- single product -->
                    <?php foreach($goodies as $ungoodie){ ?>

                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img src="<?php echo(base_url());?>style/images/<?php echo $ungoodie["GOODIE_nom_image"]?>"alt="">
                            <div class="product-details">
                                <h6><?php echo $ungoodie["GOODIE_nom"]?></h6>
                                <div class="price">
                                    <h6><?php echo $ungoodie["GOODIE_prix"]?>€</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>

</section>