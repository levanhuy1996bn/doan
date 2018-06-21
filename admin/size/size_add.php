<?php
    include_once "size_class.php";
    $a=new size();
    $ds=$a->getdata();
    if(isset($_REQUEST["btnadd"]))
    {
        $s=new size();
        foreach ($ds as $key) {
            $s->id=$key->id+1;
        }
        $s->name=$_POST["txtname"];
        $s->created_date=date("Y-m-d");
        $add=new size();
        $add->add($s);
        header("location:index.php?p=size/size.php");
    }
    ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm mới</h1>
                    <form method="post">
                        <fieldset>
                            <legend>Nhập kích cỡ sản phẩm</legend>
                            <table>
                                <tr>
                                    <td>Id</td>
                                    <td><input type="text" placeholder="mã kích cỡ động tăng" id="inputSuccess" class="form-control" readonly name="txtid"></td>
                                </tr>
                                <tr>
                                    <td>Kích cỡ</td>
                                    <td><input type="text" pattern="[A-Z]{1,3}" title="Tên kích cỡ phải là chữ và viết hoa" required placeholder="Kích cỡ của sản phẩm" id="inputSuccess" class="form-control" name="txtname"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-success" name="btnadd" value="Thêm">&nbsp;
                                        <a href="index.php?p=size/size.php" class="btn btn-danger">Hủy Bỏ</a>
                                        </td>
                                </tr>
                        </table>
    </fieldset>
</form>
                </div>                
            </div>
        </div>
