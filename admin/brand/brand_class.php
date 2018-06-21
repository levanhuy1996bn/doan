<?php
	include_once './database/db.php';
	class brand{
	 	public $id, $name,$image,$created_date,$updated_date="";
		private $conn;
		function __construct(){
			$this->conn=data::getdatabase();
		}
		public function getdata()
		{
			$lst=array();
			$SQL="SELECT id,name,image,created_date,updated_date from brand ORDER BY id ASC";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$brand1=new brand();
				$brand1->id=$row["id"];
				$brand1->name=$row["name"];
				$brand1->image=$row["image"];
				$brand1->created_date=$row["created_date"];
				$brand1->updated_date=$row["updated_date"];
				array_push($lst,$brand1);

			}
			return $lst;
			$this->conn.close();
		}
		public function getdatabase()
		{
			$lst=array();
			$SQL="SELECT id,name,created_date,updated_date from brand ORDER BY id ASC";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$brand1=new brand();
				$brand1->id=$row["id"];
				$brand1->name=$row["name"];
				$brand1->created_date=$row["created_date"];
				$brand1->updated_date=$row["updated_date"];
				array_push($lst,$brand1);

			}
			return $lst;
			$this->conn.close();
		}
		public function add($bran)
		{
			$insert="INSERT INTO brand(id,name,image,created_date)"
			."VALUES(?,?,?,?)";
			$stmt=$this->conn->prepare($insert);
			$stmt->bind_param("ssss",$bran->id,$bran->name,$bran->image,$bran->created_date);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function get($id)
		{
			$lstedit=array();
			$SQL="SELECT id,name,image from brand where id='$id'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$brand1=new brand();
				$brand1->id=$row["id"];
				$brand1->name=$row["name"];
				$brand1->image=$row["image"];
				array_push($lstedit,$brand1);

			}
			return $lstedit;
			$this->conn.close();
		}
		public function edit($id,$name,$image,$updated_date){
			$update="UPDATE brand SET name=\"$name\",image=\"$image\",updated_date=\"$updated_date\" WHERE id='$id'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function delete($id)
		{
			$delete="DELETE FROM brand WHERE id='$id'";
			$stmt=$this->conn->prepare($delete);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
}
?>