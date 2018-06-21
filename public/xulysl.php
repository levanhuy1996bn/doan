<?php
	$idorder=$_GET["idod"];
	include_once '../admin/product_group/product_group_class.php';
    include_once '../admin/orders/order_item_class.php';
    $show=new order_item();
    $ds=$show->getidorders($idorder);
    $type=new product_group();
    $ds2=$type->getdata();
     foreach ($ds as $key) 
            {
                foreach ($ds2 as $value)
                {
                    if($key->id_progroup==$value->id)
                    {
                        $sl=$value->qty-$key->qty;
                        $type->editqty($key->id_progroup,$sl,$date);
                    }
                }
            }
            header("location:order.php");
?>