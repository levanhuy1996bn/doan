<?php
	include_once "../database/db.php";
	class Auth{
		private $conn;
		function __construct(){
			$this->conn=data::getdatabase();
		}
		public static function Login($username,$password)
		{
			Auth::ensureSessionStart();
			$a=new Auth();
			$SQL="SELECT email,password,level from user where 1";
			$result = mysqli_query($a->conn,$SQL);
			while($row=mysqli_fetch_array($result))
			{
				if($username==$row["email"] && $password==$row["password"] &&$row["level"]=="Admin")
				{	
					$_SESSION["users"]=$username;
					return true;
				}
			}
			return false;
		}
		public static function checkLogin()
		{
			Auth::ensureSessionStart();
			if(!isset($_SESSION["users"])){
				header("location:new/login.php");
			}
		}
		public static function getLoggediUser(){
			Auth::ensureSessionStart();
			return $_SESSION["users"];
		}
		public static function Logout(){
			Auth::ensureSessionStart();
			session_destroy();
			header("location:login.php");
		}
		public static function ensureSessionStart(){
			if(session_id()==""){
				session_start();
			}
		}
	}
?>