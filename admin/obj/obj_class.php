<?php
	include_once './database/db.php';
	class obj{
	 	public $id, $name,$created_date,$updated_date="";
		private $conn;
		function __construct(){
			$this->conn=data::getdatabase();
		}
		public function getdatabase()
		{
			$lst=array();
			$SQL="SELECT id,name,created_date,updated_date from obj ORDER BY id ASC";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$obj1=new obj();
				$obj1->id=$row["id"];
				$obj1->name=$row["name"];
				$obj1->created_date=$row["created_date"];
				$obj1->updated_date=$row["updated_date"];
				array_push($lst,$obj1);

			}
			return $lst;
			$this->conn.close();
		}
		public function add($obj1)
		{
			$insert="INSERT INTO obj(id,name,created_date)"
			."VALUES(?,?,?)";
			$stmt=$this->conn->prepare($insert);
			$stmt->bind_param("sss",$obj1->id,$obj1->name,$obj1->created_date);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function get($id)
		{
			$lstedit=array();
			$SQL="SELECT id,name from obj where id='$id'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$obj1=new obj();
				$obj1->id=$row["id"];
				$obj1->name=$row["name"];
				array_push($lstedit,$obj1);

			}
			return $lstedit;
			$this->conn.close();
		}
		public function edit($id,$name,$updated_date){
			$update="UPDATE obj SET name=\"$name\",updated_date=\"$updated_date\" WHERE id='$id'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function delete($id)
		{
			$delete="DELETE FROM obj WHERE id='$id'";
			$stmt=$this->conn->prepare($delete);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
}
?>