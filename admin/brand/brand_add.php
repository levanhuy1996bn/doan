<?php
    include_once "brand_class.php";
    $a=new brand();
    $ds=$a->getdatabase();
    if(isset($_REQUEST["btnadd"]))
    {
        $objbrand=new brand();
        if ($_FILES['txtimage']['error'] > 0)
        {
            echo 'File Upload Error';
        }
        else
        {
             move_uploaded_file($_FILES['txtimage']['tmp_name'], '../public/Upload/'.$_FILES['txtimage']['name']);
        }
        foreach ($ds as $key) {
            $objbrand->id=$key->id+1;
        }
        $objbrand->name=$_POST["txtname"];
        $objbrand->image=$_FILES['txtimage']['name'];
        $objbrand->created_date=date("Y-m-d");
        $add=new brand();
        $add->add($objbrand);
        header("location:index.php?p=brand/brand.php");
    }
    ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm mới</h1>
                    <form method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Nhập thương hiệu sản phẩm</legend>
                            <table>
                                <tr>
                                    <td>Mã thương hiệu</td>
                                    <td><input type="text" placeholder="Mã thương hiệu tự tăng" id="inputSuccess" class="form-control" readonly name="txtid"></td>
                                </tr>
                                <tr>
                                    <td>Tên thương hiệu</td>
                                    <td><input type="text" required placeholder="Tên thương hiệu" id="inputSuccess" class="form-control" title="Nhập tên thương hiệu" name="txtname"></td>
                                </tr>
                                <tr>
                                    <td>Ảnh</td>
                                    <td><input type="file" name="txtimage"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-success" name="btnadd" value="Thêm">&nbsp;
                                        <a href="index.php?p=brand/brand.php" class="btn btn-danger">Hủy Bỏ</a>
                                        </td>
                                </tr>
                        </table>
    </fieldset>
</form>
                </div>                
            </div>
        </div>