<?php
	include_once './database/db.php';
	class product_public{
		public $id,$id_pro,$id_color,$id_size,$image,$qty,$discount,$price,$vote,$detail,$created_date,$updated_date,$sotrang="";
		private $conn;
		function __construct(){
			$this->conn=data::getdatabase();
		}
		public function gethotdeal()
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
				WHERE n.discount>='25' AND n.discount<='30'
				ORDER BY n.id ASC";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new product_public();
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
		public function getspecialoffer()
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
				WHERE n.discount>'15' AND n.discount<='22'
				ORDER BY n.id ASC";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new product_public();
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
		public function getspecialdeal()
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
				WHERE n.discount>='35'
				ORDER BY n.id ASC";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new product_public();
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
		public function getnew()
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
				WHERE n.qty>='40'
				ORDER BY n.id ASC";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new product_public();
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
		public function getfeatured()
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
				WHERE n.vote<='1'
				ORDER BY n.id ASC";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new product_public();
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
		public function getbestseller()
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
				WHERE n.vote>'35'
				ORDER BY n.id ASC";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new product_public();
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
		public function getarrival()
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
				WHERE n.vote>'25' AND n.vote<='35'
				ORDER BY n.id ASC";
			$result = mysqli_query($this->conn, $SQL);
			while($row=mysqli_fetch_array($result))
			{
				$a=new product_public();
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
		public function getbycate($id_cate,$from,$number)
		{
			$lstedit=array();
			$SQL="SELECT prg.*, pr.name as proName 
				from product_group as prg
				INNER JOIN product pr ON pr.id=prg.id_pro
				INNER JOIN category ct ON ct.id=pr.id_cate
				WHERE ct.id='$id_cate'";
			$result = mysqli_query($this->conn,$SQL);
			$total = mysqli_num_rows($result);
	    	$sotrang = ceil($total/$number);
	    	$SQL2="SELECT prg.*, pr.name as proName from product_group as prg
				INNER JOIN product pr ON pr.id=prg.id_pro
				INNER JOIN category ct ON ct.id=pr.id_cate
				WHERE ct.id='$id_cate'
	    		LIMIT $from,$number";
	    	$result2 = mysqli_query($this->conn, $SQL2);
			while($row=mysqli_fetch_array($result2))
			{
				$a=new product_public();
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
	}
?>