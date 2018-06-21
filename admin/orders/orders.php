<?php
    include_once 'order_class.php';
    $type=new orders();
    $ds=$type->getdata1();
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hóa đơn bán</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                        <form method="get">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Mã Hóa Đơn Bán</th>
                                        <th>Tên Khách Hàng</th>
                                        <th>Lần Mua Thứ</th>
                                        <th>Trạng Thái</th>
                                        <th>Tổng tiền</th>
                                        <th>Ngày Tạo</th>
                                        <th>Ngày Cập Nhật</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($ds as $hdb1) {
                                echo "<tr class='odd gradeX'>";
                                echo "<td>".$hdb1->id."</td>";
                                echo "<td>".$hdb1->id_cus."</td>";
                                echo "<td>".$hdb1->ttimes."</td>";
                                echo "<td>".$hdb1->status."</td>";
                                echo "<td>".number_format($hdb1->total)."</td>";
                                echo "<td>".$hdb1->created_date."</td>";
                                echo "<td>".$hdb1->updated_date."</td>";
                                ?><td>
                                            <a href="index.php?p=orders/orders_view.php&id=<?=$hdb1->id?>" class="btn btn-info" >Chi Tiết</a>
                                            <a class="btn btn-success" href="index.php?p=orders/hoadon.php&id=<?=$hdb1->id?>&namcus=<?=$hdb1->id_cus?>">In hóa đơn</a></td>
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