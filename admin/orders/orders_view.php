<?php
$idview=$_GET["id"];
?>
<body>
    <?php
    include_once 'order_class.php';
    include_once './product_group/product_group_class.php';
    include_once 'order_item_class.php';
    $br=new orders();
    $ds1=$br->getdata1();
    $show=new order_item();
    $ds=$show->getidorders($idview);
    $type=new product_group();
    $ds2=$type->getdata();
?>
<?php
    if(isset($_REQUEST["btnsave"])){
        $a=new orders();
        $a->status=$_POST["opstatus"];
        $date=$a->updated_date=date("Y-m-d");
        $save=new orders();
        $check=$br->get($idview);
        foreach ($check as $value1) {
            if($value1->status!=$a->status)
        {
            $save->editstatus($idview,$a->status,$a->updated_date);
        header("location:index.php?p=orders/orders.php");
        }
        else{
            echo "<script type='text/javascript'>
                alert('Không có gì thay đổi');
            </script>";
        }
    }
}
if(isset($_REQUEST["btnhuyhd"])){
    $date=date("Y-m-d");
    foreach ($ds as $key) 
            {
                foreach ($ds2 as $value)
                {
                    if($key->id_progroup==$value->id)
                    {
                        $sl=$value->qty+$key->qty;
                        $type->editqty($key->id_progroup,$sl,$date);
                    }
                }
            }
    $show->deleteidorders($idview);
    $br->delete($idview);
    header("location:index.php?p=orders/orders.php");
}
    ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chi tiết hóa đơn bán</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post">
                            <div style="font-weight: bold; font-size: 15px;">
                             <div class="col-md-2">Mã hóa đơn:#<?=$idview?></div><br><br>
                             <div class="col-md-2">Trạng thái giao hàng:</div>
                             <div class="col-md-2"><select name="opstatus" <?php
                                foreach ($ds1 as $v){
                                    if($v->id==$idview&&$v->status=="Đã thanh toán") echo "disabled";
                                }
                                ?> class="form-control">
                                <option value="Đã thanh toán" <?php
                                foreach ($ds1 as $v){
                                    if($v->id==$idview&&$v->status=="Đã thanh toán") echo "selected";
                                }
                                ?>>Đã thanh toán</option>
                                <option value="Chưa thanh toán"<?php foreach ($ds1 as $v){
                                    if($v->id==$idview&&$v->status=="Chưa thanh toán") echo "selected";
                                } ?>>Chưa thanh toán</option>
                            </select></div>
                            <div class="col-md-3"><input type="submit" <?php
                                foreach ($ds1 as $v){
                                    if($v->id==$idview&&$v->status=="Đã thanh toán") echo "disabled";
                                }
                                ?>  name="btnsave" class="btn btn-info" value="Lưu">&nbsp;
                                <input type="submit"
                                <?php
                                                foreach ($ds1 as $v){
                                                if($v->id==$idview&&$v->status=="Đã thanh toán") echo "disabled";
                                                }
                                                ?>
                                                 class="btn btn-danger" name="btnhuyhd" value="Hủy hóa đơn"></div>
                                <br><br></form>
                            <div class="col-md-2">Ngày lập hóa đơn</div>
                                <div class="col-md-2"><?php
                                    foreach ($ds1 as $sta)
                                        if ($idview==$sta->id) echo $sta->created_date;
                                    ?>
                                </div>
                            </div>
                        <form>
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Mã sản phẩm nhóm</th>
                                        <th>Tên sản phẩm nhóm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Thành tiền</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($ds as $ct1) {
                                            echo "<tr>";
                                            echo "<td>".$ct1->id_progroup."</td>";
                                            foreach ($ds2 as $key){
                                                if($key->id==$ct1->id_progroup) echo "<td>".$key->id_pro."(".$key->id_color." - ".$key->id_size.")</td>";
                                            }
                                            echo "<td>".$ct1->qty."</td>";
                                            echo "<td>".number_format($ct1->price)."</td>";
                                            echo "<td>".number_format($ct1->total)."</td>";?>
                                            <td><a <?php
                                            foreach ($ds1 as $v){
                                                if($v->id==$idview&&$v->status=="Đã thanh toán") echo "disabled onclick=\"return false\"";
                                            }
                                            ?> href="index.php?p=orders/order_item_edit.php&id_order=<?=$ct1->id_order?>&id_progroup=<?=$ct1->id_progroup?>" class="btn btn-success">Sửa</a> &nbsp;
                                            <a <?php
                                            foreach ($ds1 as $v){
                                                if($v->id==$idview&&$v->status=="Đã thanh toán") echo "disabled onclick=\"return false\"";
                                            }
                                            ?> href="index.php?p=orders/order_item_delete.php&id_order=<?=$ct1->id_order?>&id_progroup=<?=$ct1->id_progroup?>" class="btn btn-danger"  onclick="return confirm('Bạn có chắc chắn xóa bản ghi này?')">Xóa</a></td>
                                            <?php
                                            echo "</tr>";
                                                                }?>
                                        <tr>
                                            <td colspan="3" align="center" style="font-weight: bold;">Tổng tiền</td>
                                            <td colspan="2" align="center" style="font-weight: bold;">
                                                <?php
                                            foreach ($ds1 as $hd2)
                                            if ($idview==$hd2->id) echo number_format($hd2->total)." VNĐ";
                                            ?></td>
                                            <td><a href="index.php?p=orders/orders.php" class="btn btn-info">Quay lại</a></td>
                                        </tr>
                                     </tbody>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>