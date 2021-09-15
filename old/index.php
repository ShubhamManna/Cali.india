<?php
require('top.inc.php');
?>

<main>
        <section class="banner">
            <div class="container">
                <h5>WHERE EVERY WEEK</h5>
                <h4>IS FASHION WEEK</h4>
                <P>Grab the best deals</P>
                <button>SHOP NOW</button>
            </div>
        </section>
        <!--vibes-->
        <div class="container-fluid">
            <div class="titles">
                WE GOT YOUR VIBE
            </div>
            <div class="vibes-slider">
                <div class="vibes-slider-one">
                    <div><img src="assets/banner.png" class="img-fluid" alt="Banner 1" ></div>
                    <div><img src="assets/banner2.png" class="img-fluid" alt="Banner 1"></div>
                    <div><img src="assets/banner.png" class="img-fluid" alt="Banner 1"></div>
                    <div><img src="assets/banner.png" class="img-fluid" alt="Banner 1" ></div>
                    <div><img src="assets/banner2.png" class="img-fluid" alt="Banner 1"></div>
                    <div><img src="assets/banner.png" class="img-fluid" alt="Banner 1"></div>
                </div>
            </div>
        </div>
        <!--categories-->
        <div class="container-fluid">
            <div class="titles">
                FOR ALL YOUR FASHION NEEDS
            </div>
            <div class="vibes-slider">
                <div class="vibes-slider-one">
                    <div><img src="assets/banner.png" class="img-fluid" alt="Banner 1" ></div>
                    <div><img src="assets/banner2.png" class="img-fluid" alt="Banner 1"></div>
                    <div><img src="assets/banner.png" class="img-fluid" alt="Banner 1"></div>
                    <div><img src="assets/ER033.jpg" class="img-fluid" alt="Banner 1" ></div>
                    <div><img src="assets/banner2.png" class="img-fluid" alt="Banner 1"></div>
                    <div><img src="assets/banner.png" class="img-fluid" alt="Banner 1"></div>
                </div>
            </div>
        </div>
        <!--brands-->
        <div class="container-fluid">
            <div class="titles">
                BRANDS
            </div>
            <div class="vibes-slider">
                <div class="vibes-slider-one">
                    <div><img src="assets/banner.png" class="img-fluid" alt="Banner 1" ></div>
                    <div><img src="assets/banner2.png" class="img-fluid" alt="Banner 1"></div>
                    <div><img src="assets/ER033.jpg" class="img-fluid" alt="Banner 1"></div>
                    <div><img src="assets/banner.png" class="img-fluid" alt="Banner 1" ></div>
                    <div><img src="assets/banner2.png" class="img-fluid" alt="Banner 1"></div>
                    <div><img src="assets/ER033.jpg" class="img-fluid" alt="Banner 1"></div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="titles">Product Card</div>
        <br>
        <br>
        <br>
        <div style="height: 10px;"></div>
        <div class="container">
            <div class="site-slider">
                <div class="slider-one">
                    <?php 
                        $get_product=get_product($con,3);
                        foreach ($get_product as $list) {
                        ?>
                    <div>
                        <div class="card">
                            <a href="product.php?id=<?php echo $list['id']; ?>">
                          <img src= "<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image'];?>" alt="<?php echo $list['name'] ?>" style="width:100%">
                          <h1><?php echo $list['name']; ?></h1>
                            </a>
                          <p class="price"><?php echo $list['mrp']; ?></p>
                          <p><?php echo $list['short_desc']; ?></p>
                          <p><button>Add to Cart</button></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="slider-btn">
                    <span class="prev position-top"><i class="fas fa-chevron-left"></i></span>
                    <span class="next position-top right-0"><i class="fas fa-chevron-right"></i></span>
                </div>
            </div>
        </div>

        <section style="height: 10px;"></section>
<div class='container-fluid' style="margin-top: 30px; text-align: justify;">
        <div>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos, inventore. Facere, repudiandae eos perspiciatis reiciendis aliquid excepturi maxime ipsa aut qui. Similique nobis neque ratione consectetur quisquam facere, repudiandae harum.
        </div>
        <div>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos, inventore. Facere, repudiandae eos perspiciatis reiciendis aliquid excepturi maxime ipsa aut qui. Similique nobis neque ratione consectetur quisquam facere, repudiandae harum.
        </div>
        <div>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos, inventore. Facere, repudiandae eos perspiciatis reiciendis aliquid excepturi maxime ipsa aut qui. Similique nobis neque ratione consectetur quisquam facere, repudiandae harum.
        </div>
        <div>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos, inventore. Facere, repudiandae eos perspiciatis reiciendis aliquid excepturi maxime ipsa aut qui. Similique nobis neque ratione consectetur quisquam facere, repudiandae harum.
        </div>
    </div>
    </main>
    <?php
include('footer.inc.php');
?>