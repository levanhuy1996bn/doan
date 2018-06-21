<?php
	$y=0.0;
    include_once './hoadonnhap/hdn_class.php';
    include_once './product_group/product_group_class.php';
    include_once 'cthdn_class.php';
    $hdnid=(string)$_GET["id_hdn"];
    $groupid=(string)$_GET["id_group"];
    $type=new product_group();
    $ds2=$type->getdata();
    $a=new hdn();
    $show=new cthdn();
    $dshdn=$a->get($hdnid);
    $dscthdn=$show->get($hdnid,$groupid);
    foreach ($dshdn as $key){
    	foreach ($dscthdn as $value){
    		$y=$key->total-$value->total;
    	}}
    foreach ($ds2 as $key1) {
            foreach ($dscthdn as $key2) {
                if ($key1->id==$key2->id_progroup) {
                    $c=$key1->qty-$key2->qty;
                }
            }
        }
    $show->delete($hdnid,$groupid);
	$d=date("Y-m-d");
    $type->editqty($groupid,$c,$d);
    $a->edittotal($hdnid,$y,$d);
    header("location:index.php?p=hoadonnhap/hdn_view.php&id=$hdnid");
?>
