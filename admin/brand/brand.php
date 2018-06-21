<?php
    include_once 'brand_class.php';
    $type=new brand();
    $ds=$type->getdata();
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thương Hiệu Sản Phẩm</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         <a href="index.php?p=brand/brand_add.php" class="btn btn-success">Thêm Mới</a>
                        </div>
                        <div class="panel-body">
                        <form method="get">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Mã Thương Hiệu</th>
                                        <th>Tên Thương Hiệu</th>
                                        <th>Hình ảnh</th>
                                        <th>Ngày Tạo</th>
                                        <th>Ngày Cập Nhật</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($ds as $brand1) {
                                echo "<tr class='odd gradeX'>";
                                echo "<td>".$brand1->id."</td>";
                                echo "<td>".$brand1->name."</td>";
                                echo "<td><img width=\"300\" src=\"../public/Upload/$brand1->image\"></td>";
                                echo "<td>".$brand1->created_date."</td>";
                                echo "<td>".$brand1->updated_date."</td>";
                                ?><td><a href="index.php?p=brand/brand_edit.php&id=<?=$brand1->id?>" class="btn btn-success">Sửa</a> &nbsp;
                                            <a href="index.php?p=brand/brand_delete.php&id=<?=$brand1->id?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa bản ghi này?')">Xóa</a></td>
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
