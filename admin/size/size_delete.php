<?php
    include_once 'size_class.php';
    $id=(string)$_GET["id"];
    $del=new size();
    $del->delete($id);
    header("location:index.php?p=size/size.php");
    ?>