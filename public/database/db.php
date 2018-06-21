<?php
	class data{
		public static function getdatabase(){
			$conn=new mysqli("localhost","root","","fashion");
			if($conn->connect_error){
				die("Kết nối đến đến MySQL bị lỗi. Chi Tiết: ".$conn->connect_error);
			}
			$conn->query("SET NAMES 'utf8'");
			return $conn;
		}
	}
?>