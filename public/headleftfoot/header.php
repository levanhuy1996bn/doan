<header class="header-style-1"> 
            <div class="top-bar animate-dropdown">
                <div class="container">
                    <div class="header-top-inner">
                        <div class="cnt-account">
                            <ul class="list-unstyled">
                                <li><?php
                                        if(!isset($_SESSION['user'])) echo '<a href="index.php?p=new/login.php"><i class="icon fa fa-shopping-cart"></i> Đơn hàng đã đặt</a>';
                                        else
                                        {
                                            echo '<a href="order.php"><i class="icon fa fa-shopping-cart"></i> Đơn hàng đã đặt</a>';
                                            }
                                            ?></li>
                                <li>
                                    <?php if (!isset($_SESSION['user'])) {
                                    echo '<a href="index.php?p=new/login.php"><i class="icon fa fa-heart"></i>Danh sách yêu thích</a>';} 
                                    else{
                                         echo '<a href="wishlist.php"><i class="icon fa fa-heart"></i>Danh sách yêu thích</a>';
                                    }
                                    ?>
                                </li>
                                <li><?php
                                                        if(!isset($_SESSION['user'])) echo '<a href="index.php?p=new/login.php"><i class="icon fa fa-shopping-cart"></i> Giỏ hàng của tôi</a>';
                                                        else
                                                        {
                                                            echo '<a href="listofcart.php"><i class="icon fa fa-shopping-cart"></i> Giỏ hàng của tôi</a>';
                                                        }
                                                    ?></li>
                                <li><?php
                                    if($a=="") {
                                        echo "<li><a href=\"index.php?p=new/changepassword.php\"><i class=\"fa fa-gear fa-fw\"></i> Đổi mật khẩu</a>
                                        </li>
                                        <li><a href=\"index.php?p=new/login.php\"><i class=\"icon fa fa-lock\"></i>Đăng nhập</a></li>";
                                    }
                                    else
                                    {echo "<li><a href=\"#\"><i class=\"fa fa-user fa-fw\"></i>$a</a></li>
                                        <li><a href=\"index.php?p=new/changepassword.php\"><i class=\"fa fa-gear fa-fw\"></i> Đổi mật khẩu</a>
                                        </li>
                                        <li><a href=\"new/logout.php\"><i class=\"fa fa-sign-out fa-fw\"></i> Đăng xuất</a>
                                        </li>
                                        ";} ?></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="main-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 logo-holder"> 
                            <div class="logo"> <a href="index.php"> <img src="area/assets/images/logo.png" alt="logo"> </a> </div>
                         </div>
                        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
                            <div class="search-area">
                                <?php
                                $a="";
                                    if(isset($_REQUEST['btnsearch'])){
                                        $a=$_POST["txtkeyword"];
                                        if($a!="")
                                        header("location:index.php?p=product/product_search.php&key=$a");
                                    else{

                                    }
                                    }
                                ?>
                                <form method="POST">
                                    <div class="control-group">
                                        <ul class="categories-filter animate-dropdown">
                                            <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="#">Đối tượng <b class="caret"></b></a>
                                                <ul class="dropdown-menu" role="menu" >
                                                    <?php
                                                        include_once 'obj/obj_class.php';
                                                        $a=new object();
                                                        $ds2=$a->getByobjid();
                                                        foreach ($ds2 as $key) {
                                                    ?>
                                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?p=category/category_product.php&id_cate=<?=$key->id?>"><?=$key->name?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        </ul>
                                        <input class="search-field" name="txtkeyword" placeholder="Tìm kiếm..." />
                                        <input type="submit" class="search-button" name="btnsearch" value="Tìm kiếm"></div> </div>
                                </form>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            <div class="header-nav animate-dropdown">
                <div class="container">
                    <div class="yamm navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                            <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
                                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        </div>
                        <div class="nav-bg-class">
                            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                                <div class="nav-outer">
                                    <ul class="nav navbar-nav">
                                        <li class="active dropdown yamm-fw"> <a href="index.php" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Trang Chủ</a> </li>
                                        <?php
                                            foreach ($ds2 as $value) {
                                        ?>
                                        <li class="dropdown"> <a href="index.php?p=product/product_obj.php&id_obj=<?=$value->id?>" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown"><?=$value->name?></a>
                                            <ul class="dropdown-menu pages">
                                                <li>
                                                    <div class="yamm-content">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-6 col-md-12 col-menu">
                                                                <h2 class="title"><?=$value->name?></h2>
                                                                <ul class="links">
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
                                                        </div>
                                                    </div>
                                                </li>   
                                            </ul>
                                        </li>
                                        <?php } ?>
                                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Thương Hiệu</a>
                                            <ul class="dropdown-menu pages">
                                                <li>
                                                    <?php
                                                        include_once '../admin/brand/brand_class.php';
                                                        $b=new brand();
                                                        $brand1=$b->getdatabase();
                                                    ?>
                                                    <div class="yamm-content">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-menu">
                                                                <ul class="links">
                                                                    <?php
                                                                        foreach ($brand1 as $key) {
                                                                    ?>
                                                                    <li><?=$data->link1("brand/brand_product.php&id_brand=$key->id","$key->name")?></a></li><?php
                                                                        }
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>