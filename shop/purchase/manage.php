<?php

include("../connection.php");
if($con){

	if(isset($_POST)  and isset($_POST['delete'])){
		$query="DELETE from purchase  where purchase_id=".$_POST['id'];
		$query.=";UPDATE product set qty=qty-".$_POST['qty']." where product_id=".$_POST['product_id'];
		$res=mysqli_multi_query($con,$query);
		if($res){
			echo"Deleted";
		}
		elseif(mysqli_error($con)){
			echo mysqli_error($con);
		}
	}
}
?>