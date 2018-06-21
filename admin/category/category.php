<script type="text/javascript">
        function onobject() {
        document.getElementById("form-obj").submit();
    }
</script>
<?php
    include_once 'category_class.php';
    include_once './obj/obj_class.php';
    $MR=new obj();
    $ds1=$MR->getdatabase();
    $type=new category();
    $objid=isset($_GET["id_obj1"]) ? (int) $_GET["id_obj1"] : 0;
    $ds=$type->getdatabase($objid);
    //$ds=$type->getdata();
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại sản phẩm</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         <a href="index.php?p=category/category_add.php" class="btn btn-success">Thêm Mới</a>
                        </div>
                        <div class="panel-body">
                        <form method="get" id="form-obj">
                            <input type="hidden" name="p" value="category/category.php">
                            <div class="col-md-2">
                             <select name="id_obj1" class="form-control"  onChange="onobject()">
                                <option value="0">Loại Sản Phẩm</option>
                                 <?php
                                foreach ($ds1 as $obj1) {
                                $selected = $objid == $obj1->id ? "selected" : "";
                                echo "<option value=\"$obj1->id\" $selected>$obj1->name</option>";
                                }
                                ?>
                            </select>
                            </div><br><br>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                 <thead>
                                    <tr>
                                        <th>Mã loại sản phẩm</th>
                                        <th>Tên đối tượng</th>
                                        <th>Tên loại sản phẩm</th>
                                        <th>Ngày Tạo</th>
                                        <th>Ngày Cập Nhật</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($ds as $category1) {
                                echo "<tr class='odd gradeX'>";
                                echo "<td>".$category1->id."</td>";
                                echo "<td>".$category1->obj_id."</td>";
                                echo "<td>".$category1->name."</td>";
                                echo "<td>".$category1->created_date."</td>";
                                echo "<td>".$category1->updated_date."</td>";
                                ?><td><a href="index.php?p=category/category_edit.php&id=<?=$category1->id?>" class="btn btn-success">Sửa</a> &nbsp;
                                            <a href="index.php?p=category/category_delete.php&id=<?=$category1->id?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa bản ghi này?')">Xóa</a></td>
                                <?php
                                echo "</tr>";
                                        }
                                     ?>
                                     </tbody>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>