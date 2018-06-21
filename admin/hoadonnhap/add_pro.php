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