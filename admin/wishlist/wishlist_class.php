<?php
	include_once './database/db.php';
	class wishlist{
		public $id,$id_progroup,$id_cus,$created_date,$updated_date;
		function __construct(){
			$this->conn=data::getdatabase();
		}
		public function getdatabase()
		{
			$lst=array();
			$SQL="
			SELECT id,id_progroup,id_cus,created_date,updated_date FROM wishlist ORDER BY id ASC";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new wishlist();
				$a->id=$row["id"];
				$a->id_progroup=$row["id_progroup"];
				$a->id_cus=$row["id_cus"];
				$a->created_date=$row["created_date"];
				$a->updated_date=$row["updated_date"];
				array_push($lst,$a);

			}
			return $lst;
			$this->conn.close();
		}
		public function getcusid($cusid)
		{
			$lst=array();
			$SQL="
			SELECT id,id_progroup,id_cus,created_date,updated_date FROM wishlist WHERE id_cus='$cusid' ORDER BY id ASC";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new wishlist();
				$a->id=$row["id"];
				$a->id_progroup=$row["id_progroup"];
				$a->id_cus=$row["id_cus"];
				$a->created_date=$row["created_date"];
				$a->updated_date=$row["updated_date"];
				array_push($lst,$a);

			}
			return $lst;
			$this->conn.close();
		}
		public function getdata()
		{
			$lst=array();
			$SQL="
			SELECT wl.*, customer.name as cusName, pg.id as groupid
			FROM wishlist wl
				INNER JOIN customer 
				ON wl.id_cus = customer.id
				INNER JOIN product_group pg
				ON oi.id_progroup = pg.id
				ORDER BY wl.id ASC";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new wishlist();
				$a->id=$row["id"];
				$a->id_cus=$row["cusName"];
				$a->id_progroup=$row["groupid"];
				$a->created_date=$row["created_date"];
				$a->updated_date=$row["updated_date"];
				array_push($lst,$a);

			}
			return $lst;
			$this->conn.close();
		}
		public function getByid($cusid){
			$lst=array();
			$whereCondition = $cusid > 0 ? " WHERE wl.id_cus = $cusid" : "";
			$SQL = "SELECT wl.*, customer.name as cusName, pg.id as groupid
			    FROM wishlist wl
				INNER JOIN customer 
				ON wl.id_cus = customer.id
				INNER JOIN product_group pg
				ON wl.id_progroup = pg.id
				$whereCondition
				ORDER BY wl.id ASC";
			$result = mysqli_query($this->conn,$SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new wishlist();
				$a->id=$row["id"];
				$a->id_cus=$row["cusName"];
				$a->id_progroup=$row["groupid"];
				$a->created_date=$row["created_date"];
				$a->updated_date=$row["updated_date"];
				array_push($lst,$a);

			}
			return $lst;
			$this->conn.close();
		}
		public function add($wl1)
		{
			$insert="INSERT INTO wishlist(id_progroup,id_cus,created_date)"
			."VALUES(?,?,?)";
			$stmt=$this->conn->prepare($insert);
			$stmt->bind_param("sss",$wl1->id_progroup,$wl1->id_cus,$wl1->created_date);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function get($id)
		{
			$lstedit=array();
			$SQL="SELECT id,id_progroup,id_cus from wishlist where id='$id'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new wishlist();
				$a->id=$row["id"];
				$a->id_cus=$row["cusName"];
				$a->id_progroup=$row["id_progroup"];
				array_push($lstedit,$a);

			}
			return $lstedit;
			$this->conn.close();
		}
		public function edit($id,$id_progroup,$id_cus,$updated_date){
			$update="UPDATE wishlist SET id_progroup=\"$id_progroup\",id_cus=\"$id_cus\",updated_date=\"$updated_date\" WHERE id='$id'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function delete($id)
		{
			$delete="DELETE FROM wishlist WHERE id='$id'";
			$stmt=$this->conn->prepare($delete);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
	}
?>