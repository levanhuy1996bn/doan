<?php
	 include_once "hdn_class.php";
    include_once './product_group/product_group_class.php';
    include_once './cthdn/cthdn_class.php';
    $br=new hdn();
    $ds1=$br->getdata();
    $type=new product_group();
    $ds2=$type->getdata();
    if(isset($_REQUEST["btnadd"])){
    	$a=new hdn();
        foreach ($ds1 as $key ) {
            $a->id=$key->id+1;
        }
        $a->status=$_POST["txtstatus"];
        $a->created_date=date("Y-m-d");
        $a->total=(float)($_POST["txtqty"])*(float)($_POST["txtprice"]);
        $add=new hdn();
        $add->add($a);
        //sp
        $product1=new product_group();
        if ($_FILES['txtimage']['error'] > 0)
        {
            echo 'File Upload Error';
        }
        else
        {
             move_uploaded_file($_FILES['txtimage']['tmp_name'], '../public/Upload/'.$_FILES['txtimage']['name']);
        }
        foreach ($ds2 as $key) {
            $product1->id=$key->id+1;
        }
        $product1->id_pro=$_POST["txtidpro"];
        $product1->id_color=$_POST["txtidcolor"];
        $product1->id_size=$_POST["txtidsize"];
        $product1->image=$_FILES['txtimage']['name'];
        $product1->qty=$_POST["txtqty"];
        $product1->discount=$_POST["txtdiscount"];       
        $product1->price=$_POST["txtprice"];
        $product1->vote=$_POST["txtvote"];
        $product1->detail=$_POST["txtdetail"];
        $product1->created_date=date("Y-m-d");
        $add2=new product_group();
        $add2->add($product1);
        //chi tiet
         $ct1=new cthdn();
        foreach ($ds2 as $key1){
            $ct1->id_progroup=$key1->id+1;
        }
        $ct1->id_hdn=$a->id;
        $ct1->qty=$_POST["txtqty"];
        $ct1->price=$_POST["txtprice"];
        $ct1->total=$a->total;
        $add1=new cthdn();
        $add1->add($ct1);
        header("location:index.php?p=hoadonnhap/hdn.php");
    }
?>