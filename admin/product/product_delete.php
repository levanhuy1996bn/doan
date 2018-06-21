<?php
    include_once './category/category_class.php';
    include_once 'product_class.php';
    include_once './brand/brand_class.php';
    $id=(string)$_GET["id"];
    $del=new product();
    $del->delete($id);
    header("location:index.php?p=product/product.php");
?>