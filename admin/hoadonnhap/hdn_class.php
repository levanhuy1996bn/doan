<?php
	include_once './database/db.php';
	class hdn{
		public $id,$status,$total,$created_date,$updated_date,$sotrang="";
		function __construct(){
			$this->conn=data::getdatabase();
		}
		public function getdata()
		{
			$lst=array();
			$SQL="SELECT id,status,total,created_date,updated_date from hdn ORDER BY id ASC";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new hdn();
				$a->id=$row["id"];
				$a->status=$row["status"];
				$a->total=$row["total"];
				$a->created_date=$row["created_date"];
				$a->updated_date=$row["updated_date"];
				array_push($lst,$a);
			}
			return $lst;
			$this->conn.close();
		}
		public function edittotal($id,$total,$updated_date){
			$update="UPDATE hdn SET total=\"$total\",updated_date=\"$updated_date\" WHERE id='$id'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function editstatus($id,$status,$updated_date){
			$update="UPDATE hdn SET status=\"$status\",updated_date=\"$updated_date\" WHERE id='$id'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function add($hdn1)
		{
			$insert="INSERT INTO hdn(id,status,total,created_date)"
			."VALUES(?,?,?,?)";
			$stmt=$this->conn->prepare($insert);
			$stmt->bind_param("ssss",$hdn1->id,$hdn1->status,$hdn1->total,$hdn1->created_date);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function get($id)
		{
			$lstedit=array();
			$SQL="SELECT id,status,total from hdn where id='$id'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new hdn();
				$a->id=$row["id"];
				$a->status=$row["status"];
				$a->total=$row["total"];
				array_push($lstedit,$a);

			}
			return $lstedit;
			$this->conn.close();
		}
		public function edit($id,$status,$total,$updated_date){
			$update="UPDATE hdn SET status=\"$status\",total=\"$total\",updated_date=\"$updated_date\" WHERE id='$id'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function delete($id)
		{
			$delete="DELETE FROM hdn WHERE id='$id'";
			$stmt=$this->conn->prepare($delete);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
	}
?>