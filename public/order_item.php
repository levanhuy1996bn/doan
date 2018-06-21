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

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="area/assets/css/bootstrap.min.css">

        <!-- Customizable CSS -->
        <link rel="stylesheet" href="area/assets/css/main.css">
        <link rel="stylesheet" href="area/assets/css/blue.css">
        <link rel="stylesheet" href="area/assets/css/owl.carousel.css">
        <link rel="stylesheet" href="area/assets/css/owl.transitions.css">
        <link rel="stylesheet" href="area/assets/css/animate.min.css">
        <link rel="stylesheet" href="area/assets/css/rateit.css">
        <link rel="stylesheet" href="area/assets/css/bootstrap-select.min.css">

        <!-- Icons/Glyphs -->
        <link rel="stylesheet" href="area/assets/css/font-awesome.css">

        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    </head>
    <body class="cnt-home">
        <?php
            $idview=$_GET["idview"];
            include_once 'code/Navigation.php';
            include 'code/auth.php';
            $data = new Navigation();
            $a="";
            session_start();
            $a=$_SESSION['user'];
            include_once '../admin/customer/customer_class.php';
            include_once '../admin/orders/order_class.php';
            $cus=new customer();
            $od=new orders();
            $ds2=$od->getdata();
            $ds1=$cus->getemail($a);
            $data = new Navigation();
            ob_start();
            $_TITLE="Admin";
        ?>
        <?php include_once 'headleftfoot/header.php'; ?>
        <div class="body-content outer-top-xs" id="top-banner-and-menu">
            <div class="container">
                <div class="row"> 
                    
                    <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                       <div class="col-md-12">
            <!-- general form elements -->
            <div class="panel panel-primary">
                    <div class="box-header with-border panel-heading" align="center">
                        <b style="font-size: 18px;">Chi tiết đơn hàng số <?=$idview?></b>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="invoice-title">
                                    <h3>Đơn hàng #<?=$idview?></h3>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <address>
                                            <strong><u>Thông tin khách hàng:</u></strong><br>
                                            - <b>Tên:</b>&nbsp;<?php
                                                foreach($ds1 as $key){
                                                    echo $key->name;
                                                    
                                             ?><br>
                                            - <b>Email:</b> &nbsp;<?=$key->email?><br>
                                            - <b>Số điện thoại:</b> &nbsp;<?=$key->phone?><br>
                                            - <b>Địa chỉ:</b> &nbsp;<?=$key->address?><br><br>
                                            <?php } ?>
                                            <strong><u>Ngày đặt hàng: </u><?php
                                            $ds2=$od->get($idview);
                                            foreach($ds2 as $key){
                                                echo $key->created_date;
                                            }
                                            ?></strong><br>
                                            <strong><u>Trạng thái: </u></strong>
                                                <span style="color: red"><?php foreach($ds2 as $key) {
                                                     echo $key->status;
                                                } ?></span>
                                            <br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php include_once 'body_order_item.php';  ?>
                    </div>
                </div>
          </div>
                    </div>
                </div>
                <?php include_once 'headleftfoot/abovefooter.php'; ?>
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
        <script src="area/assets/js/lightbox.min.js"></script> 
        <script src="area/assets/js/bootstrap-select.min.js"></script> 
        <script src="area/assets/js/wow.min.js"></script> 
        <script src="area/assets/js/scripts.js"></script>
    </body>
</html>