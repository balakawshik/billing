<?php
	include("../connection.php");
	if($con and !empty($_POST) and isset($_POST['product_name']) and isset($_POST['type'])){
		$query="select * from product where product_name='".$_POST['product_name']."' and type='".$_POST['type']."' limit 1";
		$res=mysqli_query($con,$query);
		while($row=mysqli_fetch_array($res)){
			echo json_encode($row);
			
		}
		
	}
	elseif($con and !empty($_POST) and isset($_POST['product_name'])){
		$query="select type from product where product_name='".$_POST['product_name']."'";
		$res=mysqli_query($con,$query);
		while($row=mysqli_fetch_array($res)){
			echo'<option value="'.$row['type'].'">';
			
		}
		
	} 
	elseif($con and !empty($_POST) and isset($_POST['product_id'])){
		$query="select * from product where product_id=".$_POST['product_id'];
		$res=mysqli_query($con,$query);
		if($res){
			while($row=mysqli_fetch_array($res)){
				echo json_encode($row);
			}	
		}
		else{
			echo"";
		}
		
	} 
	else{
		echo'<option value="sorry problem with options">';
	}
	
?>