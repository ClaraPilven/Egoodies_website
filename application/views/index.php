    <!-- start banner Area -->
    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start">
                <div class="col-lg-12">
                    <div class="active-banner-slider owl-carousel">
                        <!-- single-slide -->



                        <?php  $i=1;
                        // pour chaque élement 
                        foreach($actu as $uneactu)
                        { 
                            
                        ?>
                        <div class="row single-slide align-items-center d-flex">
                            <div class="col-lg-5 col-md-6">
                                <div class="banner-content">
                                    <h1>
                                        <?php echo $uneactu["ACTUALITE_titre"]; ?>
                                    </h1>
                                    <p>
                                        <?php echo $uneactu["ACTUALITE_description"]; ?>
                                    </p>
                                    <div class="add-bag d-flex align-items-center">
                                        <a class="add-btn" href="<?php echo(base_url());?>index.php/Accueil/afficher_goodie_original/<?php echo $uneactu["ORIGINAL_id"]; ?>"><span class="lnr lnr-cross"></span></a>
                                        <span class="add-text text-uppercase">Aller voir</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="banner-img">
                                    <img class="img-fluid" src="<?php echo(base_url());?>style/images/<?php echo $uneactu["original_nom_image"]; ?>" alt="">
                                </div>
                            </div>
                        </div>

                        <?php $i++; }?>



                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- start features Area 

    <section class="features-area section_gap">
        <div class="container">
            <div class="row features-inner">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="<?php echo(base_url());?>img/features/f-icon1.png" alt="">
                        </div>
                        <h6>Free Delivery</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="<?php echo(base_url());?>img/features/f-icon2.png" alt="">
                        </div>
                        <h6>Return Policy</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="<?php echo(base_url());?>img/features/f-icon3.png" alt="">
                        </div>
                        <h6>24/7 Support</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="<?php echo(base_url());?>img/features/f-icon4.png" alt="">
                        </div>
                        <h6>Secure Payment</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!-- end features Area -->

    <!-- start product Area -->
    <section class="owl-carousel active-product-area section_gap">
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Suggestions aléatoires</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    
                    <?php 
                    $i = 0;
                    $goodie = $randomgoodies[$i];
                    ?>
                    
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img src="<?php echo(base_url());?>style/images/<?php echo $goodie["GOODIE_nom_image"]?>"alt="">
                            <div class="product-details">
                                <h6><?php echo $goodie["GOODIE_nom"]?></h6>
                                <div class="price">
                                    <h6><?php echo $goodie["GOODIE_prix"]?>€</h6>
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
                    <?php 
                    $i++;
                    $goodie = $randomgoodies[$i];
                    ?>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img src="<?php echo(base_url());?>style/images/<?php echo $goodie["GOODIE_nom_image"]?>"alt="">
                            <div class="product-details">
                                <h6><?php echo $goodie["GOODIE_nom"]?></h6>
                                <div class="price">
                                    <h6><?php echo $goodie["GOODIE_prix"]?>€</h6>
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
                    <?php 
                    $i++;
                    $goodie = $randomgoodies[$i];
                    ?>
                    <!-- single product -->
                   <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img src="<?php echo(base_url());?>style/images/<?php echo $goodie["GOODIE_nom_image"]?>"alt="">
                            <div class="product-details">
                                <h6><?php echo $goodie["GOODIE_nom"]?></h6>
                                <div class="price">
                                    <h6><?php echo $goodie["GOODIE_prix"]?>€</h6>
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
                    <?php 
                    $i++;
                    $goodie = $randomgoodies[$i];
                    ?>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img src="<?php echo(base_url());?>style/images/<?php echo $goodie["GOODIE_nom_image"]?>"alt="">
                            <div class="product-details">
                                <h6><?php echo $goodie["GOODIE_nom"]?></h6>
                                <div class="price">
                                    <h6><?php echo $goodie["GOODIE_prix"]?>€</h6>
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
                    <?php 
                    $i++;
                    $goodie = $randomgoodies[$i];
                    ?>
                    <!-- single product -->
                   <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img src="<?php echo(base_url());?>style/images/<?php echo $goodie["GOODIE_nom_image"]?>"alt="">
                            <div class="product-details">
                                <h6><?php echo $goodie["GOODIE_nom"]?></h6>
                                <div class="price">
                                    <h6><?php echo $goodie["GOODIE_prix"]?>€</h6>
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
                    <?php 
                    $i++;
                    $goodie = $randomgoodies[$i];
                    ?>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img src="<?php echo(base_url());?>style/images/<?php echo $goodie["GOODIE_nom_image"]?>"alt="">
                            <div class="product-details">
                                <h6><?php echo $goodie["GOODIE_nom"]?></h6>
                                <div class="price">
                                    <h6><?php echo $goodie["GOODIE_prix"]?>€</h6>
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
                    <?php 
                    $i++;
                    $goodie = $randomgoodies[$i];
                    ?>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img src="<?php echo(base_url());?>style/images/<?php echo $goodie["GOODIE_nom_image"]?>"alt="">
                            <div class="product-details">
                                <h6><?php echo $goodie["GOODIE_nom"]?></h6>
                                <div class="price">
                                    <h6><?php echo $goodie["GOODIE_prix"]?>€</h6>
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
                    <?php 
                    $i++;
                    $goodie = $randomgoodies[$i];
                    ?>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img src="<?php echo(base_url());?>style/images/<?php echo $goodie["GOODIE_nom_image"]?>"alt="">
                            <div class="product-details">
                                <h6><?php echo $goodie["GOODIE_nom"]?></h6>
                                <div class="price">
                                    <h6><?php echo $goodie["GOODIE_prix"]?>€</h6>
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
                </div>
            </div>
        </div>
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Suggestions aléatoires</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    
                    <?php 
                    $i++;
                    $goodie = $randomgoodies[$i];
                    ?>
                    
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img src="style/images/<?php echo $goodie["GOODIE_nom_image"]?>"alt="">
                            <div class="product-details">
                                <h6><?php echo $goodie["GOODIE_nom"]?></h6>
                                <div class="price">
                                    <h6><?php echo $goodie["GOODIE_prix"]?>€</h6>
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
                    <?php 
                    $i++;
                    $goodie = $randomgoodies[$i];
                    ?>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img src="style/images/<?php echo $goodie["GOODIE_nom_image"]?>"alt="">
                            <div class="product-details">
                                <h6><?php echo $goodie["GOODIE_nom"]?></h6>
                                <div class="price">
                                    <h6><?php echo $goodie["GOODIE_prix"]?>€</h6>
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
                    <?php 
                    $i++;
                    $goodie = $randomgoodies[$i];
                    ?>
                    <!-- single product -->
                   <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img src="style/images/<?php echo $goodie["GOODIE_nom_image"]?>"alt="">
                            <div class="product-details">
                                <h6><?php echo $goodie["GOODIE_nom"]?></h6>
                                <div class="price">
                                    <h6><?php echo $goodie["GOODIE_prix"]?>€</h6>
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
                    <?php 
                    $i++;
                    $goodie = $randomgoodies[$i];
                    ?>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img src="style/images/<?php echo $goodie["GOODIE_nom_image"]?>"alt="">
                            <div class="product-details">
                                <h6><?php echo $goodie["GOODIE_nom"]?></h6>
                                <div class="price">
                                    <h6><?php echo $goodie["GOODIE_prix"]?>€</h6>
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
                    <?php 
                    $i++;
                    $goodie = $randomgoodies[$i];
                    ?>
                    <!-- single product -->
                   <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img src="style/images/<?php echo $goodie["GOODIE_nom_image"]?>"alt="">
                            <div class="product-details">
                                <h6><?php echo $goodie["GOODIE_nom"]?></h6>
                                <div class="price">
                                    <h6><?php echo $goodie["GOODIE_prix"]?>€</h6>
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
                    <?php 
                    $i++;
                    $goodie = $randomgoodies[$i];
                    ?>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img src="style/images/<?php echo $goodie["GOODIE_nom_image"]?>"alt="">
                            <div class="product-details">
                                <h6><?php echo $goodie["GOODIE_nom"]?></h6>
                                <div class="price">
                                    <h6><?php echo $goodie["GOODIE_prix"]?>€</h6>
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
                    <?php 
                    $i++;
                    $goodie = $randomgoodies[$i];
                    ?>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img src="style/images/<?php echo $goodie["GOODIE_nom_image"]?>"alt="">
                            <div class="product-details">
                                <h6><?php echo $goodie["GOODIE_nom"]?></h6>
                                <div class="price">
                                    <h6><?php echo $goodie["GOODIE_prix"]?>€</h6>
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
                    <?php 
                    $i++;
                    $goodie = $randomgoodies[$i];
                    ?>
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img src="style/images/<?php echo $goodie["GOODIE_nom_image"]?>"alt="">
                            <div class="product-details">
                                <h6><?php echo $goodie["GOODIE_nom"]?></h6>
                                <div class="price">
                                    <h6><?php echo $goodie["GOODIE_prix"]?>€</h6>
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
                </div>
            </div>
        </div>
    </section>
    <!-- end product Area

    <section class="exclusive-deal-area">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 no-padding exclusive-left">
                    <div class="row clock_sec clockdiv" id="clockdiv">
                        <div class="col-lg-12">
                            <h1>Exclusive Hot Deal Ends Soon!</h1>
                            <p>Who are in extremely love with eco friendly system.</p>
                        </div>
                        <div class="col-lg-12">
                            <div class="row clock-wrap">
                                <div class="col clockinner1 clockinner">
                                    <h1 class="days">150</h1>
                                    <span class="smalltext">Days</span>
                                </div>
                                <div class="col clockinner clockinner1">
                                    <h1 class="hours">23</h1>
                                    <span class="smalltext">Hours</span>
                                </div>
                                <div class="col clockinner clockinner1">
                                    <h1 class="minutes">47</h1>
                                    <span class="smalltext">Mins</span>
                                </div>
                                <div class="col clockinner clockinner1">
                                    <h1 class="seconds">59</h1>
                                    <span class="smalltext">Secs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="" class="primary-btn">Shop Now</a>
                </div>
                <div class="col-lg-6 no-padding exclusive-right">
                    <div class="active-exclusive-product-slider">

                        <div class="single-exclusive-slider">
                            <img class="img-fluid" src="img/product/e-p1.png" alt="">
                            <div class="product-details">
                                <div class="price">
                                    <h6>$150.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                                <h4>addidas New Hammer sole
                                    for Sports person</h4>
                                <div class="add-bag d-flex align-items-center justify-content-center">
                                    <a class="add-btn" href=""><span class="ti-bag"></span></a>
                                    <span class="add-text text-uppercase">Add to Bag</span>
                                </div>
                            </div>
                        </div>
                        <div class="single-exclusive-slider">
                            <img class="img-fluid" src="img/product/e-p1.png" alt="">
                            <div class="product-details">
                                <div class="price">
                                    <h6>$150.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                                <h4>addidas New Hammer sole
                                    for Sports person</h4>
                                <div class="add-bag d-flex align-items-center justify-content-center">
                                    <a class="add-btn" href=""><span class="ti-bag"></span></a>
                                    <span class="add-text text-uppercase">Add to Bag</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End exclusive deal Area -->

    <!-- Start brand Area 
    <section class="brand-area section_gap">
        <div class="container">
            <div class="row">
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="img/brand/1.png" alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="img/brand/2.png" alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="img/brand/3.png" alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="img/brand/4.png" alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="img/brand/5.png" alt="">
                </a>
            </div>
        </div>
    </section>
    <!-- End brand Area -->

    <!-- Start related-product Area 
    <section class="related-product-area section_gap_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Deals of the Week</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="img/r1.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="img/r2.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="img/r3.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="img/r5.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="img/r6.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="img/r7.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="img/r9.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="img/r10.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="img/r11.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ctg-right">
                        <a href="#" target="_blank">
                            <img class="img-fluid d-block mx-auto" src="img/category/c5.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End related-product Area -->

    