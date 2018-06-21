<?php
    include_once 'orders/order_class.php';
    include_once './product_group/product_group_class.php';
    include_once 'order_item_class.php';
    $ordersid=(string)$_GET["id_order"];
    $groupid=(string)$_GET["id_progroup"];
    $show=new order_item();
    $type=new product_group();
    $ds2=$type->getdata();
    $ds3=$show->get($ordersid,$groupid);
    if(isset($_REQUEST["btnquaylai"]))
    {
       header("location:index.php?p=orders/orders_view.php&id=$ordersid");
    }
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa chi tiết hóa đơn bán</h1>
                    <form method="post">
                        <fieldset style="width: 30%;">
                            <legend>Sửa thông tin chi tiết</legend>
                            <table>
                            <?php
                            foreach($ds3 as $key) 
                                $T=$key->qty;
                                ?>
                            <tr>
                                <td>Hóa đơn bán</td>
                                <td><input type="number" id="inputSuccess" class="form-control" readonly name="txthdnid" value="<?=$key->id_order?>"></td>  
                            </tr>
                            <tr>
                                <td>Nhóm sản phẩm</td>
                                <td><input type="number" id="inputSuccess" class="form-control" readonly name="txtgroupid" value="<?=$key->id_progroup?>"></td> 
                            </tr>
                            <tr>
                                    <td>Số Lượng</td>
                                    <td><input type="number" min="1" class="form-control" name="txtqty" value="<?=$key->qty?>"></td>   
                            </tr>
                            <tr>
                                    <td>Đơn Giá</td>
                                    <td><input type="number" readonly class="form-control" name="txtprice" value="<?=$key->price?>"></td>   
                            </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-success" name="btnedit" value="Sửa">&nbsp;
                                        <input type="submit" name="btnquaylai" value="Hủy Bỏ" class="btn btn-danger">
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </form>
                </div>                
            </div>
        </div>
<?php if (isset($_REQUEST["btnedit"])) {
        $a=new order_item();
        $a->id_hdn=$ordersid;
        $a->id_progroup=$groupid;
        $a->qty=$_POST["txtqty"];
        $a->price=$_POST["txtprice"];
        $a->total=((float)($a->qty))*((float)($a->price));
        $d=date("Y-m-d");
        $y=0.0;
        $b=new orders();
        $dsorders=$b->get($ordersid);
         foreach ($ds2 as $value) {
            if($groupid==$value->id)
                $c=((float)($value->qty))-((float)($a->qty))+((float)($T));
        }
        foreach ($dsorders as $key) {
            foreach ($ds3 as $value) {
                $y=$key->total-$value->total+$a->total;
            }
        }
        $show->edit($ordersid,$groupid,$a->qty,$a->price,$a->total);
        $type->editqty($groupid,$c,$d);
        $b->edittotal($ordersid,$y,$d);
        header("location:index.php?p=orders/orders_view.php&id=$ordersid");
    }
?>
