<?php
include("../connection.php");
if($con and !empty($_POST) and isset($_POST['customer_id']) ){
	$query="select * from customer where customer_id='".$_POST['customer_id']."'";
	$res=mysqli_query($con,$query);
	if(mysqli_num_rows($res)==1){
		while($row=mysqli_fetch_array($res)){
			echo json_encode($row);
			
		}
	}
		
}
if($con and !empty($_POST) and isset($_POST['customer_phone']) ){
	$query="select * from customer where phone='".$_POST['customer_phone']."'";
	$res=mysqli_query($con,$query);
	if(mysqli_num_rows($res)==1){
		while($row=mysqli_fetch_array($res)){
			echo json_encode($row);
			
		}
	}
}
?>