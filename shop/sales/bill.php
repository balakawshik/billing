<?php
if(!empty($_POST)){
	
	include("../connection.php");
	$response=array();
	$total=$_POST['total'];
	$paid=$_POST['paid'];
	$discount=$_POST['discount'];
	$customer_id=$_POST['customer_id'];
	$bill_id;
	$status="UNPAID";
	if($total-$paid==0){
		$status="PAID";
	}
	if($total!="" and $paid!="" and $discount!=""){
		$query="insert into bills(customer_id,amount,discount,paid,status) values($customer_id,$total,$discount,$paid,'$status');";
		$query.="select max(bill_id) as `LSID` from bills";
		
		if(mysqli_multi_query($con,$query)){
			$res=mysqli_next_result($con);
			if($res=mysqli_store_result($con)){
				$row=mysqli_fetch_array($res);
				$bill_id=$row['LSID'];
				$response[1]=$bill_id;
			}
			else{
				$response[0]="failure";
			}
			
		}
		else{
			$response[0]="failure";
		}
		
	}
	$sales_query="";
	$js=json_decode($_POST['json']);
	foreach($js as $key){
		$sales_query.="insert into sales(bill_id,customer_id,product_id,qty,price) values ($bill_id,$customer_id,$key[0],$key[3],$key[4]);";
		$sales_query.="update product set qty=qty-$key[3] where product_id=$key[0];";
	}
	if(mysqli_multi_query($con,$sales_query)){
		$response[0]="success";
	}
	else{
		$response[0]="failure";
	}
	
}
else{
	$response[0]="failure";
}
echo json_encode($response);
?>