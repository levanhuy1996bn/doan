<?php
    include_once './category/category_class.php';
    include_once 'product_class.php';
    include_once './brand/brand_class.php';
    $id=(string)$_GET["id"];
    $type=new category();
    $ds1=$type->getdata();
    $kind=new brand();
    $ds2=$kind->getdatabase();
    $show=new product();
    $ds3=$show->get($id);
    if (isset($_REQUEST["btnedit"])) {
        $a=new product();
        if ($_FILES['txtimage']['error'] > 0)
        {
            echo 'File Upload Error';
        }
        else
        {
             move_uploaded_file($_FILES['txtimage']['tmp_name'], '../public/Upload/'.$_FILES['txtimage']['name']);
        }
        $a->id=$_POST["id"];
        $a->id_cate=$_POST["id_cate1"];
        $a->id_brand=$_POST["id_brand1"];
        $a->name=$_POST["txtname"];
        $a->updated_date=date("Y-m-d");
        $capnhat=new product();
        $capnhat->edit($a->id,$a->id_cate,$a->id_brand,$a->name,$a->updated_date);
        header("location:index.php?p=product/product.php");
    }
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thay đổi thông tin</h1>
                    <form method="post">
                        <fieldset style="width: 30%;">
                            <legend>Sửa thông tin sản phẩm</legend>
                            <table>
                            <?php
                            foreach($ds3 as $key) ?>
                            <tr>
                                <td>ID</td>
                                <td><input type="text" id="inputSuccess" class="form-control" readonly name="id" value="<?=$key->id?>"></td>  
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>
                                    <select class="form-control" name="id_cate1">
                                    <?php
                                    foreach ($ds1 as $cate) {
                                    $selected = $key->id_cate== $cate->id ? "selected" : "";
                                    echo "<option value=\"$cate->id\" $selected>$cate->name</option>";
                                    }?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Brand</td>
                                <td>
                                    <select class="form-control" name="id_brand1">
                                    <?php
                                    foreach ($ds2 as $brand1) {
                                    $selected = $key->id_brand== $brand1->id ? "selected" : "";
                                    echo "<option value=\"$brand1->id\" $selected>$brand1->name</option>";
                                    }?>
                                    </select>
                                </td>
                            </tr>
                                <tr>
                                    <td>Name</td>
                                    <td><input type="text" class="form-control" name="txtname" value="<?=$key->name?>"></td>   
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-success" name="btnedit" value="Sửa">&nbsp;
                                        <a href="index.php?p=product/product.php" class="btn btn-danger">Hủy Bỏ</a>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </form>
                </div>                
            </div>
        </div>
