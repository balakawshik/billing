<?php
include("../connection.php");
if($con){
	if(isset($_POST)  and isset($_POST['edit'])){
		$query="update product set 
		product_name='".$_POST['name']."',
		threshold_qty=".$_POST['reorder_quantity'].",
		selling_price=".$_POST['price'].",
		type='".$_POST['type']."',
		description='".$_POST['description']."' 
		where product_id=".$_POST['id'];
		$res=mysqli_query($con,$query);
		if($res){
			echo"Updated";
		}
		else{
			echo mysqli_error($con);
		}
	}
	elseif(isset($_POST)  and isset($_POST['delete'])){
		$query="DELETE from product  where product_id=".$_POST['id'];
		$res=mysqli_query($con,$query);
		if($res){
			echo"Deleted";
		}
		else{
			echo mysqli_error($con);
		}
	}
}
?>

	


