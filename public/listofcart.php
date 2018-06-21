
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
        <title>Cart</title>
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
    include 'code/auth.php';
                $a="";
                //error_reporting(0);
                session_start();
                if(isset($_SESSION['user']) && $_SESSION['user']!=null)
                $a=Auth::getLoggediUser();
                else $a="";
?>
<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]++;
        }
        else{
            $_SESSION['cart'][$id]=1;
        }
        header("location:listofcart.php");
    }
    error_reporting(0);
    $giohang=$_SESSION['cart'];
?>
    </head>
    <body class="cnt-home">
        <header class="header-style-1">
        </header>
        <div class="breadcrumb">
            <div class="container">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <li class='active'>Giỏ hàng</li>
                    </ul>
                </div><!-- /.breadcrumb-inner -->
            </div><!-- /.container -->
        </div><!-- /.breadcrumb -->
        <div class="body-content outer-top-xs">
            <div class="container">
                <div class="row ">
                    <div class="shopping-cart">
                        <div class="shopping-cart-table ">
                            <div class="table-responsive">
                                <?php if(isset($_POST["btncapnhat"])&& count($giohang)!=null){
                                            $soluong_cn=$_POST["txtsoluong"];
                                            foreach ($soluong_cn as $id => $sl) {
                                                if($sl==0){
                                                    unset($_SESSION['cart'][$id]);
                                                }
                                                else if($sl>0 && is_numeric($sl)){
                                                    $_SESSION['cart'][$id]=$sl;
                                                }
                                                header("location:listofcart.php");
                                            }
                                        }
                                        ?>
                                        <?php
                                            include_once '../admin/product_group/product_group_class.php';
                                            include_once '../admin/orders/order_class.php';
                                            include_once '../admin/orders/order_item_class.php';
                                            include_once '../admin/customer/customer_class.php';
                                            include_once 'code/auth.php';
                                            $a=new product_group();
                                             $cus="";
                                            session_start();
                                            if(isset($_SESSION['user']) && $_SESSION['user']!=null)
                                            $cus=Auth::getLoggediUser();
                                        else $cus="";
                                        $b=new orders();
                                        $dsod=$b->getdata();
                                        $c=new order_item();
                                        $d=new customer();
                                        $dscus=$d->getdatabase();
                                        $b->ttimes=1;

                                        foreach ($dscus as $cusid){
                                            if($cus==$cusid->email)
                                                $b->id_cus=$cusid->id;
                                        }
                                        if(count($dsod)==0) $b->id=1;
                                        else{
                                        foreach ($dsod as $slan) {
                                            $b->id=$slan->id+1;
                                            if($b->id_cus==$slan->id_cus){
                                            $b->ttimes=$slan->ttimes+1;
                                            }
                                        }
                                    }
                                    $b->status="Chưa thanh toán";
                                    $b->created_date=date("Y-m-d");
                                    $tongtien1=0.0;
                                    if(count($giohang)){
                                            foreach ($giohang as $id => $sl) {
                                                $ds1=$a->get($id);
                                                foreach ($ds1 as $key) {
                                                    $tongtien1+=($key->price-($key->price*$key->discount/100))*$sl;
                                                }}}
                                                 $b->total=$tongtien1;
                                        if(isset($_REQUEST["btndathang"])){
                                        $tf=0;
                                        if(count($giohang)){  
                                        foreach ($giohang as $id => $sl) {  
                                                $ds2=$a->get($id);
                                                foreach ($ds2 as $key) {
                                                if ($key->qty<$sl) {
                                                    $tf=1;
                                                }
                                            }
                                            if($tf==1){
                                                echo "<script type='text/javascript'>
                                                      alert('Có sản phẩm không đủ số lượng cho bạn
                                                      đặt hàng');
                                                      </script>";
                                            }
                                            else{
                                                    $add=new orders();
                                                    $add->add($b);
                                                }
                                        }
                                        }
                                            $add1=new order_item();
                                            if(count($giohang)&&$tf!=1){
                                            foreach ($giohang as $id => $sl) {
                                                $ds2=$a->get($id);
                                                foreach ($ds2 as $key){
                                                        $c->id_order=$b->id;
                                                        $c->id_progroup=$key->id;
                                                        $c->qty=$sl;
                                                        $c->price=$key->price-($key->price*$key->discount/100);
                                                        $c->total=($key->price-($key->price*$key->discount/100))*$sl;
                                                        $add1->add($c);
                                                        unset($_SESSION['cart']);
                                                        header("location:xulysl.php?idod=$b->id"); 
                                                        }}}  
                                                        else{
                                                            echo "<script type='text/javascript'>
                                                            alert('Chưa có sản phẩm nào hoặc có sản phẩm không đủ số lượng cho bạn đặt hàng');
                                                        </script>";
                                                        }                                                      
                                    }
                                            
                                        ?>
                                <form method="post">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-romove item">Xóa</th>
                                            <th class="cart-description item">Ảnh</th>
                                            <th class="cart-product-name item">Tên</th>
                                            <th class="cart-product-name item">Kích Cỡ</th>
                                            <th class="cart-product-name item">Số lượng</th>
                                            <th class="cart-sub-total item">Giá</th>
                                            <th class="cart-total last-item">Thành Tiền</th>
                                        </tr>
                                    </thead><!-- /thead -->
                                    <tfoot>
                                        <tr>
                                            <td colspan="7">
                                                <div class="shopping-cart-btn">
                                                    <span class="">
                                                        <div class="col-md-4">
                                                            <a href="index.php" class="btn btn-upper btn-primary outer-left-xs">Quay lại trang chủ</a>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="submit" name="btncapnhat" value="Cập nhật giỏ hàng" class="btn btn-upper btn-primary pull-right outer-right-xs">
                                                        </div>
                                                        <div class="col-md-4">
                                                        <input type="submit" name="btndathang" value="Đặt hàng" class="btn btn-upper btn-primary pull-right outer-right-xs">
                                                        </div>
                                                    </span>
                                                </div><!-- /.shopping-cart-btn -->
                                            </td>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $tongtien=0.0;
                                        if(count($giohang)){
                                            foreach ($giohang as $id => $sl) {
                                                $ds=$a->get($id);
                                                foreach ($ds as $key) {
                                                 

                                        ?>
                                        <tr>
                                            <td class="romove-item"><a href="cart/xoaproduct.php?idPro=<?=$id?>" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
                                            <td class="cart-image">
                                                <a class="entry-thumbnail" href="detail.php?id=<?=$key->id?>">
                                                    <img src="Upload/<?=$key->image?>" alt="">
                                                </a>
                                            </td>
                                            <td class="cart-product-name-info">
                                                <h4 class='cart-product-description'><a href="detail.php?id=<?=$key->id?>">
                                                    <?php
                                                    include_once '../admin/product/product_class.php';
                                                    $b=new product();
                                                        $getname=$b->get($key->id_pro);
                                                        foreach ($getname as $value) {
                                                        echo $value->name;
                                                            }
                                                    ?>
                                            </a></h4>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        Sản phẩm còn: <?=$key->qty?>
                                                    </div>
                                                </div><!-- /.row -->
                                                <div class="cart-product-info">
                                                    <span class="product-color">Màu sắc:<span>
                                                        <?php
                                                            include_once '../admin/color/color_class.php';
                                                            $cl=new color();
                                                            $getcolor=$cl->get($key->id_color);
                                                            foreach ($getcolor as $value3) {
                                                                echo $value3->name;
                                                            }
                                                        ?> 
                                        </span></span>
                                                </div>
                                            </td>
                                            <td class="cart-product-sub-total"><span class="cart-sub-total-price">
                                                <?php
                                            include_once '../admin/size/size_class.php';
                                            $sz=new size();
                                            $getsize=$sz->get($key->id_size);
                                            foreach ($getsize as $value4) {
                                                echo $value4->name;
                                            }
                                        ?>
                                            </span></td>
                                            <td class="cart-product-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows">
                                                        <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                        <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                    </div>
                                                    <input type="text" name="txtsoluong[<?=$id?>]" value="<?=$sl?>">
                                                </div>
                                            </td>
                                            <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?=number_format(($key->price-($key->price*$key->discount/100)))?></span></td>
                                            <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?=number_format(($key->price-($key->price*$key->discount/100))*$sl)?></span></td>
                                            <?php $tongtien+=($key->price-($key->price*$key->discount/100))*$sl; ?>
                                        </tr>
                                            <?php }}} ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <th>Tổng Tiền:</th>
                                            <th><?=number_format($tongtien)?></th>
                                            </tr>
                                    </tbody><!-- /tbody -->
                                </table>
                                </form>
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
