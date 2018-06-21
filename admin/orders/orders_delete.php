<?php
    include_once 'order_class.php';
    include_once 'order_item_class.php';
    $id=(string)$_GET["id"];
    $a=new orders();
    $b=new order_item();
    $b->deleteidorders($id);
    $a->delete($id);
    header("location:index.php?p=orders/orders.php");
   ?>