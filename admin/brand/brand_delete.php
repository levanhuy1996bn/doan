<?php
    include_once 'brand_class.php';
    $id=(string)$_GET["id"];
    $del=new brand();
    $del->delete($id);
    header("location:index.php?p=brand/brand.php");
?>