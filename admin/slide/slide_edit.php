<?php
    include 'slide_class.php';
    $id=(string)$_GET["id"];
    $sli=new slide();
    $ds=$sli->get($id);
    if (isset($_REQUEST["btnedit"])) {
        $objslide1=new slide();
        if ($_FILES['image']['error']==0)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], '../public/Upload/'.$_FILES['image']['name']);
            $img=$_FILES['image']['name'];
            $objslide1->image=$img;
        }
        else
        {
             $objslide1->image=$_POST['img'];
        }
        $objslide1->id=$_POST["id"];
        $objslide1->name=$_POST["txtname"];
        $objslide1->link=$_POST["txtlink"];
        $objslide1->updated_date=date("Y-m-d");
        $capnhat=new slide();
        $capnhat->edit($objslide1->id,$objslide1->name,$objslide1->image,$objslide1->link,$objslide1->updated_date);
        header("location:index.php?p=slide/slide.php");
    }
    if(isset($_REQUEST["btnquaylai"]))
    {
        header("location:index.php?p=slide/slide.php");
    }
    ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa Slide</h1>
                    <form method="post" enctype="multipart/form-data">
                        <fieldset style="width: 30%;">
                            <table>
                                <?php
                                foreach($ds as $key)?>
                                        <input type="hidden" name="img" value="<?=$key->image?>">
                                <tr>
                                    <td>STT </td>
                                    <td><input type="text" id="inputSuccess" class="form-control" readonly name="id" value="<?=$key->id?>"></td>  
                                </tr>
                                <tr>
                                    <td>Tên </td>
                                    <td><input type="text" id="inputSuccess" class="form-control" name="txtname" value="<?=$key->name?>"></td>    
                                </tr>
                                <div class="form-group">
                                <tr>
                                    <td>Ảnh </td>
                                    <td><input class="form-control" type="file" id="fileUpload" name="image"></td>   
                                </tr>
                                <tr>
                                    <td></td>
                                    <div id="image-holder"><td><img src="../public/Upload/<?=$key->image?>" width="300"></td></div>
                                </tr>
                                </div>
                                <tr>
                                    <td>Link </td>
                                    <td><input type="text" id="inputSuccess" class="form-control" name="txtlink" value="<?=$key->link?>"></td>    
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        
                                        <input type="submit" class="btn btn-success" name="btnedit" value="Sửa">&nbsp;
                                        <input type="submit" name="btnquaylai" value="Hủy Bỏ" class="btn btn-danger">
                                        </td>
                                </tr>
                        </table>
    </fieldset>
</form>
                </div>                
            </div>
        </div>