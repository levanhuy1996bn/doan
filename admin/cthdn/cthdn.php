<script type="text/javascript">
    function oncatebrand() {
        document.getElementById("form-hdn-progroup").submit();
    }
</script>
<body>
<?php
    include_once './hoadonnhap/hdn_class.php';
    include_once './product_group/product_group_class.php';
    include_once 'cthdn_class.php';
    $br=new hdn();
    $ds1=$br->getdata();
    $show=new cthdn();
    $type=new product_group();
    $ds2=$type->getdata();
    $hdnid = isset($_GET["id_hdn"]) ? (int) $_GET["id_hdn"] : 0;
    $groupid=isset($_GET["id_group"]) ? (int) $_GET["id_group"] : 0;
    $ds=$show->getByid($hdnid,$groupid);
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản Phẩm</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="index.php?p=cthdn/cthdn_add.php" class="btn btn-success">Thêm Mới</a>
                        </div>
                        <div class="panel-body">
                        <form method="get" id="form-hdn-progroup">
                            <input type="hidden" name="p" value="cthdn/cthdn.php">
                            <div class="col-md-2">
                            <select name="id_hdn" class="form-control"  onChange="oncatebrand()">
                                <option value="0">Hóa Đơn Nhập</option>
                                 <?php
                                foreach ($ds1 as $hdn1) {
                                $selected = $hdnid == $hdn1->id ? "selected" : "";
                                echo "<option value=\"$hdn1->id\" $selected>$hdn1->id</option>";
                                }
                                ?>
                            </select>
                            </div>
                            <div class="col-md-2">
                            <select name="id_group" class="form-control" onChange="oncatebrand()">
                                <option value="0">Nhóm sản phẩm</option>
                                 <?php
                                foreach ($ds2 as $group1) {
                                $selected = $groupid == $group1->id ? "selected" : "";
                                echo "<option value=\"$group1->id\" $selected>$group1->id - $group1->id_pro</option>";
                                }
                                ?>
                            </select>
                            </div><br><br>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                        <th>Mã Hóa Đơn Nhập</th>
                                        <th>Mã Nhóm Sản Phẩm</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Số Lượng</th>
                                        <th>Đơn Giá</th>
                                        <th>Tổng Tiền</th>
                                        <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                   <?php
                                        foreach ($ds as $ct1) {
                                            echo "<tr>";
                                            echo "<td>".$ct1->id_hdn."</td>";
                                            echo "<td>".$ct1->id_progroup."</td>";
                                            foreach ($ds2 as $key){
                                                if($key->id==$ct1->id_progroup) echo "<td>".$key->id_pro."</td>";
                                            }
                                            echo "<td>".$ct1->qty."</td>";
                                            echo "<td>".$ct1->price."</td>";
                                            echo "<td>".$ct1->total."</td>";
                                            ?>
                                            <td>
                                                <a href="index.php?p=cthdn/cthdn_edit.php&id_hdn=<?=$ct1->id_hdn?>&id_group=<?=$ct1->id_progroup?>" class="btn btn-success">Sửa</a> &nbsp;
                                                <a href="index.php?p=cthdn/cthdn_delete.php&id_hdn=<?=$ct1->id_hdn?>&id_group=<?=$ct1->id_progroup?>" class="btn btn-danger"  onclick="return confirm('Bạn có chắc chắn xóa bản ghi này?')">Xóa</a>
                                            </td>
                                                        <?php
                                                        echo "</tr>";
                                                                }?>
                                </tbody>
                            </table>
                            </form>
                            <!--2-->
                        </div>
                    </div>
                </div>
            </div>
        </div>