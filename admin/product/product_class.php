<?php
	include_once './database/db.php';
	class product{
		public $id,$id_cate,$id_brand,$name,$created_date,$updated_date;
		private $conn;
		function __construct(){
			$this->conn=data::getdatabase();
		}
		public function laydulieu()
		{
			$lst=array();
			$SQL="
			SELECT id,id_cate,id_brand,name
			FROM product
				ORDER BY id ASC";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new product();
				$a->id=$row["id"];
				$a->id_brand=$row["id_brand"];
				$a->id_cate=$row["id_cate"];
				$a->name=$row["name"];
				array_push($lst,$a);

			}
			return $lst;
			$this->conn.close();
		}
		public function getdata()
		{
			$lst=array();
			$SQL="
			SELECT n.*, c.name as cateName, d.name as brandName
			FROM product n
				INNER JOIN category c 
				ON n.id_cate = c.id
				INNER JOIN brand d
				ON n.id_brand = d.id
				ORDER BY n.id ASC";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new product();
				$a->id=$row["id"];
				$a->id_cate=$row["cateName"];
				$a->id_brand=$row["brandName"];
				$a->name=$row["name"];
				$a->created_date=$row["created_date"];
				$a->updated_date=$row["updated_date"];
				array_push($lst,$a);

			}
			return $lst;
			$this->conn.close();
		}
		public function getByid($catid,$id_brand){
			$lst=array();
			if($id_brand>0 && $catid>0)
				$whereCondition="WHERE n.id_brand=$id_brand AND n.id_cate=$catid";
			if($id_brand>0 && $catid==0)
				$whereCondition ="WHERE n.id_brand = $id_brand";
			if($catid>0 && $id_brand==0)
				$whereCondition="WHERE n.id_cate = $catid";
			$SQL = "SELECT n.*, c.name as cateName, d.name as brandName
			        FROM product n
			        INNER JOIN category c 
			        ON n.id_cate = c.id
			        INNER JOIN brand d
			        ON n.id_brand =d.id
			        $whereCondition
			        ORDER BY n.id DESC";
			$result = mysqli_query($this->conn,$SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new product();
				$a->id=$row["id"];
				$a->id_cate=$row["cateName"];
				$a->id_brand=$row["brandName"];
				$a->name=$row["name"];
				$a->created_date=$row["created_date"];
				$a->updated_date=$row["updated_date"];
				array_push($lst,$a);

			}
			return $lst;
			$this->conn.close();
		}
		public function add($product)
		{
			$insert="INSERT INTO product(id,id_cate,id_brand,name,created_date)"
			."VALUES(?,?,?,?,?)";
			$stmt=$this->conn->prepare($insert);
			$stmt->bind_param("sssss",$product->id,$product->id_cate,$product->id_brand,$product->name,$product->created_date);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function get($id)
		{
			$lstedit=array();
			$SQL="SELECT id,id_cate,id_brand,name from product where id='$id'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$pro=new product();
				$pro->id=$row["id"];
				$pro->id_cate=$row["id_cate"];
				$pro->id_brand=$row["id_brand"];
				$pro->name=$row["name"];
				array_push($lstedit,$pro);

			}
			return $lstedit;
			$this->conn.close();
		}
		public function edit($id,$id_cate,$id_brand,$name,$updated_date){
			$update="UPDATE product SET id_cate=\"$id_cate\",id_brand=\"$id_brand\",name=\"$name\",updated_date=\"$updated_date\" WHERE id='$id'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function delete($id)
		{
			$delete="DELETE FROM product WHERE id='$id'";
			$stmt=$this->conn->prepare($delete);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function search($key,$from,$number){
			$lst=array();
		$SQL ="
		SELECT n.*, c.name as cateName, d.name as brandName
			FROM product n
				INNER JOIN category c
				ON n.id_cate = c.id
				INNER JOIN brand d
				ON n.id_brand = d.id WHERE n.name like '%$key%'";
		$result = mysqli_query($this->conn,$SQL);
	    	$total = mysqli_num_rows($result);
	    	$sotrang = ceil($total/$number);
	    	$SQL2 ="SELECT n.*, c.name as cateName, d.name as brandName
			FROM product n
				INNER JOIN category c 
				ON n.id_cate = c.id
				INNER JOIN brand d
				ON n.id_brand = d.id WHERE n.name like '%$key%'
	    	LIMIT $from,$number";
	    	$result2 = mysqli_query($this->conn,$SQL2);
			while($row=mysqli_fetch_array($result2))
			{
				$a=new product();
				$a->id=$row["id"];
				$a->id_cate=$row["cateName"];
				$a->id_brand=$row["brandName"];
				$a->name=$row["name"];
				$a->sotrang = $sotrang;
				$a->created_date=$row["created_date"];
				$a->updated_date=$row["updated_date"];
				array_push($lst,$a);
			}
			return $lst;
			$this->conn.close();
		}
	}
?>