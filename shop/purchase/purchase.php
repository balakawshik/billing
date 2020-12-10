<?php
if(!empty($_POST)){
	include("../connection.php");
	$product_id=$_POST['product_id'];
	$supplier_id=$_POST['supplier_id'];
	$quantity=$_POST['quantity'];
	$price=$_POST['price'];
	$query="insert into purchase(supplier_id,product_id,purchase_qty,purchase_price) values($supplier_id,$product_id,$quantity,$price);";
	$query.="update product set qty=qty+$quantity where product_id=$product_id;";
	if(mysqli_multi_query($con,$query)){
		echo "success";
	}
	else{
		echo mysqli_error($con);
	}
	
}
else{
	echo"hi";
}

?>