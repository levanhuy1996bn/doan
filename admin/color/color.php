<?php
    if (isset($_GET['page'])) {
        $trang = $_GET['page'];
    }
    else $trang =1;
    $number = 4;
    $from=($trang -1)*$number;
    include_once 'color_class.php';
    $type=new color();
    $ds=$type->getdata();
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Màu sắc</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         <a href="index.php?p=color/color_add.php" class="btn btn-success">Thêm Mới</a>
                        </div>
                        <div class="panel-body">
                        <form method="get">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Mã màu sắc</th>
                                        <th>Tên màu sắc</th>
                                        <th>Ngày Tạo</th>
                                        <th>Ngày Cập Nhật</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($ds as $color1) {
                                echo "<tr class='odd gradeX'>";
                                echo "<td>".$color1->id."</td>";
                                echo "<td>".$color1->name."</td>";
                                echo "<td>".$color1->created_date."</td>";
                                echo "<td>".$color1->updated_date."</td>";
                                ?><td><a href="index.php?p=color/color_edit.php&id=<?=$color1->id?>" class="btn btn-success">Sửa</a> &nbsp;
                                            <a href="index.php?p=color/color_delete.php&id=<?=$color1->id?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa bản ghi này?')">Xóa</a></td>
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