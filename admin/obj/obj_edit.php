<?php
    include 'obj_class.php';
    $id=(string)$_GET["id"];
    $type=new obj();
    $ds=$type->get($id);
    if (isset($_REQUEST["btnedit"])) {
        $obj1=new obj();
        $obj1->id=$_POST["id"];
        $obj1->name=$_POST["txtname"];
        $obj1->updated_date=date("Y-m-d");
        $capnhat=new obj();
        $capnhat->edit($obj1->id,$obj1->name,$obj1->updated_date);
        header("location:index.php?p=obj/obj.php");
    }
    if(isset($_REQUEST["btnquaylai"]))
    {
        header("location:index.php?p=obj/obj.php");
    }
    ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thay đổi thông tin</h1>
                    <form method="post">
                        <fieldset style="width: 30%;">
                            <legend>Sửa tên đối tượng</legend>
                            <table>
                                <?php
                                foreach($ds as $key)?>
                                <tr>
                                    <td>Id</td>
                                    <td><input type="text" id="inputSuccess" class="form-control" readonly name="id" value="<?=$key->id?>"></td>
                                </tr>
                                <tr>
                                <td>Đối tượng</td>
                                <td><input type="text" pattern=".{1,50}" required placeholder="Đối tượng cho sản phẩm" class="form-control" name="txtname" value="<?=$key->name?>"></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-success" name="btnedit" value="Sửa">&nbsp;
                                        <a href="index.php?p=obj/obj.php" class="btn btn-danger">Hủy Bỏ</a>
                                        </td>
                                        </td>
                                </tr>
                        </table>
    </fieldset>
</form>
                </div>                
            </div>
        </div>
