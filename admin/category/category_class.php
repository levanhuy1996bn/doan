<?php
	include_once './database/db.php';
	class category{
		public $id,$name,$obj_id,$created_date,$updated_date;
		private $conn;
			function __construct(){
			$this->conn=data::getdatabase();
		}
		public function getdata(){
			$lstS=array();
			$SQL="SELECT id,obj_id,name,created_date,updated_date FROM category";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$s= new category();
				$s->id=$row["id"];
				$s->obj_id=$row["obj_id"];
				$s->name=$row["name"];
				//$s->obj_id=$row["obj_id"];
				$s->created_date=$row["created_date"];
				$s->updated_date=$row["updated_date"];
				array_push($lstS,$s);

			}
			return $lstS;
			$this->conn.close();
		}
		public function getdatabase($objid){
			$lstS=array();
			$whereCondition = $objid > 0 ? " WHERE c.obj_id = $objid" : "";
			$SQL="SELECT c.*,o.name as objName
			FROM category c
			INNER JOIN obj o
			ON c.obj_id = o.id
			$whereCondition
			ORDER BY c.id ASC";
			$result = mysqli_query($this->conn,$SQL);
			while($row=mysqli_fetch_array($result))
			{
				$s= new category();
				$s->id=$row["id"];
				$s->obj_id=$row["objName"];
				$s->name=$row["name"];
				$s->created_date=$row["created_date"];
				$s->updated_date=$row["updated_date"];
				array_push($lstS,$s);

			}
			return $lstS;
			$this->conn.close();
		}
		public function add($category1)
		{
			$insert="INSERT INTO category(id,obj_id,name,created_date)"
			."VALUES(?,?,?,?)";
			$stmt=$this->conn->prepare($insert);
			$stmt->bind_param("ssss",$category1->id,$category1->obj_id,$category1->name,$category1->created_date);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function get($id)
		{
			$lstedit=array();
			$SQL="SELECT id,obj_id,name from category 
			where id='$id'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$s=new category();
				$s->id=$row["id"];
				$s->obj_id=$row["obj_id"];
				$s->name=$row["name"];
				array_push($lstedit,$s);
			}
			return $lstedit;
			$this->conn.close();
		}
		public function edit($id,$obj_id,$name,$updated_date){
			$update="UPDATE category SET obj_id=\"$obj_id\",name=\"$name\",updated_date=\"$updated_date\" WHERE id='$id'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function delete($id)
		{
			$delete="DELETE FROM category WHERE id='$id'";
			$stmt=$this->conn->prepare($delete);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
	}
?>