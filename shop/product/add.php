<?php
if(!empty($_POST)){
	include("../connection.php");
	$name=$_POST['add_item_name'];
	$type=$_POST['add_item_type'];
	$description=$_POST['add_item_description'];
	$price=$_POST['add_item_price'];
	$quantity=$_POST['add_item_reorder_quantity'];
	if($con){
		$query="insert into product(product_name,type,description,threshold_qty,selling_price)values('$name','$type','$description',$quantity,$price);";
		$res=mysqli_query($con,$query);
		if($res){
			echo"success";
		}
		else{
			echo mysqli_error($con);
		}
	}
	else{
		echo mysqli_error();
	}
}
else{
	echo mysqli_error();
}
?>