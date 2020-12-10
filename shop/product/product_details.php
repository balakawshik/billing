<?php
include("../connection.php");
if($con){
	if(isset($_POST['product_id'])){
		$query="select * from product where product_id=".$_POST['product_id'];
		$res=mysqli_query($con,$query);
		if($res){
			$row=mysqli_fetch_array($res);
			echo json_encode($row);
		}
	}
}
?>