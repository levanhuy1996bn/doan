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
    include 'user_class.php';
    $id=(string)$_GET["id"];
    $type=new user();
    $ds=$type->get($id);
    if (isset($_REQUEST["btnedit"])) {
        $a=new user();
        if ($_FILES['image']['error']==0)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], '../public/Upload/'.$_FILES['image']['name']);
            $img=$_FILES['image']['name'];
            $a->image=$img;
        }
        else
        {
             $a->image=$_POST['img'];
        }
        $a->id=$_POST["id"];
        $a->name=$_POST["txtname"];
        $a->password=$_POST["txtpassword"];
        $a->email=$_POST["txtemail"];
        $a->phone=$_POST["txtphone"];
        $a->address=$_POST["txtaddress"];
        $a->level=$_POST["txtlevel"];
        $a->updated_date=date("Y-m-d");
            $capnhat=new user();
            $capnhat->edit($a->id,$a->name,$a->password,$a->email,$a->image,$a->phone,$a->address,$a->level,$a->updated_date);
        header("location:index.php?p=users/user.php");
    }
    ?>
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thay đổi thông tin</h1>
                    <form method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Sửa thông tin tài khoản</legend>
                            <table>
                                <?php
                                foreach($ds as $key)?>
                                <tr>
                                    <td>Id</td>
                                    <td><input type="text" class="form-control" readonly name="id" value="<?=$key->id?>"></td>  
                                </tr>
                                <input type="hidden" name="img" value="<?=$key->image?>">
                                <tr>
                                    <td>Tên tài khoản</td>
                                    <td><input type="text" pattern=".{1,50}" placeholder="Nhập tên tài khoản" class="form-control" required name="txtname" value="<?=$key->name?>"></td>
                                </tr>
                                <tr>
                                    <td>Mật khẩu</td>
                                    <td><input type="password" id="password" placeholder="Mật khẩu" title="Mật khẩu ít nhất 6 ký tự" pattern=".{6,50}" value="<?=$key->password?>" required name="txtpassword">
                                    <input type="checkbox" id="checkbox" onclick="showPass()">Show password</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="email" class="form-control" readonly value="<?=$key->email?>" name="txtemail"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><img width="300" src="../public/Upload/<?=$key->image?>"></td>
                                </tr>
                                <tr>
                                    <td>Ảnh</td>
                                    <td><input type="file" name="image"></td>  
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td><input type="tel" placeholder="Nhập số điện thoại" required title="Số điện thoại phải có 10 hoặc 11 số" pattern="[0-9]{10,11}" required maxlength="11" value="<?=$key->phone?>" class="form-control" name="txtphone"></td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td><textarea cols="50" class="ckeditor" rows="10" name="txtaddress"><?=$key->address?></textarea></td>
                                </tr>
                                <tr>
                                    <td>Level</td>
                                    <td><select name="txtlevel" class="form-control">
                                        <option value="Admin" <?php if($key->level=="Admin") echo "selected"; ?>>Admin</option>
                                        <option value="User" <?php if($key->level=="User") echo "selected"; ?>>User</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-success" name="btnedit" value="Sửa">&nbsp;
                                        <a href="index.php?p=users/user.php" class="btn btn-danger">Hủy Bỏ</a>
                                        </td>
                                </tr>
                        </table>
    </fieldset>
</form>
