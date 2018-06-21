><?php
	include_once 'wishlist_class.php';
	$idwl=$_GET["id"];
	$cs=new wishlist();
	$cs->delete($idwl);
	header("location:index.php?p=wishlist/wishlist.php");
?>