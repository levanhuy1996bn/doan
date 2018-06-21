<?php
    include_once 'hdn_class.php';
    $data=new Navigation();
    $id=(string)$_GET["id"];
    $type=new hdn();
    $ds=$type->get($id);
    if (isset($_REQUEST["btnedit"])) {
        $a=new hdn();
        $a->id=$_POST["id"];
        $a->status=$_POST["txtstatus"];
        $a->total=$_POST["txttotal"];
        $a->updated_date=date("Y-m-d");
        $capnhat=new hdn();
        $capnhat->edit($a->id,$a->status,$a->total,$a->updated_date);
        header("location:index.php?p=hoadonnhap/hdn.php");
    }
    if(isset($_REQUEST["btnquaylai"]))
    {
        header("location:index.php?p=hoadonnhap/hdn.php");
    }
    ?>
            <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa Hóa Đơn Nhập</h1>
                    <form method="post">
                        <fieldset>
                            <legend>Sửa thông tin hóa đơn nhập</legend>
                            <table>
                                <?php
                                foreach($ds as $key){ ?>
                                <tr>
                                    <td>ID</td>
                                    <td><input type="text" id="inputSuccess" class="form-control" readonly name="id" value="<?=$key->id?>"></td>  
                                </tr>
                                <tr>
                                    <td>Trạng thái</td>
                                    <td><select name="txtstatus" class="form-control">
                                        <option value="Đã thanh toán" <?php if($key->status=="Đã thanh toán") echo "selected"; ?>>Đã thanh toán</option>
                                        <option value="Chưa thanh toán" <?php if($key->status=="Chưa thanh toán") echo "selected"; ?>>Chưa thanh toán</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Tổng tiền</td>
                                    <td><input type="text" readonly id="inputSuccess" class="form-control" name="txttotal" value="<?=$key->total?>"></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-success" name="btnedit" value="Sửa">&nbsp;
                                        <input type="submit" class="btn btn-danger" name="btnquaylai" value="Hủy Bỏ">
                                        </td>
                                </tr>
                        </table>
    </fieldset>
</form>
                </div>                
            </div>
        </div>
