<?php

include("../connection.php");
if($con){
	if(isset($_POST)  and isset($_POST['new'])){
		$query="insert into customer(name,address,phone,type,GST) values('".$_POST['name']."','".$_POST['address']."','".$_POST['phone']."','".$_POST['type']."','".$_POST['gst']."')";
		$res=mysqli_query($con,$query);
		if($res){
			echo"Inserted";
		}
		else{
			echo mysqli_error($con);
		}
	}
	elseif(isset($_POST)  and isset($_POST['edit'])){
		$query="update customer set name='".$_POST['name']."',address='".$_POST['address']."',phone='".$_POST['phone']."',type='".$_POST['type']."',GST='".$_POST['gst']."' where customer_id=".$_POST['id'];
		$res=mysqli_query($con,$query);
		if($res){
			echo"Updated";
		}
		else{
			echo mysqli_error($con);
		}
	}
	elseif(isset($_POST)  and isset($_POST['delete'])){
		$query="DELETE from customer  where customer_id=".$_POST['id'];
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