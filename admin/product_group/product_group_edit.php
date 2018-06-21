<?php
    include_once './product/product_class.php';
    include_once './size/size_class.php';
    include_once './color/color_class.php';
    include_once 'product_group_class.php';
    $id=(string)$_GET["id"];
    $pro=new product();
    $ds1=$pro->getdata();
    $show=new product_group();
    $si=new size();
    $ds2=$si->getdata();
    $col=new color();
    $ds3=$col->getdata();
    $ds=$show->get($id);
    if (isset($_REQUEST["btnedit"])) {
        $a=new product_group();
         if ($_FILES['image']['error']==0)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], '../public/Upload/'.$_FILES['image']['name']);
            $img=$_FILES['image']['name'];
            $a->image=$img;
        }
        else
        {
             $a->image=$_POST['img'];
        }
        $a->id=$_POST["id"];
        $a->id_pro=$_POST["id_pro"];
        $a->id_color=$_POST["id_color"];
        $a->id_size=$_POST["id_size"];
        $a->qty=$_POST["txtqty"];
        $a->discount=$_POST["txtdiscount"];
        $a->price=$_POST["txtprice"];
        $a->vote=$_POST["txtvote"];
        $a->detail=$_POST["txtdetail"];
        $a->updated_date=date("Y-m-d");
        $capnhat=new product_group();
        $capnhat->edit($a->id,$a->id_pro,$a->id_color,$a->id_size,$a->image,$a->qty,$a->discount,$a->price,$a->vote,$a->detail,$a->updated_date);
        header("location:index.php?p=product_group/product_group.php");
    }
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thay đổi thông tin</h1>
                    <form method="post" enctype="multipart/form-data">
                        <fieldset style="width: 50%;">
                            <legend>Sửa thông tin sản phẩm</legend>
                            <table>
                            <?php
                            foreach($ds as $key){ ?>
                            <tr>
                                <td>Id</td>
                                <td><input type="text" id="inputSuccess" class="form-control" readonly name="id" value="<?=$key->id?>"></td>  
                            </tr>
                            <tr>
                                <td>Tên sản phẩm</td>
                                <td>
                                    <select class="form-control" name="id_pro">
                                    <?php
                                    foreach ($ds1 as $pro) {
                                    $selected = $key->id_pro== $pro->id ? "selected" : "";
                                    echo "<option value=\"$pro->id\" $selected>$pro->name</option>";
                                    }?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Màu sắc</td>
                                <td>
                                    <select class="form-control" name="id_color">
                                    <?php
                                    foreach ($ds3 as $color1) {
                                    $selected = $key->id_color== $color1->id ? "selected" : "";
                                    echo "<option value=\"$color1->id\" $selected>$color1->name</option>";
                                    }?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Kích cỡ</td>
                                <td>
                                    <select class="form-control" name="id_size">
                                    <?php
                                    foreach ($ds2 as $size1) {
                                    $selected = $key->id_size== $size1->id ? "selected" : "";
                                    echo "<option value=\"$size1->id\" $selected>$size1->name</option>";
                                    }?>
                                    </select>
                                </td>
                            </tr>
                                <input type="hidden" name="img" value="<?=$key->image?>">
                                <tr>
                                    <td></td>
                                    <td><img width="300" src="../public/Upload/<?=$key->image?>"></td>
                                </tr>
                                <tr>
                                    <td>Ảnh</td>
                                    <td><input type="file" name="image"></td>
                                </tr>
                                <tr>
                                    <td>Số lượng</td>
                                    <td><input type="number" min="1" placeholder="Số lượng sản phẩm" required title="Nhập số lượng lớn hơn 0" pattern="[0-9]{1,3}" class="form-control" name="txtqty" value="<?=$key->qty?>"></td>    
                                </tr>
                                <tr>
                                    <td>Giảm giá</td>
                                    <td><input type="number" min="0" max="99" placeholder="Giảm giá" title="Giảm giá phải nhỏ hơn 100" required class="form-control" name="txtdiscount" value="<?=$key->discount?>"></td>    
                                </tr>
                                <tr>
                                    <td>Đơn giá</td>
                                    <td><input type="text" min="1000" placeholder="Đơn giá sản phẩm" title="Nhập đơn giá trị phù hợp" pattern="[0-9]{4,10}" required class="form-control" name="txtprice" value="<?=$key->price?>"></td>   
                                </tr>
                                <tr>
                                    <td>Lượt chọn</td>
                                    <td><input type="number" readonly class="form-control" name="txtvote" value="<?=$key->vote?>"></td>   
                                </tr>
                                <tr>
                                    <td>Mô tả</td>
                                    <td><textarea cols="50" class="form-control ckeditor" rows="10" name="txtdetail"><?=$key->detail?></textarea></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-success" name="btnedit" value="Sửa">&nbsp;
                                        <a href="index.php?p=product_group/product_group.php" class="btn btn-danger">Hủy Bỏ</a>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </form>
                </div>                
            </div>
        </div>