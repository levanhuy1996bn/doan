<?php
    include 'slide_class.php';
    $a=new slide();
    $ds=$a->getdata();
        if (isset($_REQUEST["btnadd"])) {
        $objslide1=new slide();
        if ($_FILES['txtimage']['error'] > 0)
        {
            echo 'File Upload Error';
        }
        else
        {
             move_uploaded_file($_FILES['txtimage']['tmp_name'], '../public/Upload/'.$_FILES['txtimage']['name']);
        }
        foreach ($ds as $key) {
            $objslide1->id=$key->id+1;
        }
        $objslide1->name=$_POST["txtname"];
        $objslide1->image=$_FILES['txtimage']['name'];
        $objslide1->link=$_POST["txtlink"];
        $objslide1->created_date=date("Y-m-d");
        $add=new slide();
        $add->add($objslide1);
        header("location:index.php?p=slide/slide.php");
    }
    ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm Mới</h1>
                    <form method="post" enctype="multipart/form-data">
                        <fieldset style="width: 30%;">
                            <table>
                                <tr>
                                    <td>STT</td>
                                    <td><input type="text" id="inputSuccess" class="form-control" readonly name="txtid"></td>
                                </tr>
                                <tr>
                                    <td>Tên</td>
                                    <td><input type="text" required placeholder="Tên Slide" id="inputSuccess" class="form-control" name="txtname"></td>
                                </tr>
                                <tr>
                                    <td>Ảnh</td>
                                    <td><input type="file" name="txtimage"></td>
                                </tr>
                                <tr>
                                    <td>Link</td>
                                    <td><input type="text" required placeholder="Link" id="inputSuccess" class="form-control" name="txtlink"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-success" name="btnadd" value="Thêm">&nbsp;
                                        <a class="btn btn-danger" href="index.php?p=slide/slide.php">Hủy bỏ</a>
                                        </td>
                                </tr>
                        </table>
    </fieldset>
</form>
                </div>                
            </div>
        </div>
