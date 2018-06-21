<?php
    include 'slide_class.php';
    $sli=new slide();
    $ds=$sli->getdata();
?>       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slide</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="index.php?p=slide/slide_add.php" class="btn btn-success">Thêm Mới</a>
                        </div>
                        <div class="panel-body">
                        <form method="post" enctype=”multipart/form-data”>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th style="text-align: center;">Ảnh</th>
                                        <th style="text-align: center;">Link</th>
                                        <th>Ngày Tạo</th>
                                        <th>Ngày Cập Nhật</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($ds as $slide1) {
                                        echo "<tr>";
                                        echo "<td>".$slide1->id."</td>";
                                        echo "<td>".$slide1->name."</td>";
                                        echo "<td><img width=\"300\" src=\"../public/Upload/$slide1->image\"></td>";
                                        echo "<td><a href=\"https://www.$slide1->link\" style=\"text-decoration: none;\">".$slide1->link."</a></td>";
                                        echo "<td>".$slide1->created_date."</td>";
                                        echo "<td>".$slide1->updated_date."</td>";
                                        ?><td><a href="index.php?p=slide/slide_edit.php&id=<?=$slide1->id?>" class="btn btn-success">Sửa</a> &nbsp;
                                            <a href="index.php?p=slide/slide_delete.php&id=<?=$slide1->id?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa bản ghi này?')">Xóa</a>
                                        </td>
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