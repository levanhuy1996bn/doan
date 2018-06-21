<?php
	session_start();
	$id=$_GET['idPro'];
	echo $id;
		unset($_SESSION['cart'][$id]);
		header("location:../listofcart.php");
?>