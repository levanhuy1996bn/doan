<?php
    include 'obj_class.php';
    $type=new obj();
    $ds=$type->getdatabase();
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Đối tượng</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"> 
                            <a href="index.php?p=obj/obj_add.php" class="btn btn-success">Thêm Mới</a>
                        </div>
                        <div class="panel-body">
                        <form method="get">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Mã đối tượng</th>
                                        <th>Tên ĐT</th>
                                        <th>Ngày Tạo</th>
                                        <th>Ngày Cập Nhật</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($ds as $obj1) {
                                echo "<tr class='odd gradeX'>";
                                echo "<td>".$obj1->id."</td>";
                                echo "<td>".$obj1->name."</td>";
                                echo "<td>".$obj1->created_date."</td>";
                                echo "<td>".$obj1->updated_date."</td>";
                                ?><td><a href="index.php?p=obj/obj_edit.php&id=<?=$obj1->id?>" class="btn btn-success">Sửa</a> &nbsp;
                                            <a href="index.php?p=obj/obj_delete.php&id=<?=$obj1->id?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa bản ghi này?')">Xóa</a></td>
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