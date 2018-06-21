<?php
	include_once './database/db.php';
	class size{
		public $id,$name,$created_date,$updated_date="";
		private $conn;
			function __construct(){
			$this->conn=data::getdatabase();
		}
		public function getdata(){
			$lstS=array();
			$SQL="SELECT id,name,created_date,updated_date FROM size";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$s= new size();
				$s->id=$row["id"];
				$s->name=$row["name"];
				$s->created_date=$row["created_date"];
				$s->updated_date=$row["updated_date"];
				array_push($lstS,$s);

			}
			return $lstS;
			$this->conn.close();
		}
		public function add($size1)
		{
			$insert="INSERT INTO size(id,name,created_date)"
			."VALUES(?,?,?)";
			$stmt=$this->conn->prepare($insert);
			$stmt->bind_param("sss",$size1->id,$size1->name,$size1->created_date);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function get($id)
		{
			$lstedit=array();
			$SQL="SELECT id,name from size 
			where id='$id'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$s=new size();
				$s->id=$row["id"];
				$s->name=$row["name"];
				array_push($lstedit,$s);
			}
			return $lstedit;
			$this->conn.close();
		}
		public function edit($id,$name,$updated_date){
			$update="UPDATE size SET name=\"$name\",updated_date=\"$updated_date\" WHERE id='$id'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function delete($id)
		{
			$delete="DELETE FROM size WHERE id='$id'";
			$stmt=$this->conn->prepare($delete);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
	}
?>