<?php
    include 'slide_class.php';
    $id=(string)$_GET["id"];
    $del=new slide();
    $del->delete($id);
    header("location:index.php?p=slide/slide.php");
?>