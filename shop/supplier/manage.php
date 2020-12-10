<?php

include("../connection.php");
if($con){
	if(isset($_POST)  and isset($_POST['edit'])){
		$query="update supplier set 
		name='".$_POST['name']."',
		address='".$_POST['address']."',
		phone='".$_POST['phone']."'
		where supplier_id=".$_POST['id'];
		
		$res=mysqli_query($con,$query);
		if($res){
			echo"Updated";
		}
		else{
			echo mysqli_error($con);
		}
	}
	elseif(isset($_POST)  and isset($_POST['delete'])){
		$query="DELETE from supplier  where supplier_id=".$_POST['id'];
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