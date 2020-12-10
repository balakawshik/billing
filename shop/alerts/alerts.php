<?php
include("../connection.php");
if($con){
	$query="select * from product where qty<threshold_qty;";
	$res=mysqli_query($con,$query);
	$js=array();
	while($row=mysqli_fetch_array($res)){
		$js[]=$row;
	}
	echo json_encode($js);
}
?>