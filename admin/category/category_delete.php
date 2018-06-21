
<?php
    include_once 'category_class.php';
    $id=(string)$_GET["id"];
    $del=new category();
    $del->delete($id);
    header("location:index.php?p=category/category.php");

    ?>