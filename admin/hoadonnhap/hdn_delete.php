<?php
    include_once 'hdn_class.php';
    include_once './cthdn/cthdn_class.php';
    $id=(string)$_GET["id"];
    $a=new hdn();
    $b=new cthdn();
    $b->deleteidhdn($id);
    $a->delete($id);
    header("location:index.php?p=hoadonnhap/hdn.php");
    ?>