<?php
include("../connection.php");

if($con){
	
	if(isset($_POST)  and isset($_POST['new'])){
		$query="insert into `return`(product_id,qty) values(".$_POST['id'].",".$_POST['quantity'].");"; 
		$query.="update product set qty=qty+".$_POST['quantity']." where product_id=".$_POST['id'].";";
		$res=mysqli_multi_query($con,$query);
		if($res){
			echo"Stock Returned";
		}
		else{
			echo mysqli_error($con);
		}
	}
}
?>