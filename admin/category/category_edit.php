<?php
    include_once 'category_class.php';
    include_once './obj/obj_class.php';
    $type=new obj();
    $ds1=$type->getdatabase();
    $data=new Navigation();
    $id=(string)$_GET["id"];
    $type=new category();
    $ds=$type->get($id);
    if (isset($_REQUEST["btnedit"])) {
        $s=new category();
        $s->id=$_POST["id"];
        $s->obj_id=$_POST["id_obj1"];
        $s->name=$_POST["txtname"];
        $s->updated_date=date("Y-m-d");
        $capnhat=new category();
        $capnhat->edit($s->id,$s->obj_id,$s->name,$s->updated_date);
        header("location:index.php?p=category/category.php");
    }
    if(isset($_REQUEST["btnquaylai"]))
    {
        header("location:index.php?p=category/category.php");
    }
    ?>
            <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thay đổi thông tin</h1>
                    <form method="post">
                        <fieldset>
                            <legend>Sửa tên loại sản phẩm</legend>
                            <table>
                                <?php
                                foreach($ds as $key){ ?>
                                <tr>
                                    <td>ID</td>
                                    <td><input type="text" id="inputSuccess" class="form-control" readonly name="id" value="<?=$key->id?>"></td>
                                </tr>
                                <tr>
                                <td>Object</td>
                                <td>
                                    <select class="form-control" name="id_obj1">
                                    <?php
                                    foreach ($ds1 as $obj1) {
                                    $selected = $key->obj_id== $obj1->id ? "selected" : "";
                                    echo "<option value=\"$obj1->id\" $selected>$obj1->name</option>";
                                    }?>
                                    </select>
                                </td>
                            </tr>
                                <tr>
                                    <td>Name</td>
                                    <td><input type="text" pattern=".{1,50}" required placeholder="Tên Loại sản phẩm" id="inputSuccess" class="form-control" name="txtname" value="<?=$key->name?>"></td>    
                                </tr><?php
                                }
                                ?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-success" name="btnedit" value="Sửa">&nbsp;
                                        <a href="index.php?p=category/category.php" class="btn btn-danger">Hủy Bỏ</a>
                                        </td>
                                </tr>
                        </table>
    </fieldset>
</form>
                </div>                
            </div>
        </div>