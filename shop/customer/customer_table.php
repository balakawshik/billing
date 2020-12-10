<?php
include("../connection.php");
if($con){
	$query="select * from customer";
	$res=mysqli_query($con,$query);
	$cus_type=array("Regular","Wholesale","Unknown");
	echo"<div class='w-100 text-center p-2 mb-3'><span class='h4 text-center'>Customer Details Table</span><button class='float-right  btn btn-warning'>&times;</button></div>";
	echo"<table class='table table-bordered '>";
	echo"<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Phone</th>
			<th>Type</th>
		</tr>
		</thead>";
	while($row=mysqli_fetch_array($res)){
		echo"<tr>
				<td>".$row['customer_id']."</td>
				<td>".$row['name']."</td>
				<td>".$row['phone']."</td>
				<td>".$cus_type[$row['type']]."</td>
			</tr>";
	}
	echo"</table>";
}
?>