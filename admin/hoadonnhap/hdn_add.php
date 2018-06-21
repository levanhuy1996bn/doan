<?php
    include_once "hdn_class.php";
    include_once './product_group/product_group_class.php';
    include_once './cthdn/cthdn_class.php';
    $br=new hdn();
    $ds1=$br->getdata();
     $type=new product_group();
    $ds2=$type->getdata();
    foreach ($ds1 as $key ) {
            $x=$key->id+1;
        }
    if(isset($_REQUEST["btnadd"]))
    {
        $a=new hdn();
        foreach ($ds1 as $key ) {
            $a->id=$key->id+1;
        }
        $a->status=$_POST["txtstatus"];
        $a->created_date=date("Y-m-d");
        $a->total=(float)($_POST["txtqty"])*(float)($_POST["txtprice"]);
        $add=new hdn();
        $add->add($a);
        //chi tiet
        $ct1=new cthdn();
        $ct1->id_hdn=$a->id;
        $ct1->id_progroup=$_POST["txtgroup"];
        $ct1->qty=$_POST["txtqty"];
        foreach ($ds2 as $value){
            if($ct1->id_progroup==$value->id)
                $c=((float)($value->qty))+((float)($ct1->qty));
        }
        $ct1->price=$_POST["txtprice"];
        $ct1->total=((float)$ct1->qty)*((float)$ct1->price);
        $add1=new cthdn();
        $add1->add($ct1);
        $d=date("Y-m-d");
        $type->editqty($ct1->id_progroup,$c,$d);
        header("location:index.php?p=hoadonnhap/hdn.php");
    }
    ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hóa Đơn Nhập</h1>
                    <form method="post">
                        <fieldset style="float: left; margin-right: 20px;">
                            <legend>Nhập thông tin hóa đơn</legend>
                            <table>
                                <tr>
                                    <td>Mã HĐN</td>
                                    <td><input type="text" value="<?=$x?>" placeholder="Mã hóa đơn tự tăng" id="inputSuccess" class="form-control" readonly name="txtid"></td>
                                </tr>
                                <tr>
                                    <td>Trạng thái</td>
                                    <td><select name="txtstatus" class="form-control">
                                        <option value="Đã thanh toán">Đã thanh toán</option>
                                        <option value="Chưa thanh toán" selected>Chưa thanh toán</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Tổng tiền</td>
                                    <td><input type="text" readonly id="inputSuccess" class="form-control" name="txttotal" value="0"></td>
                                </tr>
                        </table>
                </fieldset>
                <fieldset>
                    <legend>Chi tiết hóa đơn nhập</legend>
                    <table>
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
                                    <td style="float: right;">
                                        <input type="submit" class="btn btn-success" name="btnadd" value="Thêm">&nbsp;<a href="index.php?p=hoadonnhap/hdn.php" class="btn btn-danger">Hủy bỏ</a>
                                        </td>
                                </tr>
                    </table>
                </fieldset>
                </form>
                </div>                
            </div>
        </div>
