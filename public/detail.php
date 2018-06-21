
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="MediaCenter, Template, eCommerce">
        <meta name="robots" content="all">
        <title>Bán hàng online</title>
        <link rel="stylesheet" href="area/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="area/assets/css/main.css">
        <link rel="stylesheet" href="area/assets/css/blue.css">
        <link rel="stylesheet" href="area/assets/css/owl.carousel.css">
        <link rel="stylesheet" href="area/assets/css/owl.transitions.css">
        <link rel="stylesheet" href="area/assets/css/animate.min.css">
        <link rel="stylesheet" href="area/assets/css/rateit.css">
        <link rel="stylesheet" href="area/assets/css/bootstrap-select.min.css">
        <link href="area/assets/css/lightbox.css" rel="stylesheet">

        <style type="text/css">
            a:active{
                background:yellow;
            }
        </style>

        <!-- Icons/Glyphs -->
        <link rel="stylesheet" href="area/assets/css/font-awesome.css">

        <!-- Fonts --> 
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    </head>
    <body class="cnt-home">
        <?php
            include_once 'code/Navigation.php';
            $data = new Navigation();
            include 'code/auth.php';
            $data = new Navigation();
            $a="";
            session_start();
            if(isset($_SESSION['user']) && $_SESSION['user']!=null)
            $a=Auth::getLoggediUser();
            else $a="";
        ?>
        <?php include_once 'headleftfoot/header.php'; ?>
        <?php
            $id=(string)$_GET["id"];
            include_once '../admin/product_group/product_group_class.php';
            $pro=new product_group();
            $detail=$pro->get($id);
            foreach ($detail as $key) {
        ?>
        <div class="breadcrumb">
            <div class="container">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <?php
                            include_once '../admin/product/product_class.php';
                                $b=new product();
                                $name=$b->getdata();
                                foreach ($name as $value) {
                                if($value->id==$key->id_pro){
                                $idcate=$b->laydulieu();
                                foreach ($idcate as $value1) {
                                    if($value1->id==$value->id)
                                        $x=$value1->id_cate;
                                }
                                }
                            }
                        ?>
                        <li class='active'><a href="index.php?p=product/product_cate.php&id_cg=<?=$x?>"><?php
                            
                                 foreach ($name as $value) {
                                if($value->id==$key->id_pro)
                                echo $value->id_cate;
                            }
                        }
                        ?></a></li>
                    </ul>
                </div><!-- /.breadcrumb-inner -->
            </div><!-- /.container -->
        </div><!-- /.breadcrumb -->
        <div class="body-content outer-top-xs">
            <div class='container'>
                <div class='row single-product'>
                    <?php include_once 'headleftfoot/leftdetail.php'; ?>
                    <div class='col-md-9'>
                        <div class="detail-block">
                            <div class="row  wow fadeInUp">

                                <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                    <div class="product-item-holder size-big single-product-gallery small-gallery">
                                        <?php
                                        $q=0;
                                            foreach ($detail as $key){
                                                $dsswap=$pro->getidpro($key->id_pro);
                                        ?>
                                        <div id="owl-single-product">
                                            <?php
                                            foreach ($dsswap as $value) {
                                                    $q++;
                                            ?>
                                            <div class="single-product-gallery-item" id="detail.php?id=<?=$value->id?>">
                                                <a data-lightbox="image-1" data-title="Gallery" href="Upload/<?=$value->image?>">
                                                    <img class="img-responsive" alt="" src="Upload/<?=$key->image?>" />
                                                </a>
                                            </div>
                                               <?php } ?> 
                                        </div>
                                        <div class="single-product-gallery-thumbs gallery-thumbs">

                                            <div id="owl-single-product-thumbnails">
                                                <?php
                                                $q=0;
                                            foreach ($dsswap as $value) {
                                                    $q++;
                                            ?>
                                                <div class="item">
                                                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="detail.php?id=<?=$value->id?>">
                                                        <img class="img-responsive" width="85" alt="" src="Upload/<?=$key->image?>" data-echo="Upload/<?=$value->image?>" />
                                                    </a>
                                                </div>
                                                <?php } ?> 
                                            </div>
                                        </div>
                                    </div>
                                </div>   			
                                <div class='col-sm-6 col-md-7 product-info-block'>
                                    <div class="product-info">
                                        <h1 class="name">
                                            <?php
                                            $getname=$b->get($key->id_pro);
                                            foreach ($getname as $value) {
                                                echo $value->name;
                                            }
                                            ?>
                                        </h1>
                                        <div class="rating-reviews m-t-20">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div>Vote: </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="reviews">
                                                        <a href="#" class="lnk"><?=$key->vote?> Vote</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.row -->		
                                        </div><!-- /.rating-reviews -->

                                        <div class="stock-container info-container m-t-10">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="stock-box">
                                                        <span class="label">Thương Hiệu: </span>
                                                    </div>	
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="stock-box">
                                                        <span class="value"><?php
                                                            include_once '../admin/brand/brand_class.php';
                                                            $br=new brand();
                                                         foreach ($getname as $value) {
                                                                $brand1=$br->get($value->id_brand);
                                                                foreach ($brand1 as $value2) {
                                                                    echo $value2->name;
                                                                }
                                                            }
                                                         
                                                        ?></span>
                                                    </div>	
                                                </div>
                                            </div><!-- /.row -->	
                                        </div>
                                        <?php
                                            include_once '../admin/color/color_class.php';
                                            $cl=new color();
                                            $getcolor=$cl->get($key->id_color);
                                            foreach ($getcolor as $value3) {
                                                $color1=$value3->name;
                                            }
                                        ?>
                                        <div class="stock-container info-container m-t-10">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="stock-box">
                                                        <span class="label">Màu Sắc :</span>
                                                    </div>  
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="stock-box">
                                                        <span class="value">
                                                            <?=$color1
                                                            ?></span>
                                                    </div>  
                                                </div>
                                            </div><!-- /.row -->    
                                        </div>
                                         <?php
                                            include_once '../admin/size/size_class.php';
                                            $sz=new size();
                                            $getsize=$sz->get($key->id_size);
                                            foreach ($getsize as $value4) {
                                                $size1=$value4->name;
                                            }
                                        ?>
                                        <div class="stock-container info-container m-t-10">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="stock-box">
                                                        <span class="label">Kích cỡ :</span>
                                                    </div>  
                                                </div>
                                                <form>
                                                <div class="col-sm-8">
                                                    <div class="stock-box">
                                                            <?php
                                                            foreach ($dsswap as $value5){
                                                                if($value5->image==$key->image){
                                                                    $getsize1=$sz->get($value5->id_size);
                                                                    foreach ($getsize1 as $value6) {
                                                        ?>
                                                            <?php $checked = $_GET['id']==$value5->id ? "checked" : ""; ?>
                                                            <?php $active = $_GET['id']==$value5->id ? "active" : ""; ?>
                                                            <a href="detail.php?id=<?=$value5->id?>"><label class="btn btn-default <?=$active?>" ><span class="glyphicon glyphicon-ok"> <?=$value6->name?></span></label></a>&nbsp;
                                                            <?php }}else{

                                                            }} ?>
                                                    </div>  
                                                </div>
                                                </form>
                                            </div><!-- /.row -->    
                                        </div><!-- /.stock-container -->

                                        <div class="description-container m-t-20">
                                            <?=$key->detail?>
                                        </div><!-- /.description-container -->

                                        <div class="price-container info-container m-t-20">
                                            <div class="row">


                                                <div class="col-sm-6">
                                                    <div class="price-box">
                                                        <span class="price"><?=number_format(($key->price-($key->price*$key->discount/100)))?></span>
                                                        <span class="price-strike"><?=number_format($key->price)?></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="favorite-button m-t-10">
                                                        <a href="router.php?id=<?=$key->id?>" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist">
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="quantity-container info-container">
                                            <div class="row">

                                                <div class="col-sm-2">
                                                </div>
                                                <div class="col-sm-7">
                                                    <?php
                                                        if(!isset($_SESSION['user'])) echo '<a href="index.php?p=new/login.php" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> Thêm vào giỏ hàng</a>';
                                                        else
                                                        {
                                                            echo '<a href="listofcart.php?id='.$key->id.'" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> Thêm vào giỏ hàng</a>';
                                                        }
                                                    ?>
                                                </div>


                                            </div><!-- /.row -->
                                        </div><!-- /.quantity-container -->
                                    </div><!-- /.product-info -->
                                </div><!-- /.col-sm-7 -->
                            </div><!-- /.row -->
                        </div>

                        <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                            <div class="row">
                                <div class="col-sm-3">
                                    <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                        <li class="active"><a data-toggle="tab" href="#description">Mô tả</a></li>
                                        <li><a data-toggle="tab" href="#review">Bình luận</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-9">

                                    <div class="tab-content">

                                        <div id="description" class="tab-pane in active">
                                            <div class="product-tab">
                                                <p class="text"><?=$key->detail?></p>
                                            </div>	
                                        </div><!-- /.tab-pane -->
                                        <?php } ?>
                                        <div id="review" class="tab-pane">
                                            <div class="product-tab">

                                                <div class="product-reviews">
                                                    <h4 class="title">Bình luận của khách hàng</h4>

                                                    <div class="reviews">
                                                        <div class="review">
                                                            <?php
                                                                include_once 'comment/comment_class.php';
                                                                $c=new comment();
                                                                $dscm=$c->getdata($_GET['id']);
                                                                foreach ($dscm as $key1) {
                                                                    
                                                            ?>
                                                            <div class="review-title"><span class="summary"><?=$key1->cus_id?></span><span class="date"><i class="fa fa-calendar"></i><span><?=$key1->created_date?></span></span></div>
                                                            <div class="text"><?=$key1->content?></div>
                                                            <?php } ?>
                                                        </div>

                                                    </div><!-- /.reviews -->
                                                </div><!-- /.product-reviews -->
                                                <form method="POST" action="binhluan.php?id=<?=$_GET['id']?>">
                                                <div class="product-add-review">
                                                    <h4 class="title">Đánh giá ý kiến cá nhân của bạn</h4>
                                                    <div class="review-table">
                                                        <div class="table-responsive">
                                                            <table class="table">	
                                                                <thead>
                                                                    <tr>
                                                                        <th class="cell-label">&nbsp;</th>
                                                                        <th>Thích</th>
                                                                        <th>Chưa hài lòng</th>
                                                                    </tr>
                                                                </thead>	
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="cell-label">Chất lượng</td>
                                                                        <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                        <td><input type="radio" name="quality" class="radio" value="0"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table><!-- /.table .table-bordered -->
                                                        </div><!-- /.table-responsive -->
                                                    </div><!-- /.review-table -->
                                                    <div class="review-form">
                                                        <div class="form-container">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputReview">Viết Bình luận của bạn vào đây <span class="astk">*</span></label>
                                                                            <textarea class="form-control txt txt-review" name="txtbinhluan" id="exampleInputReview" rows="4" placeholder="Viết ý kiến của bạn vào đây"></textarea>
                                                                        </div><!-- /.form-group -->
                                                                    </div>
                                                                </div><!-- /.row -->
                                                                <div class="action text-right">
                                                                    <input type="submit" value="Bình luận" name="btnbinhluan" class="btn btn-primary btn-upper">
                                                                </div><!-- /.action -->
                                                            <!-- /.cnt-form -->
                                                        </div><!-- /.form-container -->
                                                    </div><!-- /.review-form -->

                                                </div>
                                            </form><!-- /.product-add-review -->										

                                            </div><!-- /.product-tab -->
                                        </div>

                                    </div><!-- /.tab-content -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.product-tabs -->

                        <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                        <section class="section featured-product wow fadeInUp">
                            <h3 class="section-title">Mặt hàng bán chạy nhất</h3>
                            <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                                <?php
                                    $ds8=$a->getbestseller();
                                    foreach ($ds8 as $key){
                                ?>
                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">		
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.php?id=<?=$key->id?>"> <img src="Upload/<?=$key->image?>" alt=""> </a>
                                                </div>			

                                                <div class="tag sale"><span>sale</span></div>            		   
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.php?id=<?=$key->id?>"><?=$key->id_pro?></a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">	
                                                    <span class="price">
                                                       <?=number_format($key->price-($key->price*$key->discount/100))?></span>
                                                    <span class="price-before-discount"><?=number_format($key->price)?></span>

                                                </div><!-- /.product-price -->

                                            </div><!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <?php
                                                                if (!isset($_SESSION['user'])) {
                                                            ?>
                                                            <a href="index.php?p=new/login.php" data-toggle="tooltip" class="btn btn-primary icon"  title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a><?php
                                                        }
                                                        else{
                                                            ?><a href="listofcart.php?id=<?=$key->id?>" data-toggle="tooltip" class="btn btn-primary icon"  title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a>
                                                        <?php }
                                                        ?>
                                                        </li>
                                                        <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="router.php?id=<?=$key->id?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                    </ul>
                                                </div>
                                                <!-- /.action --> 
                                            </div>
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->
                                <?php } ?><!-- /.item -->
                            </div><!-- /.home-owl-carousel -->
                        </section><!-- /.section -->
                    </div><!-- /.col -->
                    <div class="clearfix"></div>
                </div><!-- /.row -->
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
                    </div><!-- /.logo-slider-inner -->

                </div><!-- /.logo-slider -->
                <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
        </div>
        <footer id="footer" class="footer color-bg">


            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="module-heading">
                                <h4 class="module-title">Địa chỉ cửa hàng</h4>
                            </div><!-- /.module-heading -->

                            <div class="module-body">
                                <ul class="toggle-footer" style="">
                                    <li class="media">
                                        <div class="pull-left">
                                            <span class="icon fa-stack fa-lg">
                                                <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <p>Số 14 Cầu Giấy, Đống Đa, Hà Nội</p>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="pull-left">
                                            <span class="icon fa-stack fa-lg">
                                                <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <p>Hotline: 0436 876 271<br>
                                               Di động: 0972006638</p>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="pull-left">
                                            <span class="icon fa-stack fa-lg">
                                                <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <span><a href="#">levanhuy1996bn@gmail.com</a></span>
                                        </div>
                                    </li>

                                </ul>
                            </div><!-- /.module-body -->
                        </div><!-- /.col -->

                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="module-heading">
                                <h4 class="module-title">Thông tin hỗ trợ</h4>
                            </div><!-- /.module-heading -->

                            <div class="module-body">
                                <ul class='list-unstyled'>
                                    <li class="first"><a href="#" title="Contact us">Giới thiệu website</a></li>
                                    <li><a href="#" title="About us">Chính sách phát triển</a></li>
                                    <li><a href="#" title="faq">Quy chế hoạt động</a></li>
                                </ul>
                            </div><!-- /.module-body -->
                        </div><!-- /.col -->

                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="module-heading">
                                <h4 class="module-title">Dành cho người mua</h4>
                            </div><!-- /.module-heading -->

                            <div class="module-body">
                                <ul class='list-unstyled'>
                                    <li class="first"><a title="Your Account" href="#">Giải quyết khiếu nại</a></li>
                                    <li><a title="Information" href="#">Hướng dẫn mua hàng</a></li>
                                    <li><a title="Addresses" href="#">Chăm sóc khách hàng</a></li>
                                </ul>
                            </div><!-- /.module-body -->
                        </div><!-- /.col -->

                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="module-heading">
                                <h4 class="module-title">Dành cho người bán</h4>
                            </div><!-- /.module-heading -->

                            <div class="module-body">
                                <ul class='list-unstyled'>
                                    <li class="first"><a href="#" title="About us">Chính sách bán hàng</a></li>
                                    <li><a href="#" title="Blog">Blog cá nhân</a></li>
                                    <li><a href="#" title="Company">Hệ thống tiêu chí kiểm duyệt</a></li>
                                </ul>
                            </div><!-- /.module-body -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="copyright-bar">
                <div class="container">
                    <div class="col-xs-12 col-sm-6 no-padding social">
                        <ul class="link">
                            <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
                            <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
                            <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
                            <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
                            <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a></li>
                            <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
                            <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <div class="clearfix payment-methods">
                            <ul>
                                <li><img src="area/assets/images/payments/1.png" alt=""></li>
                                <li><img src="area/assets/images/payments/2.png" alt=""></li>
                                <li><img src="area/assets/images/payments/3.png" alt=""></li>
                                <li><img src="area/assets/images/payments/4.png" alt=""></li>
                                <li><img src="area/assets/images/payments/5.png" alt=""></li>
                            </ul>
                        </div><!-- /.payment-methods -->
                    </div>
                </div>
            </div>
        </footer>
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
