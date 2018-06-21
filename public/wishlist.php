
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="MediaCenter, Template, eCommerce">
        <meta name="robots" content="all">
        <title>Danh sách yêu thích</title>
        <link rel="stylesheet" href="area/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="area/assets/css/main.css">
        <link rel="stylesheet" href="area/assets/css/blue.css">
        <link rel="stylesheet" href="area/assets/css/owl.carousel.css">
        <link rel="stylesheet" href="area/assets/css/owl.transitions.css">
        <link rel="stylesheet" href="area/assets/css/animate.min.css">
        <link rel="stylesheet" href="area/assets/css/rateit.css">
        <link rel="stylesheet" href="area/assets/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="area/assets/css/font-awesome.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<?php
            include_once '../admin/customer/customer_class.php';
            include_once '../admin/product_group/product_group_class.php';
            include_once '../admin/wishlist/wishlist_class.php';
            include_once 'code/Navigation.php';
            $data = new Navigation();
            include 'code/auth.php';
            $data = new Navigation();
            $a="";
            session_start();
            if(isset($_SESSION['user']) && $_SESSION['user']!=null)
            $a=Auth::getLoggediUser();
            else $a="";
            $cs=new customer();
            $wl=new wishlist();
            $pg=new product_group();
            $dspg=$pg->getdata();
            $dscus=$cs->getemail(Auth::getLoggediUser());
            foreach ($dscus as $key) {
                    $wl->id_cus=$key->id;
            }
            $wl1=new wishlist();
            //echo $wl->id_cus;
            $dswl=$wl1->getcusid($wl->id_cus);
        ?>
    </head>
    <body class="cnt-home">
        <header class="header-style-1">
        </header>
        <div class="breadcrumb">
            <div class="container">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li class='active'><a class="btn btn-info" href="index.php"><i class="fa fa-reply-all"></i>Trang chủ</a></li>
                    </ul>
                </div><!-- /.breadcrumb-inner -->
            </div><!-- /.container -->
        </div><!-- /.breadcrumb -->
        <div class="body-content">
            <div class="container">
                <div class="my-wishlist-page">
                    <div class="row">
                        <div class="col-md-12 my-wishlist">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="4" class="heading-title">Danh sách yêu thích</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($dspg as $key) {
                                                foreach ($dswl as $value) {
                                                 if($key->id==$value->id_progroup){

                                        ?><tr>
                                            <td class="col-md-2"><img src="Upload/<?=$key->image?>" alt="imga"></td>
                                            <td class="col-md-7">
                                                <div class="product-name"><a href="detail.php?id=<?=$key->id?>"><?=$key->id_pro?></a></div>
                                                <div class="rating">
                                                    <i class="fa fa-star rate"></i>
                                                    <i class="fa fa-star rate"></i>
                                                    <i class="fa fa-star rate"></i>
                                                    <i class="fa fa-star rate"></i>
                                                    <i class="fa fa-star non-rate"></i>
                                                    <span class="review">( <?=$key->vote?> Vote)</span>
                                                </div>
                                                <div class="price">
                                                    <?=number_format(($key->price-($key->price*$key->discount/100)))?>
                                                    <span><?=number_format($key->price)?></span>
                                                </div>
                                            </td>
                                            <td class="col-md-2">
                                                <a href="listofcart.php?id=<?=$key->id?>" class="btn-upper btn btn-primary">Thêm vào giỏ hàng</a>
                                            </td>
                                            <td class="col-md-1 close-btn">
                                                <a href="wishlist_delete.php?id=<?=$value->id?>" class=""><i class="fa fa-times" onclick="return confirm('Bạn có chắc chắn xóa bản ghi này?')"></i></a>
                                            </td>
                                        </tr>
                                            <?php }}} ?>
                                    </tbody><!-- /tbody -->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="brands-carousel" class="logo-slider wow fadeInUp">

                    <div class="logo-slider-inner"> 
                        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                            <div class="item m-t-15">
                                <a href="#" class="image">
                                    <img data-echo="area/assets/images/brands/brand1.png" src="area/assets/images/blank.gif" alt="">
                                </a>    
                            </div><!--/.item-->

                            <div class="item m-t-10">
                                <a href="#" class="image">
                                    <img data-echo="area/assets/images/brands/brand2.png" src="area/assets/images/blank.gif" alt="">
                                </a>    
                            </div><!--/.item-->

                            <div class="item">
                                <a href="#" class="image">
                                    <img data-echo="area/assets/images/brands/brand3.png" src="area/assets/images/blank.gif" alt="">
                                </a>    
                            </div><!--/.item-->

                            <div class="item">
                                <a href="#" class="image">
                                    <img data-echo="area/assets/images/brands/brand4.png" src="area/assets/images/blank.gif" alt="">
                                </a>    
                            </div><!--/.item-->

                            <div class="item">
                                <a href="#" class="image">
                                    <img data-echo="area/assets/images/brands/brand5.png" src="area/assets/images/blank.gif" alt="">
                                </a>    
                            </div><!--/.item-->

                            <div class="item">
                                <a href="#" class="image">
                                    <img data-echo="area/assets/images/brands/brand6.png" src="area/assets/images/blank.gif" alt="">
                                </a>    
                            </div><!--/.item-->

                            <div class="item">
                                <a href="#" class="image">
                                    <img data-echo="area/assets/images/brands/brand2.png" src="area/assets/images/blank.gif" alt="">
                                </a>    
                            </div><!--/.item-->

                            <div class="item">
                                <a href="#" class="image">
                                    <img data-echo="area/assets/images/brands/brand4.png" src="area/assets/images/blank.gif" alt="">
                                </a>    
                            </div><!--/.item-->

                            <div class="item">
                                <a href="#" class="image">
                                    <img data-echo="area/assets/images/brands/brand1.png" src="area/assets/images/blank.gif" alt="">
                                </a>    
                            </div><!--/.item-->
                            <div class="item">
                                <a href="#" class="image">
                                    <img data-echo="area/assets/images/brands/brand5.png" src="area/assets/images/blank.gif" alt="">
                                </a>    
                            </div><!--/.item-->
                        </div><!-- /.owl-carousel #logo-slider -->
                    </div>

                </div>
            </div>
        </div>
        <?php include_once 'headleftfoot/footer.php'; ?>
        <script src="area/assets/js/jquery-1.11.1.min.js"></script>

        <script src="area/assets/js/bootstrap.min.js"></script>

        <script src="area/assets/js/bootstrap-hover-dropdown.min.js"></script>
        <script src="area/assets/js/owl.carousel.min.js"></script>

        <script src="area/assets/js/echo.min.js"></script>
        <script src="area/assets/js/jquery.easing-1.3.min.js"></script>
        <script src="area/assets/js/bootstrap-slider.min.js"></script>
        <script src="area/assets/js/jquery.rateit.min.js"></script>
        <script type="text/javascript" src="area/assets/js/lightbox.min.js"></script>
        <script src="area/assets/js/bootstrap-select.min.js"></script>
        <script src="area/assets/js/wow.min.js"></script>
        <script src="area/assets/js/scripts.js"></script>

    </body>
</html>
