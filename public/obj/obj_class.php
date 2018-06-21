<?php
	include_once './database/db.php';
	class object{
		public $id,$obj_id,$name="";
		private $conn;
		function __construct(){
			$this->conn=data::getdatabase();
		}
		public function getByobjid() {
			$lst=array();
		$SQL = "
			SELECT o.id,o.name,GROUP_CONCAT(Distinct c.id,':',c.name) as object
			FROM obj o
				INNER JOIN category c 
				ON  o.id=c.obj_id
				GROUP BY o.id";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new object();
				$a->id=$row["id"];
				$a->name=$row["name"];
				$a->obj_id=$row['object'];
				array_push($lst,$a);
			}
			return $lst;
			$this->conn.close();
		}
	}
?>