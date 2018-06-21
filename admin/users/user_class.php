<?php
	include_once './database/db.php';
	class user{
		public $id,$name,$password,$email,$image,$phone,$address,$level,$created_date,$updated_date;
		private $conn;
		function __construct(){
			$this->conn=data::getdatabase();
		}
		public function getdatabase()
		{
			$lst=array();
			$SQL="SELECT id,name,password,email,image,phone,address,level,created_date,updated_date from user ORDER BY id ASC";
			$result = mysqli_query($this->conn,$SQL);
			while($row=mysqli_fetch_array($result))
			{
				$user1=new user();
				$user1->id=$row["id"];
				$user1->name=$row["name"];
				$user1->password=$row["password"];
				$user1->email=$row["email"];
				$user1->image=$row["image"];
				$user1->phone=$row["phone"];
				$user1->address=$row["address"];
				$user1->level=$row["level"];
				$user1->created_date=$row["created_date"];
				$user1->updated_date=$row["updated_date"];
				array_push($lst,$user1);

			}
			return $lst;
			$this->conn.close();
		}
		public function add($user1)
		{
			$insert="INSERT INTO user(id,name,password,email,image,phone,address,level,created_date)"
			."VALUES(?,?,?,?,?,?,?,?,?)";
			$stmt=$this->conn->prepare($insert);
			$stmt->bind_param("sssssssss",$user1->id,$user1->name,$user1->password,$user1->email,$user1->image,$user1->phone,$user1->address,$user1->level,$user1->created_date);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function get($id)
		{
			$lstedit=array();
			$SQL="SELECT id,name,password,email,image,phone,address,level from user where id='$id'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new user();
				$a->id=$row["id"];
				$a->name=$row["name"];
				$a->password=$row["password"];
				$a->email=$row["email"];
				$a->image=$row["image"];
				$a->phone=$row["phone"];
				$a->address=$row["address"];
				$a->level=$row["level"];
				array_push($lstedit,$a);
			}
			return $lstedit;
			$this->conn.close();
		}
		public function edit($id,$name,$password,$email,$image,$phone,$address,$level,$updated_date){
			$update="UPDATE user SET name=\"$name\",password=\"$password\",email=\"$email\",image=\"$image\",phone=\"$phone\",address=\"$address\",level=\"$level\",updated_date=\"$updated_date\" WHERE id='$id'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function delete($id)
		{
			$delete="DELETE FROM user WHERE id='$id'";
			$stmt=$this->conn->prepare($delete);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function getemail($email)
		{
			$lstedit=array();
			$SQL="SELECT id,name,password,email,image,phone,address,level,created_date,updated_date from user where email='$email'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new user();
				$a->id=$row["id"];
				$a->name=$row["name"];
				$a->password=$row["password"];
				$a->email=$row["email"];
				$a->image=$row["image"];
				$a->phone=$row["phone"];
				$a->address=$row["address"];
				$a->level=$row["level"];
				$a->created_date=$row["created_date"];
				$a->updated_date=$row["updated_date"];
				array_push($lstedit,$a);
			}
			return $lstedit;
			$this->conn.close();
		}
	}
?>