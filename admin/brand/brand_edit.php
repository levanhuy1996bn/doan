<?php
    include_once 'brand_class.php';
    $data=new Navigation();
    $id=(string)$_GET["id"];
    $type=new brand();
    $ds=$type->get($id);
    if (isset($_REQUEST["btnedit"])) {
        $objbrand=new brand();
        if ($_FILES['image']['error']==0)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], '../public/Upload/'.$_FILES['image']['name']);
            $img=$_FILES['image']['name'];
            $objbrand->image=$img;
        }
        else
        {
             $objbrand->image=$_POST['img'];
        }
        $objbrand->id=$_POST["id"];
        $objbrand->name=$_POST["txtname"];
        $objbrand->updated_date=date("Y-m-d");
        $capnhat=new brand();
        $capnhat->edit($objbrand->id,$objbrand->name,$objbrand->image,$objbrand->updated_date);
        header("location:index.php?p=brand/brand.php");
    }
    ?>
            <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thay đổi thông tin</h1>
                    <form method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Sửa tên thương hiệu sản phẩm</legend>
                            <table>
                                <?php
                                foreach($ds as $key)?>
                                <input type="hidden" name="img" value="<?=$key->image?>">
                                <tr>
                                    <td>Id</td>
                                <td><input type="text" id="inputSuccess" class="form-control" readonly name="id" value="<?=$key->id?>"></td> 
                                </tr>
                                <tr>
                                    <td>Thương Hiệu</td>
                                    <td><input type="text" required id="inputSuccess" class="form-control" name="txtname" value="<?=$key->name?>"></td>    
                                </tr>
                                <tr>
                                    <td>Hình ảnh</td>
                                    <td><input type="file" id="fileUpload" name="image"></td>   
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-success" name="btnedit" value="Sửa">&nbsp;
                                        <a href="index.php?p=brand/brand.php" class="btn btn-danger">Hủy Bỏ</a>
                                        </td>
                                </tr>
                        </table>
    </fieldset>
</form>
                </div>                
            </div>
        </div>