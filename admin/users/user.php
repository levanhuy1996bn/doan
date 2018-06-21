<?php
    include 'user_class.php';
    $type=new user();
    $ds=$type->getdatabase();
?>
        <div id="page-wrapper">
            <div style="width: 140%;" class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tài Khoản</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="index.php?p=users/user_add.php" class="btn btn-success">Thêm Mới</a>
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
                                        <th>Email</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Địa Chỉ</th>
                                        <th>Chức Danh</th>
                                        <th>Ngày Tạo</th>
                                        <th>Ngày Cập Nhật</th>
                                        <th style="width: 150px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($ds as $user1) {
                                echo "<tr class='odd gradeX'>";
                                echo "<td>".$user1->id."</td>";
                                echo "<td><img width=\"100\" src=\"../public/Upload/$user1->image\"></td>";
                                echo "<td>".$user1->name."</td>";
                                echo "<td>".$user1->password."</td>";
                                echo "<td>".$user1->email."</td>";
                                echo "<td>".$user1->phone."</td>";
                                echo "<td>".$user1->address."</td>";
                                echo "<td>".$user1->level."</td>";
                                echo "<td>".$user1->created_date."</td>";
                                echo "<td>".$user1->updated_date."</td>";
                                ?><td><a href="index.php?p=users/user_edit.php&id=<?=$user1->id?>" class="btn btn-success">Sửa</a> &nbsp;
                                            <a href="index.php?p=users/user_delete.php&id=<?=$user1->id?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa bản ghi này?')">Xóa</a></td>
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