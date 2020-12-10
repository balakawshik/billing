<?php
if(!empty($_POST)){
	$name=$_POST['add_supplier_name'];
	$address=$_POST['add_supplier_address'];
	$phone=$_POST['add_supplier_phone'];
	include("../connection.php");
	if($con){
		if($name!="" and $address!="" and $phone!=""){
			$query="insert into supplier(name,address,phone)values('$name','$address','$phone');";
			$res=mysqli_query($con,$query);
			if($res){
				echo "success";
			}
			else{
				echo "insert fail";
			}
		}
		else{
			echo "empty values";
		}
	}
	else{
		echo"connection fail";
	}
	
}
?>
