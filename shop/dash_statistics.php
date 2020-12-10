<?php
include("connection.php");
if($con){
	if($_POST["type"]=="purchase"){
		$query="select sum(purchase_qty), sum(purchase_qty*purchase_price) from purchase";
		$res=mysqli_query($con,$query);
		while($row=mysqli_fetch_array($res)){
			echo json_encode($row);
		}
	}
	elseif($_POST["type"]=="payment"){
		$query="select count(*),SUM(if(status='PAID',1,0)),
			SUM(if(status='UNPAID',1,0)),
			SUM(amount),
			SUM(if(status!='CANCELLED',paid,0)),
			SUM(if(status='UNPAID',amount-paid,0)) 
			from bills";
		$res=mysqli_query($con,$query);
		while($row=mysqli_fetch_array($res)){
			echo json_encode($row);
		}
		
	}
	elseif($_POST["type"]=="stock"){
		$query="SELECT sum(qty),sum(qty*selling_price) FROM product";
		$res=mysqli_query($con,$query);
		while($row=mysqli_fetch_array($res)){
			echo json_encode($row);
		}
		
	}
	elseif($_POST["type"]=="sold"){
		$query="SELECT sum(qty),sum(qty*price) FROM sales join bills on sales.bill_id=bills.bill_id where status!='CANCELLED'";
		$res=mysqli_query($con,$query);
		while($row=mysqli_fetch_array($res)){
			echo json_encode($row);
		}
		
	}
}
?>