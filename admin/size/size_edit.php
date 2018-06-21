<?php
    include_once 'size_class.php';
    $data=new Navigation();
    $id=(string)$_GET["id"];
    $type=new size();
    $ds=$type->get($id);
    if (isset($_REQUEST["btnedit"])) {
        $s=new size();
        $s->id=$_POST["id"];
        $s->name=$_POST["txtname"];
        $s->updated_date=date("Y-m-d");
        $capnhat=new size();
        $capnhat->edit($s->id,$s->name,$s->updated_date);
        header("location:index.php?p=size/size.php");
    }
    ?>
            <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thay đổi thông tin</h1>
                    <form method="post">
                        <fieldset>
                            <legend>Sửa kích cỡ của sản phẩm</legend>
                            <table>
                                <?php
                                foreach($ds as $key){ ?>
                                <tr>
                                    <td>Id</td>
                                    <td><input type="text" id="inputSuccess" class="form-control" readonly name="id" value="<?=$key->id?>"></td>
                                </tr>
                                <tr>
                                    <td>Kích cỡ</td>
                                    <td><input type="text" pattern="[A-Z]{1,3}" title="Tên kích cỡ phải là chữ và viết hoa" required placeholder="Kích cỡ của sản phẩm" id="inputSuccess" class="form-control" name="txtname" value="<?=$key->name?>"></td>    
                                </tr><?php
                                }
                                ?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-success" name="btnedit" value="Sửa">&nbsp;
                                        <a href="index.php?p=size/size.php" class="btn btn-danger">Hủy Bỏ</a>
                                        </td>
                                </tr>
                        </table>
    </fieldset>
</form>
                </div>                
            </div>
        </div>