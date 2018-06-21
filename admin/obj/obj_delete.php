
<?php
    include 'obj_class.php';
    $id=(string)$_GET["id"];
    $del=new obj();
    $del->delete($id);
    header("location:index.php?p=obj/obj.php");
?>