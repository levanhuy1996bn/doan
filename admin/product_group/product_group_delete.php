<?php
    include_once './product/product_class.php';
    include_once './size/size_class.php';
    include_once './color/color_class.php';
    include_once 'product_group_class.php';
    $id=(string)$_GET["id"];
    $del=new product_group();
    $del->delete($id);
    header("location:index.php?p=product_group/product_group.php");
?>