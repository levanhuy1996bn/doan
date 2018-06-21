<?php
    if (isset($_REQUEST["btnchange"])) {
        include_once "../admin/customer/customer_class.php";
        $a=new customer();
        $b=new customer();
        $ds=$a->getdatabase();
        $true1=$true2=0;
        $b->updated_date=date("Y-m-d");
        if($_POST["matkhaumoi"]!=$_POST["confirm"])
        $true2=1;
        foreach ($ds as $key) {
        if($_POST["gmail"]==$key->email&&$key->password==$_POST["matkhaucu"]){
            $b->id=$key->id;
            $true1=1;
        }
        }
        if ($true2==1||$true1==0) {
            echo "<script type='text/javascript'>
                alert('Đổi mật khẩu không thành công');
            </script>";
        }
        else{
            $b->password=$_POST["matkhaumoi"];
            $a->editpassword($b->id,$b->password,$b->updated_date);
            header("location:index.php");
        }
    }
?>
<div class="create-new-account col-md-6">
    <p style="font-weight: bold;">Đổi mật khẩu</p>
    <form class="register-form outer-top-xs" method="post" role="form">
    <fieldset>
    <div class="form-group">
        Email <span style="color: red;">*</span>
        <input type="email" name="gmail" class="form-control unicase-form-control text-input" >
    </div>
    <div class="form-group">
        Mật Khẩu cũ <span style="color: red;">*</span>
        <input type="password" name="matkhaucu" class="form-control unicase-form-control text-input">
    </div>
    <div class="form-group">
        Mật Khẩu mới <span style="color: red;">*</span>
        <input type="password" name="matkhaumoi" class="form-control unicase-form-control text-input">
    </div>
    <div class="form-group">
        Xác nhận mật khẩu mới <span style="color: red;">*</span>
        <input type="password" name="confirm" class="form-control unicase-form-control text-input">
    </div>
        <input type="submit" name="btnchange" value="Xác nhận" class="btn-upper btn btn-primary checkout-page-button">
    </fieldset>
    </form>
</div>