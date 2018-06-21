<?php
    include_once 'hdn_class.php';
    $type=new hdn();
    $ds=$type->getdata();
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hóa đơn nhập</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         <a href="index.php?p=hoadonnhap/hdn_add.php" class="btn btn-success">Thêm Mới</a>
                        </div>
                        <div class="panel-body">
                        <form method="get">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Mã Hóa Đơn Nhập</th>
                                        <th>Trạng Thái</th>
                                        <th>Tổng tiền</th>
                                        <th>Ngày Tạo</th>
                                        <th>Ngày Cập Nhật</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($ds as $hdn1) {
                                echo "<tr class='odd gradeX'>";
                                echo "<td>".$hdn1->id."</td>";
                                echo "<td>".$hdn1->status."</td>";
                                echo "<td>".$hdn1->total."</td>";
                                echo "<td>".$hdn1->created_date."</td>";
                                echo "<td>".$hdn1->updated_date."</td>";
                                ?><td>
                                      <a href="index.php?p=hoadonnhap/hdn_delete.php&id=<?=$hdn1->id?>" class="btn btn-danger"  onclick="return confirm('Bạn có chắc chắn xóa bản ghi này?')">Xóa</a>
                                            </a>
                                            <a href="index.php?p=hoadonnhap/hdn_view.php&id=<?=$hdn1->id?>" class="btn btn-info" >Xem chi tiết</a></td>
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