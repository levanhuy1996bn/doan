<?php
	include_once './database/db.php';
	class cthdn{
	public $id_hdn,$id_progroup,$qty,$price,$total;
	private $conn;
		function __construct(){
			$this->conn=data::getdatabase();
		}
		public function getidhdn($id_hdn)
		{
			$lstedit=array();
			$SQL="SELECT id_hdn,id_progroup,qty,price,total from cthdn where id_hdn='$id_hdn'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new cthdn();
				$a->id_hdn=$row["id_hdn"];
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
			SELECT ct.*, hdn.id as hdnid, pg.id as groupid
			FROM cthdn ct
				INNER JOIN hdn 
				ON ct.id_hdn = hdn.id
				INNER JOIN product_group pg
				ON ct.id_progroup = pg.id
				ORDER BY pg.id ASC";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new cthdn();
				$a->id_hdn=$row["hdnid"];
				$a->id_progroup=$row["groupid"];
				$a->qty=$row["qty"];
				$a->price=$row["price"];
				$a->total=$row["total"];
				array_push($lst,$a);

			}
			return $lst;
			$this->conn.close();
		}
		public function getByid($idhdn,$idgroup) {
			$lst=array();
			if($idhdn>0 && $idgroup>0)
				$whereCondition="WHERE ct.id_hdn=$idhdn AND ct.id_progroup=$idgroup";
			if($idhdn>0 && $idgroup==0)
				$whereCondition ="WHERE ct.id_hdn = $idhdn";
			if($idgroup>0 && $idhdn==0)
				$whereCondition="WHERE ct.id_progroup = $idgroup";
			$SQL = "SELECT ct.*, hdn.id as hdnid, pg.id as groupid
					FROM cthdn ct
					INNER JOIN hdn hdn
					ON ct.id_hdn = hdn.id
					INNER JOIN product_group pg
					ON ct.id_progroup = pg.id
			        $whereCondition
			        ORDER BY ct.id_progroup DESC";
			$result = mysqli_query($this->conn,$SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new cthdn();
				$a->id_hdn=$row["hdnid"];
				$a->id_progroup=$row["groupid"];
				$a->qty=$row["qty"];
				$a->price=$row["price"];
				$a->total=$row["total"];
				array_push($lst,$a);

			}
			return $lst;
			$this->conn.close();
		}
		public function add($ct1)
		{
			$insert="INSERT INTO cthdn(id_hdn,id_progroup,qty,price,total)"
			."VALUES(?,?,?,?,?)";
			$stmt=$this->conn->prepare($insert);
			$stmt->bind_param("sssss",$ct1->id_hdn,$ct1->id_progroup,$ct1->qty,$ct1->price,$ct1->total);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function get($id_hdn,$id_progroup)
		{
			$lstedit=array();
			$SQL="SELECT id_hdn,id_progroup,qty,price,total from cthdn where id_hdn='$id_hdn' and id_progroup='$id_progroup'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new cthdn();
				$a->id_hdn=$row["id_hdn"];
				$a->id_progroup=$row["id_progroup"];
				$a->qty=$row["qty"];
				$a->price=$row["price"];
				$a->total=$row["total"];
				array_push($lstedit,$a);

			}
			return $lstedit;
			$this->conn.close();
		}
		public function edit($id_hdn,$id_progroup,$qty,$price,$total){
			$update="UPDATE cthdn SET id_hdn=\"$id_hdn\",id_progroup=\"$id_progroup\",qty=\"$qty\",price=\"$price\",total=\"$total\" WHERE id_hdn='$id_hdn' and id_progroup='$id_progroup'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function delete($id_hdn,$id_progroup)
		{
			$delete="DELETE FROM cthdn WHERE id_hdn='$id_hdn' and id_progroup='$id_progroup'";
			$stmt=$this->conn->prepare($delete);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function deleteidhdn($id_hdn)
		{
			$delete="DELETE FROM cthdn WHERE id_hdn='$id_hdn'";
			$stmt=$this->conn->prepare($delete);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
	}

?>