<?php
	include_once './database/db.php';
	class cate{
		public $id,$id_pro,$id_color,$id_size,$image,$qty,$discount,$price,$vote,$detail,$created_date,$updated_date,$sotrang="";
		private $conn;
		function __construct(){
			$this->conn=data::getdatabase();
		}
		public function getbyidobj($id_obj,$from,$number)
		{
			$lstedit=array();
			$SQL="SELECT prg.*, pr.name as proName 
				from product_group as prg
				INNER JOIN product pr ON pr.id=prg.id_pro
				INNER JOIN category ct ON ct.id=pr.id_cate
				INNER JOIN obj o ON o.id=ct.obj_id
				WHERE o.id='$id_obj'";
			$result = mysqli_query($this->conn,$SQL);
			$total = mysqli_num_rows($result);
	    	$sotrang = ceil($total/$number);
	    	$SQL2="SELECT prg.*, pr.name as proName from product_group as prg
				INNER JOIN product pr ON pr.id=prg.id_pro
				INNER JOIN category ct ON ct.id=pr.id_cate
				INNER JOIN obj o ON o.id=ct.obj_id
				WHERE o.id='$id_obj'
	    		LIMIT $from,$number";
	    	$result2 = mysqli_query($this->conn, $SQL2);
			while($row=mysqli_fetch_array($result2))
			{
				$a=new cate();
				$a->id=$row["id"];
				$a->id_pro=$row["proName"];
				$a->id_color=$row["id_color"];
				$a->id_size=$row["id_size"];
				$a->image=$row["image"];
				$a->qty=$row["qty"];
				$a->discount=$row['discount'];
				$a->price=$row["price"];
				$a->vote=$row["vote"];
				$a->detail=$row["detail"];
				$a->created_date=$row["created_date"];
				$a->updated_date=$row["updated_date"];
				$a->sotrang=$sotrang;
				array_push($lstedit,$a);
			}
			return $lstedit;
			$this->conn.close();
		}
		public function getprice($price1,$price2,$from,$number)
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
				WHERE n.price>=$price1 AND n.price<=$price2
				ORDER BY n.id ASC";
			$result = mysqli_query($this->conn, $SQL);
			$total = mysqli_num_rows($result);
	    	$sotrang = ceil($total/$number);
	    	$SQL2="
			SELECT n.*, p.name as proName, c.name as colorName, s.name as sizeName
			FROM product_group n
				INNER JOIN product p
				ON n.id_pro=p.id
				INNER JOIN color c 
				ON n.id_color = c.id
				INNER JOIN size s
				ON n.id_size = s.id
				WHERE n.price>=$price1 AND n.price<=$price2
				LIMIT $from,$number";
				$result2 = mysqli_query($this->conn, $SQL2);
			while($row=mysqli_fetch_array($result2))
			{
				$a=new cate();
				$a->id=$row["id"];
				$a->id_pro=$row["proName"];
				$a->id_color=$row["colorName"];
				$a->id_size=$row["sizeName"];
				$a->image=$row["image"];
				$a->qty=$row["qty"];
				$a->discount=$row['discount'];
				$a->sotrang=$sotrang;
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
	}
?>