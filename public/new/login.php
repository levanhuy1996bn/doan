<script>
        function showPass(){
            var pass = document.getElementById('matkhau');
            if(document.getElementById('checkbox').checked){
                pass.setAttribute('type','text');
            }
            else{
                pass.setAttribute('type','password');
            }
        }
    </script> 
<?php
    include_once './code/auth.php';
    include_once '../admin/customer/customer_class.php';
    $n=new customer();
    $str="";
    if(isset($_REQUEST["btndangnhap"])){
        $email=$_POST["txtemail"];
        $password=$_POST["txtpassword"];
        if(!Auth::Login($email,$password)){
            echo "<script type='text/javascript'>
                alert('Tài khoản hoặc mật khẩu không đúng');
            </script>";
        }
        else{
                    header("location:index.php");
            }
        }
    if(isset($_REQUEST["btndangky"])){
        if ($_FILES['txtimage']['error'] > 0)
        {
            echo 'Không chọn ảnh';
        }
        else
        {
             move_uploaded_file($_FILES['txtimage']['tmp_name'], './Upload/'.$_FILES['txtimage']['name']);
        }
        //$n->id=$_POST["txtid"];
        $n->name=$_POST["txtname"];
        $n->password=$_POST["matkhau"];
        $n->email=$_POST["gmail"];
        $n->image=$_FILES['txtimage']['name'];
        $str=$_POST["confirm"];
        $n->phone=$_POST["txtsdt"];
        $n->address=$_POST["txtdiachi"];
        $n->birth=$_POST["txtbirth"];
        $n->created_date=date("Y-m-d");
        $ds=$n->getdatabase();
        $x=1;
        foreach ($ds as $key) {
            if($n->email==$key->email) $x=0;
        }
        if($x==0) echo "<script type='text/javascript'>
                    alert('Email này đã được sử dụng!');
                        </script>";
        else{
            if(((string)$n->password)!=((string)$str))
            {
                error_reporting(0);
                echo "<script type='text/javascript'>
                    alert('Xác nhận mật khẩu không trùng khớp!!');
                </script>";
            }
            else
            {
                $ndd=new customer();
                $ndd->add($n);
                header("location:index.php");
            }
        }
        
    }
?>
<div class="sign-in col-md-6">
    <p style="font-weight: bold;">Đăng Nhập</p>
    <form class="register-form outer-top-xs" method="post" role="form">
    <fieldset style="width: 50%;">
    <div class="form-group">
        <input type="hidden" name="txtid" class="form-control" id="inputSuccess">
        Email <span style="color: red;">*</span>
        <input type="email" name="txtemail" class="form-control" id="inputSuccess">
        </div>
        <div class="form-group">
            Mật Khẩu <span style="color: red;">*</span>
            <input type="password" name="txtpassword" class="form-control" id="inputSuccess">
        </div>
            <input type="submit" name="btndangnhap" value="Đăng Nhập" class="btn-upper btn btn-primary checkout-page-button">
    </fieldset>
    </form>                 
</div>
<div class="create-new-account col-md-6">
    <p style="font-weight: bold;">Đăng Ký</p>
    <form class="register-form outer-top-xs" method="post" enctype="multipart/form-data" role="form">
    <fieldset style="width: 100%;">
    <table>
        <div class="form-group">
        <tr>
        <td>Họ tên <span style="color: red;">*</span></td>
        <td><input type="text" pattern=".{1,50}" required placeholder="Tên khách hàng" name="txtname" value="<?=$n->name?>" class="form-control unicase-form-control text-input"></td></tr>
    </div>
    <div class="form-group">
        <tr>
        <td>Email <span style="color: red;">*</span></td>
        <td><input type="email" placeholder="Địa chỉ email" name="gmail" value="<?=$n->email?>" class="form-control unicase-form-control text-input" ></td></tr>
    </div>
    <div class="form-group">
        <tr>
        <td>Số điện thoại <span style="color: red;">*</span></td>
        <td><input type="text" required title="Số điện thoại phải có 10 hoặc 11 số" pattern="[0-9]{10,11}" maxlength="11" placeholder="Số điện thoại" name="txtsdt" value="<?=$n->phone?>" class="form-control unicase-form-control text-input"></td></tr>
    </div>
    <div class="form-group">
        <tr>
        <td>Mật Khẩu <span style="color: red;">*</span></td>
        <td><input type="password" required title="Mật khẩu ít nhất 6 ký tự" pattern=".{6,50}" name="matkhau" class="form-control unicase-form-control text-input" id="matkhau"></td></tr>
        <tr><td></td><td><input type="checkbox" id="checkbox" onclick="showPass()">Show password</td></tr>
    </div>
    <div class="form-group">
        <tr>
        <td>Xác nhận mật khẩu <span style="color: red;">*</span></td>
        <td><input type="password" placeholder="Xác nhận mật khẩu" name="confirm" class="form-control unicase-form-control text-input"></td></tr>
    </div>
    <div class="form-group">
        <tr>
        <td>Ảnh <span style="color: red;">*</span></td>
        <td><input type="file" name="txtimage"></td></tr>
    </div>
    <div class="form-group">
        <tr>
        <td>Ngày Sinh <span style="color: red;">*</span></td>
        <td><input type="date" name="txtbirth" value="<?=$n->birth?>" class="form-control unicase-form-control text-input"></td></tr>
    </div>
    <div class="form-group">
        <tr>
        <td>Địa chỉ <span style="color: red;">*</span></td>
        <td><textarea cols="60" rows="5" placeholder="Địa chỉ nơi thường trú của khách hàng" class="form-control unicase-form-control text-input" name="txtdiachi"></textarea></td></tr>
    </div>
    <tr>
        <td></td>
        <td><input type="submit" name="btndangky" value="Đăng Ký" class="btn-upper btn btn-primary checkout-page-button"></td>
    </tr>
    </fieldset>
    </table>
    </form>
</div>