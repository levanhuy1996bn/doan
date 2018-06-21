
<?php
include_once './product/product_class.php';
    include_once './size/size_class.php';
    include_once './color/color_class.php';
    $pro=new product();
    $ds1=$pro->getdata();
$si=new size();
    $ds2=$si->getdata();
$col=new color();
    $ds3=$col->getdata();
?>
<div class="col-md-2">
                            <select name="id_pro" class="form-control"  onChange="onpro()">
                                <option value="0">Tên sản phẩm</option>
                                 <?php
                                foreach ($ds1 as $pro1) {
                                $selected = $id_pro1 == $pro1->id ? "selected" : "";
                                echo "<option value=\"$pro1->id\" $selected>$pro1->name</option>";
                                }
                                ?>
                            </select>
                            </div>
                            <div class="col-md-2">
                            <select name="id_size" class="form-control" onChange="onpro()">
                                <option value="0">Kích cỡ</option>
                                 <?php
                                foreach ($ds2 as $size0) {
                                $selected = $sizeid == $size0->id ? "selected" : "";
                                echo "<option value=\"$size0->id\" $selected>$size0->name</option>";
                                }
                                ?>
                            </select>
                            </div>
                            <div class="col-md-2">
                            <select name="id_color" class="form-control" onChange="onpro()">
                                <option value="0">Màu sắc</option>
                                 <?php
                                foreach ($ds3 as $color0) {
                                $selected = $colorid == $color0->id ? "selected" : "";
                                echo "<option value=\"$color0->id\" $selected>$color0->name</option>";
                                }
                                ?>
                            </select>
                            </div>