<?php
	include_once './database/db.php';
	class product_group{
		public $id,$id_pro,$id_color,$id_size,$image,$qty,$discount,$price,$vote,$detail,$created_date,$updated_date,$sotrang="";
		private $conn;
		function __construct(){
			$this->conn=data::getdatabase();
		}
		public function laydulieu()
		{
			$lst=array();
			$SQL="
			SELECT id,id_pro,image
			FROM product_group
				ORDER BY id ASC";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new product_group();
				$a->id=$row["id"];
				$a->id_pro=$row["id_pro"];
				$a->image=$row["image"];
				array_push($lst,$a);

			}
			return $lst;
			$this->conn.close();
		}
		public function getdata()
		{
			$lst=array();
			$SQL="
			SELECT n.*, p.name as proName, c.name as colorName, s.name as sizeName
			FROM product_group n
				INNER JOIN product p
				ON n.id_pro=p.id
				INNER JOIN color c 
				ON n.id_color = c.id
				INNER JOIN size s
				ON n.id_size = s.id
				ORDER BY n.id ASC";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new product_group();
				$a->id=$row["id"];
				$a->id_pro=$row["proName"];
				$a->id_color=$row["colorName"];
				$a->id_size=$row["sizeName"];
				$a->image=$row["image"];
				$a->qty=$row["qty"];
				$a->discount=$row['discount'];
				$a->price=$row["price"];
				$a->vote=$row["vote"];
				$a->detail=$row["detail"];
				$a->created_date=$row["created_date"];
				$a->updated_date=$row["updated_date"];
				array_push($lst,$a);

			}
			return $lst;
			$this->conn.close();
		}
		public function getByid($id_color,$id_size) {
			$lst=array();
			if($id_color>0 && $id_size>0)
				$whereCondition="WHERE n.id_color=$id_color AND n.id_size=$id_size";
			if($id_color>0 && $id_size==0)
				$whereCondition ="WHERE n.id_color=$id_color";
			if($id_color==0 && $id_size>0)
				$whereCondition ="WHERE n.id_size=$id_size";
			$SQL = "SELECT n.*, p.name as proName, c.name as colorName, s.name as sizeName
					FROM product_group n
					INNER JOIN product p
					ON n.id_pro=p.id
					INNER JOIN color c 
					ON n.id_color = c.id
					INNER JOIN size s
					ON n.id_size = s.id
			        $whereCondition
			        ORDER BY n.id ASC";
			$result = mysqli_query($this->conn,$SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new product_group();
				$a->id=$row["id"];
				$a->id_pro=$row["proName"];
				$a->id_color=$row["colorName"];
				$a->id_size=$row["sizeName"];
				$a->image=$row["image"];
				$a->qty=$row["qty"];
				$a->discount=$row['discount'];
				$a->price=$row["price"];
				$a->vote=$row["vote"];
				$a->detail=$row["detail"];
				$a->created_date=$row["created_date"];
				$a->updated_date=$row["updated_date"];
				array_push($lst,$a);

			}
			return $lst;
			$this->conn.close();
		}
		public function add($product_group)
		{
			$insert="INSERT INTO product_group(id,id_pro,id_color,id_size,image,qty,discount,price,vote,detail,created_date)"
			."VALUES(?,?,?,?,?,?,?,?,?,?,?)";
			$stmt=$this->conn->prepare($insert);
			$stmt->bind_param("sssssssssss",$product_group->id,$product_group->id_pro,$product_group->id_color,$product_group->id_size,$product_group->image,$product_group->qty,$product_group->discount,$product_group->price,$product_group->vote,$product_group->detail,$product_group->created_date);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function get($id)
		{
			$lstedit=array();
			$SQL="SELECT id,id_pro,id_color,id_size,image,qty,discount,price,vote,detail from product_group where id='$id'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new product_group();
				$a->id=$row["id"];
				$a->id_pro=$row["id_pro"];
				$a->id_color=$row["id_color"];
				$a->id_size=$row["id_size"];
				$a->image=$row["image"];
				$a->qty=$row["qty"];
				$a->discount=$row['discount'];
				$a->price=$row["price"];
				$a->vote=$row["vote"];
				$a->detail=$row["detail"];
				array_push($lstedit,$a);

			}
			return $lstedit;
			$this->conn.close();
		}
		public function getidpro($id_pro)
		{
			$lstedit=array();
			$SQL="SELECT id,id_pro,id_color,id_size,image,qty,discount,price,vote,detail from product_group where id_pro='$id_pro'";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new product_group();
				$a->id=$row["id"];
				$a->id_pro=$row["id_pro"];
				$a->id_color=$row["id_color"];
				$a->id_size=$row["id_size"];
				$a->image=$row["image"];
				$a->qty=$row["qty"];
				$a->discount=$row['discount'];
				$a->price=$row["price"];
				$a->vote=$row["vote"];
				$a->detail=$row["detail"];
				array_push($lstedit,$a);

			}
			return $lstedit;
			$this->conn.close();
		}
		public function edit($id,$id_pro,$id_color,$id_size,$image,$qty,$discount,$price,$vote,$detail,$updated_date){
			$update="UPDATE product_group SET id_pro=\"$id_pro\",id_color=\"$id_color\",image=\"$image\",qty=\"$qty\",discount=\"$discount\",price=\"$price\",vote=\"$vote\",detail=\"$detail\",updated_date=\"$updated_date\" WHERE id='$id'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function editqty($id,$qty,$updated_date){
			$update="UPDATE product_group SET qty=\"$qty\",updated_date=\"$updated_date\" WHERE id='$id'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function editvote($id,$vote,$updated_date){
			$update="UPDATE product_group SET vote=\"$vote\",updated_date=\"$updated_date\" WHERE id='$id'";
			$stmt=$this->conn->prepare($update);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function delete($id)
		{
			$delete="DELETE FROM product_group WHERE id='$id'";
			$stmt=$this->conn->prepare($delete);
			$ketqua=$stmt->execute();
			$stmt->close();
		}
		public function search($key,$from,$number){
			$lst=array();
		$SQL ="SELECT n.*, p.name as proName, c.name as colorName, s.name as sizeName
					FROM product_group n
					INNER JOIN product p
					ON n.id_pro=p.id
					INNER JOIN color c 
					ON n.id_color = c.id
					INNER JOIN size s
					ON n.id_size = s.id
		 			WHERE p.name like '%$key%' ORDER BY n.id ASC";
			$result = mysqli_query($this->conn,$SQL);
	    	$total = mysqli_num_rows($result);
	    	$sotrang = ceil($total/$number);
	    	$SQL2 ="SELECT n.*, p.name as proName, c.name as colorName, s.name as sizeName
					FROM product_group n
					INNER JOIN product p
					ON n.id_pro=p.id
					INNER JOIN color c 
					ON n.id_color = c.id
					INNER JOIN size s
					ON n.id_size = s.id WHERE p.name like '%$key%' ORDER BY n.id ASC
	    	LIMIT $from,$number";
	    	$result2 = mysqli_query($this->conn,$SQL2);
			while($row=mysqli_fetch_array($result2))
			{
				$a=new product_group();
				$a->id=$row["id"];
				$a->id_pro=$row["proName"];
				$a->id_color=$row["colorName"];
				$a->id_size=$row["sizeName"];
				$a->image=$row["image"];
				$a->qty=$row["qty"];
				$a->discount=$row['discount'];
				$a->price=$row["price"];
				$a->vote=$row["vote"];
				$a->detail=$row["detail"];
				$a->sotrang=$sotrang;
				$a->created_date=$row["created_date"];
				$a->updated_date=$row["updated_date"];
				array_push($lst,$a);
			}
			return $lst;
			$this->conn.close();
		}
	}
?>