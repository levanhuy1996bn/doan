<!DOCTYPE html>
<html lang="en">
<head>
    <title>User</title>
</head>
<body>
	<?php
		$a=Auth::getLoggediUser();
        echo $a;
        include_once 'user_class.php';
        $show=new user();
        $ds=$show->getemail($a);
	?>
    <div id="wrapper">
        <div id="page-wrapper">
            <div style="width: 140%;" class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tài Khoản Của Bạn</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	<h1>Hồ sơ tài khoản</h1>
                        </div>
                        <div class="panel-body">
                        <form method="get">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Thông Tin</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($ds as $single) {
                                echo "<tr class='odd gradeX'>";
                                echo "<td><img width=\"100\" src=\"../public/Upload/$single->image\"></td>";
                                echo "<td>ID: ".$single->id."<br>Tên: ".$single->name."<br>Email: ".$a.
                                "<br>Số Điện Thoại: ".$single->phone."<br>Chức Vụ: ".$single->level."<br>Địa Chỉ: ".$single->address."<br>Ngày Tạo: ".$single->created_date."<br>Ngày Cập Nhật: ".$single->updated_date."</td>";
                                ?><td><a href="index.php?p=users/user_edit.php&id=<?=$single->id?>" class="btn btn-success">Sửa</a> &nbsp;
                                            <a href="index.php?p=users/user_delete.php&id=<?=$single->id?>" class="btn btn-danger">Xóa</a></td>
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
    </div>
    </script> 
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>
</html>
