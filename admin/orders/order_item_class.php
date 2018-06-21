<?php
	include_once './database/db.php';
	class order_item{
		public $id_order,$id_progroup,$qty,$price,$total;
		private $conn;
		function __construct(){
			$this->conn=data::getdatabase();
		}
		public function getidorders($id_order)
		{
			$lstedit=array();
			$SQL="SELECT id_order,id_progroup,qty,price,total from order_item where id_order='$id_order'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new order_item();
				$a->id_order=$row["id_order"];
				$a->id_progroup=$row["id_progroup"];
				$a->qty=$row["qty"];
				$a->price=$row["price"];
				$a->total=$row["total"];
				array_push($lstedit,$a);

			}
			return $lstedit;
			$this->conn.close();
		}
		public function getdata()
		{
			$lst=array();
			$SQL="
			SELECT oi.*, orders.id as ordersid, pg.id as groupid
			FROM order_item oi
				INNER JOIN orders 
				ON oi.id_order = orders.id
				INNER JOIN product_group pg
				ON oi.id_progroup = pg.id
				ORDER BY pg.id ASC";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new order_item();
				$a->id_order=$row["ordersid"];
				$a->id_progroup=$row["groupid"];
				$a->qty=$row["qty"];
				$a->price=$row["price"];
				$a->total=$row["total"];
				array_push($lst,$a);

			}
			return $lst;
			$this->conn.close();
		}
		public function getByid($idorder,$idgroup) {
			$lst=array();
			if($idorder>0 && $idgroup>0)
				$whereCondition="WHERE oi.id_order=$idorder AND oi.id_progroup=$idgroup";
			if($idhdn>0 && $idgroup==0)
				$whereCondition ="WHERE oi.id_order = $idorder";
			if($idgroup>0 && $idhdn==0)
				$whereCondition="WHERE oi.id_progroup = $idgroup";
			$SQL = "SELECT oi.*, orders.id as ordersid, pg.id as groupid
					FROM order_item oi
					INNER JOIN orders
					ON oi.id_order = orders.id
					INNER JOIN product_group pg
					ON oi.id_progroup = pg.id
			        $whereCondition
			        ORDER BY oi.id_progroup DESC";
			$result = mysqli_query($this->conn,$SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new order_item();
				$a->id_order=$row["ordersid"];
				$a->id_progroup=$row["groupid"];
				$a->qty=$row["qty"];
				$a->price=$row["price"];
				$a->total=$row["total"];
				array_push($lst,$a);

			}
			return $lst;
			$this->conn.close();
		}
		public function add($oi1)
		{
			$insert="INSERT INTO order_item(id_order,id_progroup,qty,price,total)"
			."VALUES(?,?,?,?,?)";
			$stmt=$this->conn->prepare($insert);
			$stmt->bind_param("sssss",$oi1->id_order,$oi1->id_progroup,$oi1->qty,$oi1->price,$oi1->total);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function get($id_order,$id_progroup)
		{
			$lstedit=array();
			$SQL="SELECT id_order,id_progroup,qty,price,total from order_item where id_order='$id_order' and id_progroup='$id_progroup'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new order_item();
				$a->id_order=$row["id_order"];
				$a->id_progroup=$row["id_progroup"];
				$a->qty=$row["qty"];
				$a->price=$row["price"];
				$a->total=$row["total"];
				array_push($lstedit,$a);

			}
			return $lstedit;
			$this->conn.close();
		}
		public function edit($id_order,$id_progroup,$qty,$price,$total){
			$update="UPDATE order_item SET id_order=\"$id_order\",id_progroup=\"$id_progroup\",qty=\"$qty\",price=\"$price\",total=\"$total\" WHERE id_order='$id_order' and id_progroup='$id_progroup'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function delete($id_order,$id_progroup)
		{
			$delete="DELETE FROM order_item WHERE id_order='$id_order' and id_progroup='$id_progroup'";
			$stmt=$this->conn->prepare($delete);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function deleteidorders($id_order)
		{
			$delete="DELETE FROM order_item WHERE id_order='$id_order'";
			$stmt=$this->conn->prepare($delete);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
	}
?>