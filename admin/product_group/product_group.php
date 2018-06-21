    <script type="text/javascript">
    function onpro() {
        document.getElementById("form-size-color").submit();
    }
 </script>
<?php
    include_once './size/size_class.php';
    include_once './color/color_class.php';
    include_once 'product_group_class.php';
    $a="";
    $show=new product_group();
    $si=new size();
    $ds2=$si->getdata();
    $col=new color();
    $ds3=$col->getdata();
    $sizeid=isset($_GET["id_size"]) ? (int) $_GET["id_size"] : 0;
    $colorid=isset($_GET["id_color"]) ? (int) $_GET["id_color"] : 0;
    $ds=$show->getByid($colorid,$sizeid);
?>
        <div  style="width: 110%;" id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="width: 110%;">
                            <a href="index.php?p=product_group/product_group_add.php" class="btn btn-success">Thêm Mới</a>
                        </div>
                        <div class="panel-body">
                        <form method="get" id="form-size-color">
                            <input type="hidden" name="p" value="product_group/product_group.php">
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
                            </div><br><br>
                            <table class="table table-striped table-bordered table-hover"
                                id="dataTables-example">
                                <thead>
                                <tr>
                                        <th style="width: 120px;">Mã SP nhóm</th>
                                        <th style="width: 150px;">Tên sản phẩm</th>
                                        <th style="width: 70px;">Màu sắc</th>
                                        <th style="width: 70px;">Kích cỡ</th>
                                        <th style="width: 300px; text-align: center;">Ảnh</th>
                                        <th style="width: 70px;">Số lượng</th>
                                        <th style="width: 70px;">Giảm Giá</th>
                                        <th style="width: 70px;">Giá</th>
                                        <th style="width: 50px;">Vote</th>
                                        <th style="width: 150px;">Chi Tiết</th>
                                        <th style="width: 70px;">Ngày Tạo</th>
                                        <th style="width: 70px;">Ngày Cập Nhật</th>
                                        <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($ds as $a) {
                                            echo "<tr>";
                                            echo "<td>".$a->id."</td>";
                                            echo "<td>".$a->id_pro."</td>";
                                            echo "<td>".$a->id_color."</td>";
                                            echo "<td>".$a->id_size."</td>";
                                            echo "<td><img width=\"200\" src=\"../public/Upload/$a->image\"></td>";
                                            echo "<td>".$a->qty."</td>";
                                            echo "<td>".$a->discount."</td>";
                                            echo "<td>".number_format($a->price)."</td>";
                                            echo "<td>".$a->vote."</td>";
                                            echo "<td>".$a->detail."</td>";
                                            echo "<td>".$a->created_date."</td>";
                                            echo "<td>".$a->updated_date."</td>";
                                            ?>
                                            <td>
                                                <a href="index.php?p=product_group/product_group_edit.php&id=<?=$a->id?>" class="btn btn-success">Sửa</a> &nbsp;
                                                <a href="index.php?p=product_group/product_group_delete.php&id=<?=$a->id?>" class="btn btn-danger"  onclick="return confirm('Bạn có chắc chắn xóa bản ghi này?')">Xóa</a>
                                            </td>
                                                        <?php
                                                        echo "</tr>";
                                                                }?>
                                </table>
                            </form>
                            <!--2-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>