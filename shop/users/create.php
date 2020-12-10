<?php
if(!empty($_POST)){
	$name=$_POST['username'];
	$pwd=$_POST['password'];
	$con=mysqli_connect("localhost","root","","shop");
	$query="insert into  users(name,password) values('".$name."' ,'".$pwd."')";
	$res=mysqli_query($con,$query);
	if($res){
		echo"success";
		
		
	}
	else{
		echo"failure";
	}
	
}
?>
