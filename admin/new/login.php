<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Đăng nhập</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<style type="text/css">
    body{
        background-image: url(../Upload/back.jpg);
    }
    .back{
        background-image: url(../Upload/back.jpg);
    }
</style>
<?php
    include_once '../code/auth.php';
    error_reporting(0);
    include_once '../users/user_class.php';
    if(isset($_POST["login"])){
        $username=$_POST["txtuser"];
        $password=$_POST["txtpassword"];
        if(!Auth::Login($username,$password)){
             echo "<script type='text/javascript'>
                alert('Tài khoản hoặc mật khẩu không đúng');
            </script>";
        }
        else{
                    header("location:../index.php");
            }
        }
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Vui lòng đăng nhập!</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Tài Khoản" name="txtuser" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật Khẩu" name="txtpassword" type="password" value="">
                                </div>
                                <div class="checkbox">
                                        <!--<input name="remember" type="checkbox" value="Remember Me">Remember Me-->
                                </div>
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Đăng nhập" name="login">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
</body>
</html>
