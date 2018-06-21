                        <div id="hero">
                            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                                <?php
                                    include_once '../admin/slide/slide_class.php';
                                    $b=new slide();
                                    $ds3=$b->getdata();
                                    foreach ($ds3 as $key) {
                                ?>
                                <div class="item" style="background-image: url(./Upload/<?=$key->image?>);">
                                    <div class="container-fluid">
                                        <div class="caption bg-color vertical-center text-left">
                                            <div class="slider-header fadeInDown-1">Các thương hiệu hàng đầu</div>
                                            <div class="big-text fadeInDown-1"> Những bộ sưu tập mới </div>
                                            <div class="excerpt fadeInDown-2 hidden-xs"> <span>Chúng tôi luôn muốn mang đến cho khách hàng những sản phẩm tốt nhất</span> </div>
                                            <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Mua hàng ngay bây giờ</a> </div>
                                        </div>
                                        <!-- /.caption --> 
                                    </div>
                                    <!-- /.container-fluid --> 
                                </div>
                                <?php }?>
                            </div>
                            <!-- /.owl-carousel --> 
                        </div>
                        <div class="info-boxes wow fadeInUp">
                            <div class="info-boxes-inner">
                                <div class="row">
                                    <div class="col-md-6 col-sm-4 col-lg-4">
                                        <div class="info-box">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <h4 class="info-box-heading green">Dịch vụ</h4>
                                                </div>
                                            </div>
                                            <h6 class="text">Giao hàng nhanh nhất</h6>
                                        </div>
                                    </div>
                                    <!-- .col -->

                                    <div class="hidden-md col-sm-4 col-lg-4">
                                        <div class="info-box">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <h4 class="info-box-heading green">Giao hàng miễn phí</h4>
                                                </div>
                                            </div>
                                            <h6 class="text">Với những hóa đơn trên 500,000 VNĐ</h6>
                                        </div>
                                    </div>
                                    <!-- .col -->

                                    <div class="col-md-6 col-sm-4 col-lg-4">
                                        <div class="info-box">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <h4 class="info-box-heading green">Giảm giá đặc biệt</h4>
                                                </div>
                                            </div>
                                            <h6 class="text">Giảm giá lên đến 5% cho tất cả sản phẩm</h6>
                                        </div>
                                    </div>
                                    <!-- .col --> 
                                </div>
                                <!-- /.row --> 
                            </div>
                        </div>
                        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                            <div class="more-info-tab clearfix ">
                                <h3 class="new-product-title pull-left">Sản phẩm mới</h3>
                            </div>
                            <div class="tab-content outer-top-xs">
                                <div class="tab-pane in active" id="all">
                                    <div class="product-slider">
                                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                            <?php
                                                $ds4=$a->getnew();
                                                foreach ($ds4 as $key) {
                                            ?>
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="detail.php?id=<?=$key->id?>"><img  src="Upload/<?=$key->image?>" alt=""></a> </div>
                                                            <div class="tag new"><span>new</span></div>
                                                        </div>
                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="detail.php?id=<?=$key->id?>"><?=$key->id_pro?></a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>
                                                            <div class="product-price"> <span class="price"><?=number_format($key->price-($key->price*$key->discount/100))?> </span> <span class="price-before-discount"><?=number_format($key->price)?></span> </div>
                                                        </div>
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <?php
                                                                        if (!isset($_SESSION['user'])) {
                                                                            ?>
                                                                            <a href="index.php?p=new/login.php" data-toggle="tooltip" class="btn btn-primary icon"  title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a>
                                                                        <?php
                                                                    }else{
                                                                        ?>
                                                                        <a href="listofcart.php?id=<?=$key->id?>" data-toggle="tooltip" class="btn btn-primary icon"  title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a>
                                                                        <?php } ?>
                                                                    </li>
                                                                    <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="router.php?id=<?=$key->id?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.product --> 

                                                </div>
                                                <!-- /.products --> 
                                            </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <!-- /.home-owl-carousel --> 
                                    </div>
                                    <!-- /.product-slider --> 
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content --> 
                        </div>
                        <div class="wide-banners wow fadeInUp outer-bottom-xs">
                            <div class="row">
                                <div class="col-md-7 col-sm-7">
                                    <div class="wide-banner cnt-strip">
                                        <div class="image"> <img class="img-responsive" src="area/assets/images/banners/home-banner1.jpg" alt=""> </div>
                                    </div>
                                    <!-- /.wide-banner --> 
                                </div>
                                <!-- /.col -->
                                <div class="col-md-5 col-sm-5">
                                    <div class="wide-banner cnt-strip">
                                        <div class="image"> <img class="img-responsive" src="area/assets/images/banners/home-banner2.jpg" alt=""> </div>
                                    </div>
                                    <!-- /.wide-banner --> 
                                </div>
                                <!-- /.col --> 
                            </div>
                            <!-- /.row --> 
                        </div>
                        <section class="section featured-product wow fadeInUp">
                            <h3 class="section-title">Sản phẩm đặc trưng</h3>
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                                <?php
                                    $ds5=$a->getfeatured();
                                    foreach ($ds5 as $key) {
                                ?>
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image"> <a href="detail.php?id=<?=$key->id?>"><img  src="Upload/<?=$key->image?>" alt=""></a> </div>
                                                <div class="tag hot"><span>hot</span></div>
                                            </div>
                                            <!-- /.product-image -->
                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.php?id=<?=$key->id?>"><?=$key->id_pro?></a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>
                                                <div class="product-price"> <span class="price"><?=number_format($key->price-($key->price*$key->discount/100))?></span> <span class="price-before-discount"><?=number_format($key->price)?></span> </div>
                                                <!-- /.product-price --> 

                                            </div>
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <?php
                                                                if (!isset($_SESSION['user'])) {
                                                            ?>
                                                            <a href="index.php?p=new/login.php" data-toggle="tooltip" class="btn btn-primary icon"  title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a><?php
                                                        }else{
                                                            ?>
                                                            <a href="listofcart.php?id=<?=$key->id?>" data-toggle="tooltip" class="btn btn-primary icon"  title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a>
                                                        <?php }
                                                        ?>
                                                        </li>
                                                        <li class="lnk wishlist"> <a class="add-to-cart" href="router.php?id=<?=$key->id?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                    </ul>
                                                </div>
                                                <!-- /.action --> 
                                            </div>
                                        </div>
                                        <!-- /.product --> 

                                    </div>
                                    <!-- /.products --> 
                                </div>
                                <?php } ?>
                            </div>
                            <!-- /.home-owl-carousel --> 
                        </section>
                        <div class="wide-banners wow fadeInUp outer-bottom-xs">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wide-banner cnt-strip">
                                        <div class="image"> <img class="img-responsive" src="area/assets/images/banners/home-banner.jpg" alt=""> </div>
                                        <div class="strip strip-text">
                                            <div class="strip-inner">
                                                <h2 class="text-right">Thời trang cho phái mạnh<br>
                                                    <span class="shopping-needs">Giảm giá lên đến 30%</span></h2>
                                            </div>
                                        </div>
                                        <div class="new-label">
                                            <div class="text">NEW</div>
                                        </div>
                                        <!-- /.new-label --> 
                                    </div>
                                    <!-- /.wide-banner --> 
                                </div>
                                <!-- /.col --> 

                            </div>
                            <!-- /.row --> 
                        </div>
                        <div class="best-deal wow fadeInUp outer-bottom-xs">
                            <h3 class="section-title">Mặt hàng chạy nhất</h3>
                            <div class="sidebar-widget-body outer-top-xs">
                                <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                                    <?php
                                        $ds6=$a->getbestseller();
                                        foreach ($ds6 as $key) {
                                    ?>
                                    <div class="item">
                                        <div class="products best-product">
                                            <div class="product">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row">
                                                        <div class="col col-xs-5">
                                                            <div class="product-image">
                                                                <div class="image"> <a href="detail.php?id=<?=$key->id?>"> <img src="Upload/<?=$key->image?>" alt=""> </a> </div>
                                                                <!-- /.image --> 

                                                            </div>
                                                            <!-- /.product-image --> 
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col2 col-xs-7">
                                                            <div class="product-info">
                                                                <h3 class="name"><a href="detail.php?id=<?=$key->id?>"><?=$key->id_pro?></a></h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="product-price"> <span class="price"><?=number_format($key->price-($key->price*$key->discount/100))?></span> </div>
                                                                <!-- /.product-price --> 

                                                            </div>
                                                        </div>
                                                        <!-- /.col --> 
                                                    </div>
                                                    <!-- /.product-micro-row --> 
                                                </div>
                                                <!-- /.product-micro --> 

                                            </div>
                                            
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- /.sidebar-widget-body --> 
                        </div>
                        <section class="section wow fadeInUp new-arriavls">
                            <h3 class="section-title">Mặt hàng mới về</h3>
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                                <?php
                                        $ds7=$a->getarrival();
                                        foreach ($ds7 as $key) {
                                    ?>
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image"> <a href="detail.php?id=<?=$key->id?>"><img  src="Upload/<?=$key->image?>" alt=""></a> </div>
                                                <!-- /.image -->

                                                <div class="tag sale"><span>sale</span></div>
                                            </div>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.php?id=<?$key->id?>"><?=$key->id_pro?></a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>
                                                <div class="product-price"> <span class="price"><?=number_format($key->price-($key->price*$key->discount/100))?></span> <span class="price-before-discount"></span><?=number_format($key->price)?></span> </div>
                                                <!-- /.product-price --> 

                                            </div>
                                            <!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <?php
                                                                if (!isset($_SESSION['user'])) {
                                                            ?>
                                                            <a href="index.php?p=new/login.php" data-toggle="tooltip" class="btn btn-primary icon"  title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a><?php
                                                        }else{
                                                            ?><a href="listofcart.php?id=<?=$key->id?>" data-toggle="tooltip" class="btn btn-primary icon"  title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a>
                                                        <?php }
                                                        ?>
                                                        </li>
                                                        <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="router.php?id=<?=$key->id?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                    </ul>
                                                </div>
                                                <!-- /.action --> 
                                            </div>
                                            <!-- /.cart --> 
                                        </div>
                                        <!-- /.product --> 

                                    </div>
                                    <!-- /.products --> 
                                </div>
                                <?php } ?>
                            </div>
                        </section>