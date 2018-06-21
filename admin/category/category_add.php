<?php
    include_once "category_class.php";
    include_once './obj/obj_class.php';
    $type=new obj();
    $ds1=$type->getdatabase();
    $a=new category();
    $ds=$a->getdata();
    if(isset($_REQUEST["btnadd"]))
    {
        $s=new category();
        foreach ($ds as $key) {
            $s->id=$key->id+1;
        }
        $s->obj_id=$_POST["txtid_obj"];
        $s->name=$_POST["txtname"];
        $s->created_date=date("Y-m-d");
        $add=new category();
        $add->add($s);
        header("location:index.php?p=category/category.php");
    }
    ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm mới</h1>
                    <form method="post">
                        <fieldset>
                            <legend>Nhập loại sản phẩm</legend>
                            <table>
                                <tr>
                                    <td>Id</td>
                                    <td><input type="text" placeholder="Mã loại sản phẩm tự tăng" id="inputSuccess" class="form-control" readonly name="txtid"></td>
                                </tr>
                                <tr>
                                    <td>Đối tượng</td>
                                    <td>
                                    <select class="form-control" name="txtid_obj">
                                    <?php
                                    foreach ($ds1 as $obj1) {
                                    echo "<option value=\"$obj1->id\">$obj1->name</option>";
                                    }?>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Loại sản phẩm</td>
                                    <td><input type="text" pattern=".{1,50}" placeholder="Tên Loại sản phẩm" id="inputSuccess" required class="form-control" name="txtname"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-success" name="btnadd" value="Thêm">&nbsp;
                                        <a href="index.php?p=category/category.php" class="btn btn-danger">Hủy Bỏ</a>
                                        </td>
                                </tr>
                        </table>
    </fieldset>
</form>
                </div>                
            </div>
        </div>