<?php
include("../connection.php");
if($con and !empty($_POST) and isset($_POST['supplier_id']) ){
	$query="select * from supplier where supplier_id='".$_POST['supplier_id']."' limit 1";
	$res=mysqli_query($con,$query);
	if(mysqli_num_rows($res)==1){
		while($row=mysqli_fetch_array($res)){
			echo json_encode($row);
			
		}
	}
		
}
if($con and !empty($_POST) and isset($_POST['supplier_name']) ){
	$query="select * from supplier where name='".$_POST['supplier_name']."' limit 1";
	$res=mysqli_query($con,$query);
	if(mysqli_num_rows($res)==1){
		while($row=mysqli_fetch_array($res)){
			echo json_encode($row);
			
		}
	}
		
}
if($con and !empty($_POST) and isset($_POST['supplier_phone']) ){
	$query="select * from supplier where phone='".$_POST['supplier_phone']."' limit 1";
	$res=mysqli_query($con,$query);
	if(mysqli_num_rows($res)==1){
		while($row=mysqli_fetch_array($res)){
			echo json_encode($row);
			
		}
	}
}
?>