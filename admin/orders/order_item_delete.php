<?php
	$ordersid=(string)$_GET["id_order"];
    $groupid=(string)$_GET["id_progroup"];
    include_once 'order_class.php';
    include_once './product_group/product_group_class.php';
    include_once 'order_item_class.php';
    $type=new product_group();
    $ds2=$type->getdata();
    $y=0.0;
    $a=new orders();
    $show=new order_item();
    $dsorders=$a->get($ordersid);
    $d=date("Y-m-d");
    $dsorder_item=$show->get($ordersid,$groupid);
    foreach ($dsorders as $key){
    	foreach ($dsorder_item as $value){
    		$y=$key->total-$value->total;
    	}}
        foreach ($ds2 as $key1) {
            foreach ($dsorder_item as $key2) {
                if ($key1->id==$key2->id_progroup) {
                    $c=$key1->qty+$key2->qty;
                }
            }
        }
    $type->editqty($groupid,$c,$d);
    $show->delete($ordersid,$groupid);
    $a->edittotal($ordersid,$y,$d);
    header("location:index.php?p=orders/orders_view.php&id=$ordersid");
?>