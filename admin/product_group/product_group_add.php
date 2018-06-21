<?php
    include_once './product/product_class.php';
    include_once './size/size_class.php';
    include_once './color/color_class.php';
    include_once 'product_group_class.php';
    $pro=new product();
    $ds1=$pro->getdata();
    $si=new size();
    $ds2=$si->getdata();
    $col=new color();
    $ds3=$col->getdata();
    if(isset($_REQUEST["btnadd"]))
    {
        $product1=new product_group();
        if ($_FILES['txtimage']['error'] > 0)
        {
            echo 'File Upload Error';
        }
        else
        {
             move_uploaded_file($_FILES['txtimage']['tmp_name'], '../public/Upload/'.$_FILES['txtimage']['name']);
        }
        $product1->id=$_POST["txtid"];
        $product1->id_pro=$_POST["txtidpro"];
        $product1->id_color=$_POST["txtidcolor"];
        $product1->id_size=$_POST["txtidsize"];
        $product1->image=$_FILES['txtimage']['name'];
        $product1->qty=$_POST["txtqty"];
        $product1->discount=$_POST["txtdiscount"];       
        $product1->price=$_POST["txtprice"];
        $product1->vote=$_POST["txtvote"];
        $product1->detail=$_POST["txtdetail"];
        $product1->created_date=date("Y-m-d");
        $add=new product_group();
        $add->add($product1);
        header("location:index.php?p=product_group/product_group.php");
    }
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm mới</h1>
                    <form method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Nhập thông tin sản phẩm</legend>
                            <table>
            <tr>
                <td>Id</td>
                <td><input type="text" id="inputSuccess" class="form-control" readonly name="txtid"></td>
            </tr>
            <tr>
                <td>Tên sản phẩm</td>
                <td>
                <select class="form-control" name="txtidpro">
                <?php
                    foreach ($ds1 as $pro) {
                    echo "<option value=\"$pro->id\">$pro->name</option>";
                    }?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Màu sắc</td>
                <td>
                <select class="form-control" name="txtidcolor">
                <?php
                    foreach ($ds3 as $col) {
                    echo "<option value=\"$col->id\">$col->name</option>";
                    }?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Kích cỡ</td>
                <td>
                <select class="form-control" name="txtidsize">
                <?php
                    foreach ($ds2 as $size1) {
                    echo "<option value=\"$size1->id\">$size1->name</option>";
                    }?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Ảnh</td>
                <td><input type="file" name="txtimage"></td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td><input type="text" min="1" placeholder="Số lượng sản phẩm" required title="Nhập số lượng lớn hơn 0" pattern="[0-9]{1,3}" class="form-control" name="txtqty"></td>
            </tr>
            <tr>
                <td>Giảm giá</td>
                <td><input type="number" required placeholder="Giảm giá" title="Giảm giá phải nhỏ hơn 100" min="0" max="99" class="form-control" name="txtdiscount"></td>
            </tr>
            <tr>
                <td>Đơn giá</td>
                <td><input type="text" min="1000" placeholder="Đơn giá sản phẩm" required title="Nhập đơn giá phù hợp" pattern="[0-9]{4,10}" class="form-control" name="txtprice"></td>
            </tr>
            <tr>
                <td>Lượt chọn</td>
                <td><input type="number" readonly value="0" class="form-control" name="txtvote"></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><textarea cols="50" rows="10" class="form-control ckeditor" name="txtdetail"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" class="btn btn-success" name="btnadd" value="Thêm">&nbsp;
                    <a href="index.php?p=product_group/product_group.php" class="btn btn-danger">Hủy Bỏ</a>
                    </td>
            </tr>
        </table>
    </fieldset>
</form>
                </div>                
            </div>
        </div>
