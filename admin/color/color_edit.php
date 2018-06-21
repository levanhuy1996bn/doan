<?php
    include_once 'color_class.php';
    $data=new Navigation();
    $id=(string)$_GET["id"];
    $type=new color();
    $ds=$type->get($id);
    if (isset($_REQUEST["btnedit"])) {
        $s=new color();
        $s->id=$_POST["id"];
        $s->name=$_POST["txtname"];
        $s->updated_date=date("Y-m-d");
        $capnhat=new color();
        $capnhat->edit($s->id,$s->name,$s->updated_date);
        header("location:index.php?p=color/color.php");
    }
    ?>
            <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thay đổi thông tin</h1>
                    <form method="post">
                        <fieldset>
                            <legend>Sửa tên màu sắc</legend>
                            <table>
                                <?php
                                foreach($ds as $key){ ?>
                                <tr>
                                    <td>ID</td>
                                    <td><input type="text" id="inputSuccess" class="form-control" readonly name="id" value="<?=$key->id?>"></td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td><input type="text" pattern=".{1,50}" required placeholder="Nhập vào tên màu sắc" id="inputSuccess" class="form-control" name="txtname" value="<?=$key->name?>"></td>    
                                </tr><?php
                                }
                                ?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-success" name="btnedit" value="Sửa">&nbsp;
                                        <a href="index.php?p=color/color.php" class="btn btn-danger">Hủy Bỏ</a>
                                        </td>
                                </tr>
                        </table>
    </fieldset>
</form>
                </div>                
            </div>
        </div>
