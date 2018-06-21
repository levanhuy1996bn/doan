  <script type="text/javascript">
    function oncatebrand() {
        document.getElementById("form-brand-cat").submit();
    }
 </script>
 <script type="text/javascript" src="ckeditor/ckeditor.js">
</script>
<?php
    include_once './category/category_class.php';
    include_once './brand/brand_class.php';
    include_once 'product_class.php';
    $a="";
    $br=new brand();
    $ds2=$br->getdatabase();
    $show=new product();
    $type=new category();
    $ds1=$type->getdata();
    $catid = isset($_GET["id_catdetail1"]) ? (int) $_GET["id_catdetail1"] : 0;
    $brandid=isset($_GET["id_brand1"]) ? (int) $_GET["id_brand1"] : 0;
    $ds=$show->getByid($catid,$brandid);
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản Phẩm</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="index.php?p=product/product_add.php" class="btn btn-success">Thêm Mới</a>
                        </div>
                        <div class="panel-body">
                        <form method="get" id="form-brand-cat">
                            <input type="hidden" name="p" value="product/product.php">
                            <div class="col-md-2">
                            <select name="id_catdetail1" class="form-control"  onChange="oncatebrand()">
                                <option value="0">Loại Sản Phẩm</option>
                                 <?php
                                foreach ($ds1 as $cate) {
                                $selected = $catid == $cate->id ? "selected" : "";
                                echo "<option value=\"$cate->id\" $selected>$cate->name</option>";
                                }
                                ?>
                            </select>
                            </div>
                            <div class="col-md-2">
                            <select name="id_brand1" class="form-control" onChange="oncatebrand()">
                                <option value="0">Thương Hiệu</option>
                                 <?php
                                foreach ($ds2 as $brand0) {
                                $selected = $brandid == $brand0->id ? "selected" : "";
                                echo "<option value=\"$brand0->id\" $selected>$brand0->name</option>";
                                }
                                ?>
                            </select>
                            </div><br></br></form>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                        <th>Mã Sản Phẩm</th>
                                        <th>Loại Sản Phẩm</th>
                                        <th>Thương Hiệu</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Ngày Tạo</th>
                                        <th>Ngày Cập Nhật</th>
                                        <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($ds as $pro) {
                                            echo "<tr>";
                                            echo "<td>".$pro->id."</td>";
                                            echo "<td>".$pro->id_cate."</td>";
                                            echo "<td>".$pro->id_brand."</td>";
                                            echo "<td>".$pro->name."</td>";
                                            echo "<td>".$pro->created_date."</td>";
                                            echo "<td>".$pro->updated_date."</td>";
                                            ?>
                                            <td>
                                                <a href="index.php?p=product/product_edit.php&id=<?=$pro->id?>" class="btn btn-success">Sửa</a> &nbsp;
                                                <a href="index.php?p=product/product_delete.php&id=<?=$pro->id?>" class="btn btn-danger"  onclick="return confirm('Bạn có chắc chắn xóa bản ghi này?')">Xóa</a>
                                            </td>
                                                        <?php
                                                        echo "</tr>";
                                                                }?>   
                                </tbody>
                            </table>
                            <!--2-->
                        </div>
                    </div>
                </div>
            </div>
        </div>