<?php
include_once "../admin/wishlist/wishlist_class.php";
include_once "../admin/customer/customer_class.php";
$idview=$_GET["id"];
include 'code/auth.php';
    $wl=new wishlist();
    $cs=new customer();
    $add=new wishlist();
    $ab=new wishlist();
    $dsck=$ab->getdatabase();
session_start();
if(!isset($_SESSION['user']))
    header("location:index.php?p=new/login.php");
 else{
        $dscus=$cs->getemail(Auth::getLoggediUser());
         foreach ($dscus as $value) {
         $wl->id_cus=$value->id;
        }                                                    
        $wl->id_progroup=$idview;
        $wl->created_date=date("Y-m-d");
        $x=0;
        foreach ($dsck as $value1) {
        if($wl->id_progroup==$value1->id_progroup&&$wl->id_cus==$value1->id_cus)
        $x=1;
        }
        if($x==0) $add->add($wl);
        header("location:wishlist.php");
    }
?>