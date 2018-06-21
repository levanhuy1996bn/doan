<?php
    include_once "obj_class.php";
    $a=new obj();
    $ds=$a->getdatabase();
    if(isset($_REQUEST["btnadd"]))
    {
        
        $obj1=new obj();
        foreach ($ds as $key) {
            $obj1->id=$key->id+1;
        }
        $obj1->name=$_POST["txtname"];
        $obj1->created_date=date("Y-m-d");
        $add=new obj();
        $add->add($obj1);
        header("location:index.php?p=obj/obj.php");
    }
    ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm mới</h1>
                    <form method="post">
                        <fieldset style="width: 30%;">
                            <legend>Nhập đối tượng của sản phẩm</legend>
                            <table>
                                <tr>
                                    <td>Id</td>
                                    <td><input type="text" placeholder="Mã tự tăng" id="inputSuccess" class="form-control" readonly name="txtid"></td>
                                </tr>
                                <tr>
                                    <td>Đối tượng</td>
                                    <td><input type="text" pattern=".{1,50}" required placeholder="Đối tượng cho sản phẩm" id="inputSuccess" class="form-control" name="txtname"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-success" name="btnadd" value="Thêm">&nbsp;
                                        <a href="index.php?p=obj/obj.php" class="btn btn-danger">Hủy Bỏ</a>
                                        </td>
                                </tr>
                        </table>
    </fieldset>
</form>
                </div>                
            </div>
</div>