
<?php
    include_once 'color_class.php';
    $id=(string)$_GET["id"];
    $del=new color();
    $del->delete($id);
    header("location:index.php?p=color/color.php");
    ?>