<div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
                        <div class="side-menu animate-dropdown outer-bottom-xs">
                            <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>Danh mục sản phẩm</div>
                            <nav class="yamm megamenu-horizontal">
                                <ul class="nav">
                                    <?php
                                            $j=4;
                                            foreach ($ds2 as $value) {
                                                $j++;
                                        ?>
                                    <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-diamond"></i><?=$value->name?></a>
                                        <ul class="dropdown-menu mega-menu">
                                            <li class="yamm-content">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-3">
                                                        <ul class="links list-unstyled">
                                                             <?php 
                                                                    $con =explode(',',$value->obj_id);
                                                                    foreach ($con as $con1) {
                                                                        list($id,$name) = explode(':',$con1);
                                                                        ?>
                                                                        <li><?=$data->link1("product/product_cate.php&id_cg=$id","$name")?></li>                 
                                                                        <?php 
                                                                        }
                                                                         ?>
                                                        </ul>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-9 col-menu banner-image"> <img class="img-responsive" src="area/assets/images/banners/<?=$j?>.jpg" alt=""> </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row --> 
                                            </li>
                                            <!-- /.yamm-content -->
                                        </ul>
                                        <!-- /.dropdown-menu --> </li>
                                        <?php } ?>
                                </ul>
                                <!-- /.nav --> 
                            </nav>
                            <!-- /.megamenu-horizontal --> 
                        </div>
                        <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
                            <h3 class="section-title">Ưu đãi lớn</h3>
                            <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                                <?php
                                            include_once 'product/class.php';
                                            $a=new product_public();
                                            $ds=$a->gethotdeal();
                                           foreach ($ds as $key) {
                                        ?>
                                <div class="item">
                                    <div class="products">
                                        <div class="hot-deal-wrapper">
                                            <div class="image"><a href="detail.php?id=<?=$key->id?>"> <img src="Upload/<?=$key->image?>" alt=""></a></div>
                                            <div class="sale-offer-tag"><span><?=$key->discount?><br>
                                                    off</span></div>
                                        </div>
                                        <!-- /.hot-deal-wrapper -->

                                        <div class="product-info text-left m-t-20">
                                            <h3 class="name"><a href="detail.php?id=<?=$key->id?>"><?=$key->id_pro?></a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="product-price"> <span class="price"><?=number_format($key->price-($key->price*$key->discount/100))?> </span> <span class="price-before-discount"><?=number_format($key->price)?></span> </div>
                                            <!-- /.product-price --> 

                                        </div>
                                        <!-- /.product-info -->
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <!-- /.sidebar-widget --> 
                        </div>

                        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                            <h3 class="section-title">Khuyến mãi đặc biệt</h3>
                            <div class="sidebar-widget-body outer-top-xs">
                                <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                                    <?php
                                            $ds1=$a->getspecialoffer();
                                            foreach ($ds1 as $key) {
                                        ?>
                                    <div class="item">
                                        <div class="products special-product">
                                            <div class="product">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row">
                                                        <div class="col col-xs-5">
                                                            <div class="product-image">
                                                                <div class="image"> <a href="detail.php?id=<?=$key->id?>"> <img src="Upload/<?=$key->image?>" alt=""> </a></div>
                                                                <!-- /.image --> 

                                                            </div>
                                                            <!-- /.product-image --> 
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col col-xs-7">
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
                        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                            <h3 class="section-title">Bán xả hàng</h3>
                            <div class="sidebar-widget-body outer-top-xs">
                                <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                                    <?php
                                        $ds2=$a->getspecialdeal();
                                        foreach ($ds2 as $key) {
                                    ?>
                                    <div class="item">
                                        <div class="products special-product">
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
                                                        <div class="col col-xs-7">
                                                            <div class="product-info">
                                                                <h3 class="name"><a href="detail.php?id=<?=$key->id?>"><?=$key->id_pro?></a></h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="product-price"> <span class="price"><?=number_format($key->price-($key->price*$key->discount/100))?> </span> </div>
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
                       
                        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                            <div id="advertisement" class="advertisement">
                                <div class="item">
                                    <div class="avatar"><img src="area/assets/images/testimonials/member1.png" alt="Image"></div>
                                    <div class="testimonials"><em>"</em> Chúng tôi luôn cải thiện sự phục vụ để thỏa mãn yêu cầu của khách hàng. Hãy gửi những phản hồi của bạn cho website.<em>"</em></div>
                                    <div class="clients_author">John Doe <span>Nhà thiết kế</span> </div>
                                    <!-- /.container-fluid --> 
                                </div>
                                <!-- /.item -->

                                <div class="item">
                                    <div class="avatar"><img src="area/assets/images/testimonials/member3.png" alt="Image"></div>
                                    <div class="testimonials"><em>"</em>Sự hài lòng của khách hàng là niềm vui đối với chúng tôi.<em>"</em></div>
                                    <div class="clients_author">Stephen Doe <span>Nhà quản lý</span> </div>
                                </div>
                                <!-- /.item -->

                                <div class="item">
                                    <div class="avatar"><img src="area/assets/images/testimonials/member2.png" alt="Image"></div>
                                    <div class="testimonials"><em>"</em>Khách hàng đến với website sẽ được cung cấp những sản phẩm tốt nhất cho mình.<em>"</em></div>
                                    <div class="clients_author">Nhà phát triển <span>CEO &amp; Co</span> </div>
                                    <!-- /.container-fluid --> 
                                </div>
                                <!-- /.item --> 

                            </div>
                            <!-- /.owl-carousel --> 
                        </div>
                        <div class="home-banner"> <img src="area/assets/images/banners/LHS-banner.jpg" alt="Image"> </div>
                        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                            <h3 class="section-title">Tìm kiếm sản phẩm theo giá</h3>
                            <!--<div class="sidebar-widget-body outer-top-xs">
                                <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                                    <?php
                                            $ds1=$a->getspecialoffer();
                                            foreach ($ds1 as $key) {
                                        ?>
                                    <div class="item">
                                        <div class="products special-product">
                                            <div class="product">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row">
                                                        <div class="col col-xs-5">
                                                            <div class="product-image">
                                                                <div class="image"> <a href="detail.php?id=<?=$key->id?>"> <img src="Upload/<?=$key->image?>" alt=""> </a></div>
                                                                

                                                            </div>
                                                             
                                                        </div>
                                                        
                                                        <div class="col col-xs-7">
                                                            <div class="product-info">
                                                                <h3 class="name"><a href="detail.php?id=<?=$key->id?>"><?=$key->id_pro?></a></h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="product-price"> <span class="price"><?=number_format($key->price-($key->price*$key->discount/100))?></span> </div>
                                                               

                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                               

                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>-->
                            <table><ul>
                                <tr><td>
                                <li role="presentation"><a style="color: black;" role="menuitem" tabindex="-1" href="index.php?p=category/price_product.php&from=50000&to=200000">50000 - 200000 VNĐ</a>
                                </li></td></tr>
                                <tr><td><li role="presentation"><a style="color: black;" role="menuitem" tabindex="-1" href="index.php?p=category/price_product.php&from=200000&to=500000">
                                 200000 - 500000 VNĐ</a>
                                </li></td></tr>
                                <tr><td><li role="presentation"><a style="color: black;" role="menuitem" tabindex="-1" href="index.php?p=category/price_product.php&from=500000&to=1000000">
                                500000 - 1000000 VNĐ</a>
                                </li></td></tr>
                            </ul>
                            </table>
                        </div>
                    </div>