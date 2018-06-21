
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
<?php
    error_reporting(0);
    include_once 'code/Navigation.php';
    include 'code/auth.php';
    Auth::checkLogin();
    $data = new Navigation();
    $a=Auth::getLoggediUser();
    //echo $a;
    $brand =$data->linklist("brand/brand.php","Danh sách");
    $brand_add=$data->linkadd("brand/brand_add.php","Thêm mới");
    $color =$data->linklist("color/color.php","Danh sách");
    $color_add=$data->linkadd("color/color_add.php","Thêm mới");
    $category =$data->linklist("category/category.php" ,"Danh sách");
    $category_add=$data->linkadd("category/category_add.php","Thêm mới");
    $size =$data->linklist("size/size.php" ,"Danh sách");
    $size_add=$data->linkadd("size/size_add.php","Thêm mới");
    $slide =$data->linklist("slide/slide.php" ,"Danh sách");
    $slide_add=$data->linkadd("slide/slide_add.php","Thêm mới");
    $product =$data->linklist("product/product.php" ,"Danh sách");
    $product_add=$data->linkadd("product/product_add.php","Thêm mới");
    $product_group =$data->linklist("product_group/product_group.php" ,"Danh sách");
    $product_group_add=$data->linkadd("product_group/product_group_add.php","Thêm mới");
    $user =$data->linklist("users/user.php" ,"Danh sách");
    $user_add=$data->linkadd("users/user_add.php","Thêm mới");
    $customer =$data->linklist("customer/customer.php" ,"Danh sách");
    $customer_add=$data->linkadd("customer/customer_add.php","Thêm mới");
    $hdn =$data->linklist("hoadonnhap/hdn.php" ,"Danh sách");
    $hdn_add=$data->linkadd("hoadonnhap/hdn_add.php"," Nhập sản phẩm đã có");
    $hdn_add_pro=$data->linkadd("hoadonnhap/hdn_add_pro.php"," Nhập sản phẩm mới");
    $wishlist =$data->linklist("wishlist/wishlist.php" ,"Danh sách");
    $wishlist_add=$data->linkadd("wishlist/wishlist_add.php","Thêm mới");
    $obj =$data->linklist("obj/obj.php" ,"Danh sách");
    $obj_add=$data->linkadd("obj/obj_add.php","Thêm mới");
    $orders=$data->linklist("orders/orders.php" ,"Danh sách");
    //$cthdn=$data->linklist("cthdn/cthdn.php","Danh sách");
    ob_start();
    $_TITLE="Admin";
?>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin</a>
            </div>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i>Bảng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-table fa-fw"></i>Kích Cỡ<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <?=$size?>
                                        </li>
                                        <li>
                                            <?=$size_add?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-second-level">
                                <li>
                                     <a href="#"><i class="fa fa-table fa-fw"></i>Màu Sắc<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                           <?=$color?>
                                        </li>
                                        <li>
                                           <?=$color_add?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-table fa-fw"></i>Đối Tượng<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <?=$obj?>
                                        </li>
                                        <li>
                                            <?=$obj_add?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-table fa-fw"></i>Thương Hiệu<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <?=$brand?>
                                        </li>
                                        <li>
                                           <?=$brand_add?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-table fa-fw"></i>Loại Sản Phẩm<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <?=$category?>
                                        </li>
                                        <li>
                                            <?=$category_add?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-table fa-fw"></i>Sản Phẩm<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <?=$product?>
                                        </li>
                                        <li>
                                            <?=$product_add?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-table fa-fw"></i>Sản Phẩm Nhóm<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                       <li>
                                            <?=$product_group?>
                                        </li>
                                        <li>
                                            <?=$product_group_add?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-table fa-fw"></i>Hóa Đơn Nhập<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <?=$hdn?>
                                        </li>
                                        <li>
                                            <?=$hdn_add?>
                                        </li>
                                        <li><?=$hdn_add_pro?></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-table fa-fw"></i>Khách Hàng<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <?=$customer?>
                                        </li>
                                        <li>
                                            <?=$customer_add?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-table fa-fw"></i>Hóa đơn bán<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <?=$orders?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-table fa-fw"></i>Danh sách yêu thích<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <?=$wishlist?>
                                        </li>
                                        <li>
                                            <?=$wishlist_add?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-table fa-fw"></i>Tài Khoản<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <?=$user?>
                                        </li>
                                        <li>
                                            <?=$user_add?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-table fa-fw"></i>Slide<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <?=$slide?>
                                        </li>
                                        <li>
                                            <?=$slide_add?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-gears"></i> Tài Khoản Của Tôi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?p=users/profile_user.php"><i class="fa fa-user fa-fw"></i>Hồ Sơ</a>
                                </li>
                                <li>
                                    <a href="new/logout.php"><i class="fa fa-sign-out fa-fw"></i>Đăng xuất</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav><div>
        <?php
                        $page = isset($_GET["p"]) ? $_GET["p"] : "blank.php";
                        include "$page";
                        Navigation::setTitle($_TITLE);
                        ?>
            </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/metisMenu/metisMenu.min.js"></script>>
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src="dist/js/sb-admin-2.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
    <script type="text/javascript" language="javascript" src="ckeditor/ckeditor.js" ></script>
</body>
</html>
