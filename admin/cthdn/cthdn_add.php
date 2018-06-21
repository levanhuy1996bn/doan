<?php
$idadd=$_GET["id_hdn"];
    include_once './hoadonnhap/hdn_class.php';
    include_once './product_group/product_group_class.php';
    include_once 'cthdn_class.php';
    $br=new hdn();
    $ds1=$br->getdata();
    $show=new cthdn();
    $type=new product_group();
    $ds2=$type->getdata();
    if(isset($_REQUEST["btnadd"]))
    {
        $ct1=new cthdn();
        $ct1->id_hdn=$_POST["txthdn"];
        $ct1->id_progroup=$_POST["txtgroup"];
        $ct1->qty=$_POST["txtqty"];
        foreach ($ds2 as $value) {
            if($ct1->id_progroup==$value->id)
                $c=((float)($value->qty))+((float)($ct1->qty));
        }
        $ct1->price=$_POST["txtprice"];
        $ct1->total=((float)$ct1->qty)*((float)$ct1->price);
        $add=new cthdn();
        $add->add($ct1);
        $d=date("Y-m-d");
        $type->editqty($ct1->id_progroup,$c,$d);
        foreach ($ds1 as $key){
            if($key->id==$_POST["txthdn"])
                $key->total+=(float)($_POST["txtqty"])*(float)($_POST["txtprice"]);
            $br->edittotal($key->id,$key->total,$d);
        }
        header("location:index.php?p=hoadonnhap/hdn_view.php&id=$idadd");
    }
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nhập sản phẩm</h1>
                    <form method="post">
                        <fieldset>
                            <legend>Nhập thông tin chi tiết cho hóa đơn</legend>
                            <table>
            <tr>
                <td>Hóa đơn nhập</td>
                <td><input type="text" class="form-control" readonly name="txthdn" value="<?=$idadd?>"></td>
                </td>
            </tr>
            <tr>
                <td>Sản phẩm nhóm</td>
                <td>
                <select class="form-control" name="txtgroup">
                <?php
                    foreach ($ds2 as $group1) {
                    echo "<option value=\"$group1->id\">$group1->id - $group1->id_pro($group1->id_color - $group1->id_size)</option>";
                    }?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td><input type="number" min="1" placeholder="Số lượng sản phẩm" required title="Nhập số lượng lớn hơn 0" pattern="[0-9]{1,3}" name="txtqty" id="inputSuccess" class="form-control"></td>
            </tr>
            <tr>
                <td>Đơn giá</td>
                <td><input type="text" min="1000" placeholder="Đơn giá sản phẩm" required title="Nhập đơn giá phù hợp" pattern="[0-9]{4,10}" class="form-control" name="txtprice"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" class="btn btn-success" name="btnadd" value="Thêm">&nbsp;
                    <a href="index.php?p=hoadonnhap/hdn_view.php&id=<?=$idadd?>" class="btn btn-danger">Quay lại</a>
                    </td>
            </tr>
        </table>
    </fieldset>
</form>
                </div>                
            </div>
        </div>

