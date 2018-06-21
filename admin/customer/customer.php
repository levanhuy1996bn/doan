<?php
    include 'customer_class.php';
    $type=new customer();
    $ds=$type->getdatabase();
?>
        <div id="page-wrapper">
            <div style="width: 150%;" class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thông tin khách hàng</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="index.php?p=customer/customer_add.php" class="btn btn-success">Thêm Mới</a>
                        </div>
                        <div class="panel-body">
                        <form method="get" enctype=”multipart/form-data”>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ảnh</th>
                                        <th>Tên Tài Khoản</th>
                                        <th>Mật Khẩu</th>
                                        <th style="width: 100px;">Email</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Địa Chỉ</th>
                                        <th>Năm sinh</th>
                                        <th>Ngày Tạo</th>
                                        <th>Ngày Cập Nhật</th>
                                        <th style="width: 130px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($ds as $customer1) {
                                echo "<tr class='odd gradeX'>";
                                echo "<td>".$customer1->id."</td>";
                                echo "<td><img width=\"100\" src=\"../public/Upload/$customer1->image\"></td>";
                                echo "<td>".$customer1->name."</td>";
                                echo "<td>".$customer1->password."</td>";
                                echo "<td>".$customer1->email."</td>";
                                echo "<td>".$customer1->phone."</td>";
                                echo "<td>".$customer1->address."</td>";
                                echo "<td>".$customer1->birth."</td>";
                                echo "<td>".$customer1->created_date."</td>";
                                echo "<td>".$customer1->updated_date."</td>";
                                ?><td><a href="index.php?p=customer/customer_edit.php&id=<?=$customer1->id?>" class="btn btn-success">Sửa</a> &nbsp;
                                            <a href="index.php?p=customer/customer_delete.php&id=<?=$customer1->id?>" class="btn btn-danger"  onclick="return confirm('Bạn có chắc chắn xóa bản ghi này?')">Xóa</a></td>
                                <?php
                                echo "</tr>";
                                        }
                                     ?>
                                     </tbody>
                            </table>
                            </form>
                            <div style="text-align: center;">
                            <ul class="pagination">
                                <li><?php
                                    if($trang>1 && count($ds)>=1){
                                        echo '<a href="index.php?p=customers/customer.php&page='.($trang-1).'">Previous</a>';
                                    }
                                ?></li>
                            <?php for($i=1;$i<=$ds[0]->sotrang;$i++) {?>
                            <li class="page-item <?= $i==$trang ? "active" :"" ?> "><a href="index.php?p=customers/customer.php&page=<?=$i?>" ><?=$i?></a></li>
                            <?php } ?>
                            <li>
                                <?php
                                    if($trang<$ds[0]->sotrang && count($ds)>=1){
                                        echo '<a href="index.php?p=customers/customer.php&page='.($trang+1).'">Next</a>';
                                    }
                                ?>
                            </li>
                        </ul>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>