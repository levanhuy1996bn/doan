<?php
    include 'user_class.php';
    $id=(string)$_GET["id"];
            $del=new user();
            $del->delete($id);
            header("location:index.php?p=users/user.php");
?>