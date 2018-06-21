<?php
    include_once './hoadonnhap/hdn_class.php';
    include_once './product_group/product_group_class.php';
    include_once 'cthdn_class.php';
    $hdnid=(string)$_GET["id_hdn"];
    $groupid=(string)$_GET["id_group"];
    echo $hdnid;
    echo $groupid;
    $z=new hdn();
    $show=new cthdn();
    $type=new product_group();
    $ds2=$type->getdata();
    $ds3=$show->get($hdnid,$groupid);
    if(isset($_REQUEST["btnquaylai"]))
    {
       header("location:index.php?p=hoadonnhap/hdn_view.php&id=$hdnid");
    }
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thay đổi thông tin</h1>
                    <form method="post">
                        <fieldset style="width: 30%;">
                            <legend>Sửa thông tin chi tiết hóa đơn nhập</legend>
                            <table>
                            <?php
                            foreach($ds3 as $key) 
                                $T=$key->qty;
                                ?>
                            <tr>
                                <td>Hóa đơn nhập</td>
                                <td><input type="number" id="inputSuccess" class="form-control" readonly name="txthdnid" value="<?=$key->id_hdn?>"></td>  
                            </tr>
                            <tr>
                                <td>Nhóm sản phẩm</td>
                                <td><input type="number" id="inputSuccess" class="form-control" readonly name="txtgroupid" value="<?=$key->id_progroup?>"></td> 
                            </tr>
                            <tr>
                                    <td>Số Lượng</td>
                                    <td><input type="number" class="form-control" name="txtqty" value="<?=$key->qty?>"></td>   
                            </tr>
                            <tr>
                                    <td>Đơn Giá</td>
                                    <td><input type="number" class="form-control" name="txtprice" value="<?=$key->price?>"></td>   
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
        $y=0.0;
        $a=new cthdn();
        $a->id_hdn=$hdnid;
        $a->id_progroup=$groupid;
        $a->qty=$_POST["txtqty"];
        $a->price=$_POST["txtprice"];
        $a->total=((float)($a->qty))*((float)($a->price));
        foreach ($ds2 as $value) {
            if($groupid==$value->id)
                $c=((float)($value->qty))+((float)($a->qty))-((float)($T));
        }
        $d=date("Y-m-d");
        $dshdn=$z->get($hdnid);
        foreach ($dshdn as $key) {
            foreach ($ds3 as $value) {
                $y=$key->total-$value->total+$a->total;
            }
        }
        $show->edit($hdnid,$groupid,$a->qty,$a->price,$a->total);
        $type->editqty($groupid,$c,$d);
        $z->edittotal($hdnid,$y,$d);
        header("location:index.php?p=hoadonnhap/hdn_view.php&id=$hdnid");
    }
?>
