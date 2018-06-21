<?php
	include_once '../admin/wishlist/wishlist_class.php';
	$idwl=$_GET["id"];
	$cs=new wishlist();
	$cs->delete($idwl);
	header("location:wishlist.php");
?>