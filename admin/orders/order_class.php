<?php
	include_once './database/db.php';
	class orders{
		public $id,$id_cus,$ttimes,$status,$total,$created_date,$updated_date;
		private $conn;
		function __construct(){
			$this->conn=data::getdatabase();
		}
		public function getdata1(){
			$lstS=array();
			$SQL="SELECT o.*,c.name as cusName
			FROM orders o
			INNER JOIN customer c
			ON o.id_cus = c.id
			ORDER BY o.id ASC";
			$result = mysqli_query($this->conn,$SQL);
			while($row=mysqli_fetch_array($result))
			{
				$s= new orders();
				$s->id=$row["id"];
				$s->id_cus=$row["cusName"];
				$s->ttimes=$row["ttimes"];
				$s->status=$row["status"];
				$s->total=$row["total"];
				$s->created_date=$row["created_date"];
				$s->updated_date=$row["updated_date"];
				array_push($lstS,$s);

			}
			return $lstS;
			$this->conn.close();
		}
		public function getdata(){
			$lstS=array();
			$SQL="SELECT id,id_cus,ttimes,status,total,created_date,updated_date FROM orders";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$s= new orders();
				$s->id=$row["id"];
				$s->id_cus=$row["id_cus"];
				$s->ttimes=$row["ttimes"];
				$s->status=$row["status"];
				$s->total=$row["total"];
				$s->created_date=$row["created_date"];
				$s->updated_date=$row["updated_date"];
				array_push($lstS,$s);

			}
			return $lstS;
			$this->conn.close();
		}
		public function getdatabase($id_cus){
			$lstS=array();
			$whereCondition = $id_cus > 0 ? " WHERE o.id_cus = $id_cus" : "";
			$SQL="SELECT o.*,c.name as cusName
			FROM orders o
			INNER JOIN customer c
			ON o.id_cus = c.id
			$whereCondition
			ORDER BY o.id ASC";
			$result = mysqli_query($this->conn,$SQL);
			while($row=mysqli_fetch_array($result))
			{
				$s= new orders();
				$s->id=$row["id"];
				$s->id_cus=$row["cusName"];
				$s->ttimes=$row["ttimes"];
				$s->status=$row["status"];
				$s->total=$row["total"];
				$s->created_date=$row["created_date"];
				$s->updated_date=$row["updated_date"];
				array_push($lstS,$s);

			}
			return $lstS;
			$this->conn.close();
		}
		public function add($or1)
		{
			$insert="INSERT INTO orders(id,id_cus,ttimes,status,total,created_date)"
			."VALUES(?,?,?,?,?,?)";
			$stmt=$this->conn->prepare($insert);
			$stmt->bind_param("ssssss",$or1->id,$or1->id_cus,$or1->ttimes,$or1->status,$or1->total,$or1->created_date);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function get($id)
		{
			$lstedit=array();
			$SQL="SELECT id,id_cus,ttimes,status,total,created_date,updated_date from orders 
			where id='$id'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$s=new orders();
				$s->id=$row["id"];
				$s->id_cus=$row["id_cus"];
				$s->ttimes=$row["ttimes"];
				$s->status=$row["status"];
				$s->total=$row["total"];
				$s->created_date=$row["created_date"];
				$s->updated_date=$row["updated_date"];
				array_push($lstedit,$s);
			}
			return $lstedit;
			$this->conn.close();
		}
		public function edit($id,$id_cus,$ttimes,$status,$total,$updated_date){
			$update="UPDATE orders SET id_cus=\"$id_cus\",ttimes=\"$ttimes\",status=\"$status\",total=\"$total\",updated_date=\"$updated_date\" WHERE id='$id'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function delete($id)
		{
			$delete="DELETE FROM orders WHERE id='$id'";
			$stmt=$this->conn->prepare($delete);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function editstatus($id,$status,$updated_date){
			$update="UPDATE orders SET status=\"$status\",updated_date=\"$updated_date\" WHERE id='$id'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function edittotal($id,$total,$updated_date){
			$update="UPDATE orders SET total=\"$total\",updated_date=\"$updated_date\" WHERE id='$id'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
	}
?>