<?php
    include_once './category/category_class.php';
    include_once 'product_class.php';
    include_once './brand/brand_class.php';
    $type=new category();
    $ds1=$type->getdata();
    $kind=new brand();
    $ds2=$kind->getdatabase();
    $a=new product();
    $ds=$a->getdata();
    if(isset($_REQUEST["btnadd"]))
    {
        $product1=new product();
        foreach ($ds as $key) {
            $product1->id=$key->id+1;
        }
        $product1->id_cate=$_POST["txtid_cate"];
        $product1->id_brand=$_POST["txtid_brand"];
        $product1->name=$_POST["txtname"];
        $product1->created_date=date("Y-m-d");
        $add=new product();
        $add->add($product1);
        header("location:index.php?p=product/product.php");
    }
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm sản phẩm</h1>
                    <form method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Nhập thông tin sản phẩm</legend>
                            <table>
            <tr>
                <td>ID</td>
                <td><input type="text" id="inputSuccess" placeholder="Mã sản phẩm tự tăng" class="form-control" readonly name="txtid"></td>
            </tr>
            <tr>
                <td>Loại sản phẩm</td>
                <td>
                <select class="form-control" name="txtid_cate">
                <?php
                    foreach ($ds1 as $cate) {
                    echo "<option value=\"$cate->id\">$cate->name</option>";
                    }?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Thương Hiệu</td>
                <td>
                <select class="form-control" name="txtid_brand">
                <?php
                    foreach ($ds2 as $brand1) {
                    echo "<option value=\"$brand1->id\">$brand1->name</option>";
                    }?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Tên sản phẩm</td>
                <td><input type="text" required placeholder="Tên sản phẩm" name="txtname" id="inputSuccess" class="form-control"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" class="btn btn-success" name="btnadd" value="Thêm">&nbsp;
                    <a href="index.php?p=product/product.php" class="btn btn-danger">Hủy Bỏ</a>
                </td>
            </tr>
        </table>
    </fieldset>
</form>
                </div>                
            </div>
        </div>
