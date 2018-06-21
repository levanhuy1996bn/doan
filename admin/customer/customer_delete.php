<?php
    include 'customer_class.php';
    $id=(string)$_GET["id"];
    $del=new customer();
    $del->delete($id);
    header("location:index.php?p=customer/customer.php");
    ?>