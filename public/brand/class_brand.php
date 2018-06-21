<?php
	include_once './database/db.php';
	class idbrand{
		public $id,$id_pro,$id_color,$id_size,$image,$qty,$discount,$price,$vote,$detail,$created_date,$updated_date,$sotrang="";
		private $conn;
		function __construct(){
			$this->conn=data::getdatabase();
		}
		public function getbybrand($id_brand,$from,$number)
		{
			$lstedit=array();
			$SQL="SELECT prg.*, pr.name as proName 
				from product_group as prg
				INNER JOIN product pr ON pr.id=prg.id_pro
				INNER JOIN brand br ON br.id=pr.id_brand
				WHERE br.id='$id_brand'";
			$result = mysqli_query($this->conn,$SQL);
			$total = mysqli_num_rows($result);
	    	$sotrang = ceil($total/$number);
	    	$SQL2="SELECT prg.*, pr.name as proName from product_group as prg
				INNER JOIN product pr ON pr.id=prg.id_pro
				INNER JOIN brand br ON br.id=pr.id_brand
				WHERE br.id='$id_brand'
	    		LIMIT $from,$number";
	    	$result2 = mysqli_query($this->conn, $SQL2);
			while($row=mysqli_fetch_array($result2))
			{
				$a=new idbrand();
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
