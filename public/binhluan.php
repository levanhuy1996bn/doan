<?php
    session_start();
    $id=$_GET["id"];
    include_once '../admin/customer/customer_class.php';
    include_once '../admin/product_group/product_group_class.php';
    include_once 'comment/comment_class.php';
    $n=new customer();
    $pg=new product_group();
    echo $id;
    $spid=$pg->get($id);
    $edit=new product_group();
    if(isset($_REQUEST["btnbinhluan"])){
    if(isset($_SESSION['user'])&& $_SESSION['user']!="")
    {
        if($_POST["txtbinhluan"]!=null)
        {  
            $x=new comment();
            $x->progroup_id=$id;
            $x->content=$_POST["txtbinhluan"];
            $nt=$n->getemail($_SESSION['user']);
            foreach ($nt as $key)
            $x->cus_id=$key->id;
            $x->created_date=date("Y-m-d");
            $add=new comment();
            $add->add($x);
           if(isset($_POST["quality"])&&$_POST["quality"]==1){
                foreach ($spid as $v) {
                    $a=$v->vote+1;
                }
                $edit->editvote($id,$a,$x->created_date);
                echo $id;
            }
            header("location:detail.php?id=$id");
       }
        else
            header("location:detail.php?id=$id");
    }
        else
            header("location:index.php?p=new/login.php"); 
    }
?>