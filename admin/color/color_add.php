<?php
    include_once "color_class.php";
    $a=new color();
    $ds=$a->getdata();
    if(isset($_REQUEST["btnadd"]))
    {
        $s=new color();
        foreach ($ds as $key) {
            $s->id=$key->id+1;
        }
        $s->name=$_POST["txtname"];
        $s->created_date=date("Y-m-d");
        $add=new color();
        $add->add($s);
        header("location:index.php?p=color/color.php");
    }
    ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm mới</h1>
                    <form method="post">
                        <fieldset>
                            <legend>Nhập màu sắc sản phẩm</legend>
                            <table>
                                <tr>
                                    <td>ID</td>
                                    <td><input type="text" placeholder="mã màu sắc động tăng" id="inputSuccess" class="form-control" readonly name="txtid"></td>
                                </tr>
                                <tr>
                                    <td>Màu sắc</td>
                                    <td><input type="text" required placeholder="Nhập vào tên màu sắc" id="inputSuccess" class="form-control" name="txtname"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-success" name="btnadd" value="Thêm">&nbsp;
                                        <a href="index.php?p=color/color.php" class="btn btn-danger">Hủy Bỏ</a>
                                        </td>
                                </tr>
                        </table>
    </fieldset>
</form>
                </div>                
            </div>
        </div>
