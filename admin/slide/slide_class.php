<?php
	include_once './database/db.php';
	class slide{
		public $id,$name,$image,$link,$created_date,$updated_date;
		private $conn;
			function __construct(){
			$this->conn=data::getdatabase();
		}
		public function getdata(){
			$lstslide=array();
			$SQL="SELECT id,name,image,link,created_date,updated_date FROM slide";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$objslide= new slide();
				$objslide->id=$row["id"];
				$objslide->name=$row["name"];
				$objslide->image=$row["image"];
				$objslide->link=$row["link"];
				$objslide->created_date=$row["created_date"];
				$objslide->updated_date=$row["updated_date"];
				array_push($lstslide,$objslide);

			}
			return $lstslide;
			$this->conn.close();
		}
		public function add($slide1)
		{
			$insert="INSERT INTO slide(id,name,image,link,created_date)"
			."VALUES(?,?,?,?,?)";
			$stmt=$this->conn->prepare($insert);
			$stmt->bind_param("sssss",$slide1->id,$slide1->name,$slide1->image,$slide1->link,$slide1->created_date);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function get($id)
		{
			$lstedit=array();
			$SQL="SELECT id,name,image,link from slide 
			where id='$id'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$objslide1=new slide();
				$objslide1->id=$row["id"];
				$objslide1->name=$row["name"];
				$objslide1->image=$row["image"];
				$objslide1->link=$row["link"];
				array_push($lstedit,$objslide1);
			}
			return $lstedit;
			$this->conn.close();
		}
		public function edit($id,$name,$image,$link,$updated_date){
			$update="UPDATE slide SET name=\"$name\",image=\"$image\",link=\"$link\",updated_date=\"$updated_date\" WHERE id='$id'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function delete($id)
		{
			$delete="DELETE FROM slide WHERE id='$id'";
			$stmt=$this->conn->prepare($delete);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
	}
?>