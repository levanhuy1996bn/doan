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
            $ds1=$cus->getemail($a);
            foreach ($ds1 as $key){
                $dsx=$od->getdatabase($key->id);
            }
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
                <b style="font-size: 18px;">Lịch sử đặt hàng (<?php echo count($dsx)?> đơn hàng)</b>
              </div>
                    <!--countbill-->
                <div class="box panel-body">
                  <div class="box-body">
                    <table style="text-align: center;" class="table table-bordered table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th style="text-align: center;">ID</th>
                          <th style="text-align: center;">Lần mua thứ</th>
                          <th style="text-align: center;">Trạng thái</th>
                          <th style="text-align: center;">Tổng tiền</th>
                          <th style="text-align: center;">Ngày đặt hàng</th>
                          <th style="text-align: center;">Chi tiết</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($dsx as $value){ 
                          echo "<tr class='odd gradeX'>";
                            echo "<td>".$value->id."</td>";
                            echo "<td>".$value->ttimes."</td>";
                            echo "<td>".$value->status."</td>";
                            echo "<td>".$value->total."</th>";
                            echo "<td>".$value->created_date."</td>";?>
                            <td><a href="order_item.php?idview=<?=$value->id?>">Chi tiết <i class="fa fa-share"></i></a></td>
                          <?php echo "</tr>";
                         } ?>

                      </tbody>

                    </table>
                    <div align="center">
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>
                <?php if(count($ds2)==0){ ?>
                <div class="panel-body">
                  <div align="center">
                    <i>Bạn chưa có đơn đặt hàng nào.</i>
                  </div>
                </div><?php } ?>
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