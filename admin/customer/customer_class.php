<?php
	include_once './database/db.php';
	class customer{
		public $id,$sotrang,$name,$password,$email,$image,$phone,$address,$birth,$created_date,$updated_date="";
		private $conn;
		function __construct(){
			$this->conn=data::getdatabase();
		}
		public function getdata($from,$number)
		{
			$lst=array();
			$SQL="SELECT id,name,password,email,image,phone,address,birth,created_date,updated_date from customer ORDER BY id ASC";
			$result = mysqli_query($this->conn,$SQL);
	    	$total = mysqli_num_rows($result);
	    	$sotrang = ceil($total/$number);
	    	$SQL2="SELECT id,name,password,email,image,phone,address,birth,created_date,updated_date from customer ORDER BY id ASC LIMIT $from,$number";
			$result2 = mysqli_query($this->conn, $SQL2);
			while($row=mysqli_fetch_array($result2))
			{
				$customer1=new customer();
				$customer1->id=$row["id"];
				$customer1->name=$row["name"];
				$customer1->password=$row["password"];
				$customer1->email=$row["email"];
				$customer1->image=$row["image"];
				$customer1->phone=$row["phone"];
				$customer1->address=$row["address"];
				$customer1->birth=$row["birth"];
				$customer1->sotrang=$sotrang;
				$customer1->created_date=$row["created_date"];
				$customer1->updated_date=$row["updated_date"];
				array_push($lst,$customer1);

			}
			return $lst;
			$this->conn.close();
		}
		public function getdatabase()
		{
			$lst=array();
			$SQL="SELECT id,name,password,email,image,phone,address,birth,created_date,updated_date from customer ORDER BY id ASC";
			$result = mysqli_query($this->conn,$SQL);
			while($row=mysqli_fetch_array($result))
			{
				$customer1=new customer();
				$customer1->id=$row["id"];
				$customer1->name=$row["name"];
				$customer1->password=$row["password"];
				$customer1->email=$row["email"];
				$customer1->image=$row["image"];
				$customer1->phone=$row["phone"];
				$customer1->address=$row["address"];
				$customer1->birth=$row["birth"];
				$customer1->created_date=$row["created_date"];
				$customer1->updated_date=$row["updated_date"];
				array_push($lst,$customer1);

			}
			return $lst;
			$this->conn.close();
		}
		public function add($customer1)
		{
			$insert="INSERT INTO customer(name,password,email,image,phone,address,birth,created_date)"
			."VALUES(?,?,?,?,?,?,?,?)";
			$stmt=$this->conn->prepare($insert);
			$stmt->bind_param("ssssssss",$customer1->name,$customer1->password,$customer1->email,$customer1->image,$customer1->phone,$customer1->address,$customer1->birth,$customer1->created_date);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function get($id)
		{
			$lstedit=array();
			$SQL="SELECT id,name,password,email,image,phone,address,birth from customer where id='$id'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new customer();
				$a->id=$row["id"];
				$a->name=$row["name"];
				$a->password=$row["password"];
				$a->email=$row["email"];
				$a->image=$row["image"];
				$a->phone=$row["phone"];
				$a->address=$row["address"];
				$a->birth=$row["birth"];
				array_push($lstedit,$a);
			}
			return $lstedit;
			$this->conn.close();
		}
		public function edit($id,$name,$password,$email,$image,$phone,$address,$birth,$updated_date){
			$update="UPDATE customer SET name=\"$name\",password=\"$password\",email=\"$email\",image=\"$image\",phone=\"$phone\",address=\"$address\",birth=\"$birth\",updated_date=\"$updated_date\" WHERE id='$id'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function editpassword($id,$password,$updated_date){
			$update="UPDATE customer SET password=\"$password\",updated_date=\"$updated_date\" WHERE id='$id'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function delete($id)
		{
			$delete="DELETE FROM customer WHERE id='$id'";
			$stmt=$this->conn->prepare($delete);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function getemail($email)
		{
			$lstedit=array();
			$SQL="SELECT id,name,password,email,image,phone,address,birth,created_date,updated_date from customer where email='$email'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new customer();
				$a->id=$row["id"];
				$a->name=$row["name"];
				$a->password=$row["password"];
				$a->email=$row["email"];
				$a->image=$row["image"];
				$a->phone=$row["phone"];
				$a->address=$row["address"];
				$a->birth=$row["birth"];
				$a->created_date=$row["created_date"];
				$a->updated_date=$row["updated_date"];
				array_push($lstedit,$a);
			}
			return $lstedit;
			$this->conn.close();
		}
		public function getname($name)
		{
			$lstedit=array();
			$SQL="SELECT id,name,password,email,image,phone,address,birth,created_date,updated_date from customer where name='$name'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new customer();
				$a->id=$row["id"];
				$a->name=$row["name"];
				$a->password=$row["password"];
				$a->email=$row["email"];
				$a->image=$row["image"];
				$a->phone=$row["phone"];
				$a->address=$row["address"];
				$a->birth=$row["birth"];
				$a->created_date=$row["created_date"];
				$a->updated_date=$row["updated_date"];
				array_push($lstedit,$a);
			}
			return $lstedit;
			$this->conn.close();
		}
	}
?>