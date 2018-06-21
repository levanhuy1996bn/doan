<?php
	include_once "./database/db.php";
	class comment{
		public $id,$cus_id,$progroup_id,$created_date,$content="";
		private $conn;
		function __construct(){
			$this->conn=data::getdatabase();
		}
		public function getdata($idprogroup)
		{
			$lst=array();
			$SQL="
			SELECT n.*, pg.id as idpro, c.name as nameCus
			FROM comment n
				INNER JOIN product_group pg 
				ON n.progroup_id = pg.id
				INNER JOIN customer c
				ON n.cus_id = c.id
				WHERE n.progroup_id='$idprogroup'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new comment();
				$a->id=$row["id"];
				$a->progroup_id=$row["idpro"];
				$a->cus_id=$row["nameCus"];
				$a->content=$row["content"];
				$a->created_date=$row["created_date"];
				array_push($lst,$a);

			}
			return $lst;
			$this->conn.close();
		}
		public function add($comment)
		{
			$insert="INSERT INTO comment(progroup_id,cus_id,content,created_date)"
			."VALUES(?,?,?,?)";
			$stmt=$this->conn->prepare($insert);
			$stmt->bind_param("ssss",$comment->progroup_id,$comment->cus_id,$comment->content,$comment->created_date);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
	}
?>