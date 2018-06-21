<script>
        function showPass(){
            var pass = document.getElementById('password');
            if(document.getElementById('checkbox').checked){
                pass.setAttribute('type','text');
            }
            else{
                pass.setAttribute('type','password');
            }
        }
</script> 
<?php
    include_once "customer_class.php";
    $b=new customer();
    $ds=$b->getdatabase();
    if(isset($_REQUEST["btnadd"]))
    { 
        $a=new customer();
        if ($_FILES['txtimage']['error'] > 0)
        {
            echo 'File Upload Error';
        }
        else
        {
             move_uploaded_file($_FILES['txtimage']['tmp_name'], '../public/Upload/'.$_FILES['txtimage']['name']);
        }
        //$a->id=$_POST["txtid"];
        foreach ($ds as $key) {
            $a->id=$key->id+1;
        }
        $a->name=$_POST["txtname"];
        $a->password=$_POST["txtpassword"];
        $a->email=$_POST["txtemail"];
        $a->image=$_FILES['txtimage']['name'];
        $a->phone=$_POST["txtphone"];
        $a->address=$_POST["txtaddress"];
        $a->birth=$_POST["txtbirth"];
        $a->created_date=date("Y-m-d");
        $ds=$a->getdatabase();
        $x=1;
        $str="";
        foreach ($ds as $key) {
            if($a->email==$key->email) $x=0;
        }
        if($x==0){$str="Email đã tồn tại vui lòng điền email khác!";}
        else{
                $x=1;
                $add=new customer();
                $add->add($a);
                header("location:index.php?p=customer/customer.php");
            }
        
    }
    ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm mới</h1>
                    <form method="post" enctype="multipart/form-data">
                        <fieldset style="width: 50%;">
                            <legend>Nhập thông tin của khách hàng</legend>
                            <table>
                                <tr>
                                    <td>Id</td>
                                    <td><input type="text" class="form-control" readonly name="txtid"></td>
                                </tr>
                                <tr>
                                    <td>Tên khách hàng</td>
                                    <td><input type="text" pattern=".{1,50}" required placeholder="Nhập tên" class="form-control" name="txtname" value="<?=$a->name?>"></td>
                                </tr>
                                <tr>
                                    <td>Mật khẩu</td>
                                    <td><input type="password" class="form-control" id="password" placeholder="Mật khẩu" required title="Mật khẩu ít nhất 6 ký tự" pattern=".{6,50}" name="txtpassword">
                                    <input type="checkbox" id="checkbox" onclick="showPass()">Show password</td>
                                </tr>
                                <tr>
                                    <td>Ảnh</td>
                                    <td><input type="file" name="txtimage"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="email" placeholder="Email" required class="form-control" name="txtemail" value="<?=$a->email?>">
                                        <?php if($x==0) echo '<strong>'.$str.'</strong>'; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td><input type="tel" placeholder="Nhập số điện thoại" required title="Số điện thoại phải có 10 hoặc 11 số" pattern="[0-9]{10,11}" maxlength="11" class="form-control" name="txtphone" value="<?=$a->phone?>"></td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td><textarea cols="50" class="ckeditor" placeholder="Địa chỉ" required rows="10" name="txtaddress"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Ngày sinh</td>
                                    <td><input type="date" name="txtbirth" value="<?=$a->birth?>" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-success" name="btnadd" value="Thêm">&nbsp;
                                        <a href="index.php?p=customer/customer.php" class="btn btn-danger">Hủy Bỏ</a>
                                        </td>
                                </tr>
                        </table>
    </fieldset>
</form>
                </div>                
            </div>
        </div>
