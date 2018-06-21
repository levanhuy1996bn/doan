  <script type="text/javascript">
    function oncus() {
        document.getElementById("form-cus").submit();
    }
 </script>
<?php
    include_once './customer/customer_class.php';
    include_once 'wishlist_class.php';
    include_once './product_group/product_group_class.php';
    $pro=new product_group();
    $dspro=$pro->getdata();
    $show=new wishlist();
    $type=new customer();
    $ds1=$type->getdatabase();
    $cusid = isset($_GET["id_cus1"]) ? (int) $_GET["id_cus1"] : 0;
    $ds=$show->getByid($cusid);
    //$ds=$show->getdatabase();
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh sách yêu thích</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                        <form method="get" id="form-cus">
                            <input type="hidden" name="p" value="wishlist/wishlist.php">
                            <div class="col-md-2">
                            <select name="id_cus1" class="form-control"  onChange="oncus()">
                                <option value="0">Khách hàng</option>
                                 <?php
                                foreach ($ds1 as $cus) {
                                $selected = $cusid == $cus->id ? "selected" : "";
                                echo "<option value=\"$cus->id\" $selected>$cus->name</option>";
                                }
                                ?>
                            </select>
                            </div>
                            <br></br></form>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                        <th>STT</th>
                                        <th>Tên khách hàng</th>
                                        <th>Tên sản Phẩm</th>
                                        <th>Ngày Tạo</th>
                                        <th>Ngày Cập Nhật</th>
                                        <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($ds as $wl) {
                                            echo "<tr>";
                                            echo "<td>".$wl->id."</td>";
                                            echo "<td>".$wl->id_cus."</td>";
                                            foreach ($dspro as $key) {
                                                if($key->id==$wl->id_progroup)
                                                    echo "<td>".$key->id_pro."</td>";
                                            }
                                            echo "<td>".$wl->created_date."</td>";
                                            echo "<td>".$wl->updated_date."</td>";
                                            ?>
                                            <td><a href="index.php?p=wishlist/wishlist_delete.php&id=<?=$wl->id?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa bản ghi này?')">Xóa</a></td>
                                                        <?php
                                                        echo "</tr>";
                                                                }?>   
                                </tbody>
                            </table>
                            <!--2-->
                        </div>
                    </div>
                </div>
            </div>
        </div>