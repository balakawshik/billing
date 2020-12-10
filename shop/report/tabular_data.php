<?php
include("../connection.php");
if($con){
	
	$for=$_POST['for'];
	if($for=="1"){
	
		$query="SELECT purchase_id,product_name,type,purchase_qty,threshold_qty,selling_price,purchase_price,purchase.date FROM purchase  join product on purchase.product_id=product.product_id
		where DATE(purchase.date)>='".$_POST['from']."' and DATE(purchase.date)<='".$_POST['to']."' ";
		$res=mysqli_query($con,$query);
		$str="	<table class='table table-hover table-bordered'>
					<thead>
						<tr>
							<th>S.No</th>
							<th>purchase ID</th>
							<th>Product Name</th>
							<th>Type</th>
							<th>Quantity</th>
							<th>Reorder Quantity</th>
							<th>Selling Price</th>
							<th>Purchased Price</th>
							<th>Date</th>
						</tr>
					</thead>";
		$i=1;			
		while($row=mysqli_fetch_array($res)){
			$str.="	<tr>
						<td>".$i++."</td>
						<td>".$row['purchase_id']."</td>
						<td>".$row['product_name']."</td>
						<td>".$row['type']."</td>
						<td>".$row['purchase_qty']."</td>
						<td>".$row['threshold_qty']."</td>
						<td>".$row['selling_price']."</td>
						<td>".$row['purchase_price']."</td>
						<td>".$row['date']."</td>
					</tr>";
						
		}
		$str.="</table>";
		echo $str;
	}
	elseif($for=='2'){
		$query="SELECT bill_id,bills.customer_id,name,phone,GST,amount,paid,discount,status,bills.date
		FROM `bills` JOIN customer 
		on customer.customer_id=bills.customer_id
		where DATE(bills.date)>='".$_POST['from']."' and DATE(bills.date)<='".$_POST['to']."' ";
		$res=mysqli_query($con,$query);
		$str="	<table class='table table-hover table-bordered'>
					<thead>
						<tr>
							<th>S.No</th>
							<th>Bill ID</th>
							<th>Customer ID</th>
							<th>Name</th>
							<th>Phone</th>
							<th>GST</th>
							<th>Amount</th>
							<th>Paid</th>
							<th>Discount ( % )</th>
							<th>Status</th>
							<th>Date</th>
						</tr>
					</thead>";
		$i=1;			
		while($row=mysqli_fetch_array($res)){
			
			$status=($row['status']=="PAID" or $row['status']=="CANCELLED" )?"":((($row['amount']-$row['paid'])>1000)?"bg-danger":"bg-warning");
			$str.="	<tr>
						<td>".$i++."</td>
						<td>".$row['bill_id']."</td>
						<td>".$row['customer_id']."</td>
						<td>".$row['name']."</td>
						<td>".$row['phone']."</td>
						<td>".$row['GST']."</td>
						<td>".$row['amount']."</td>
						<td>".$row['paid']."</td>
						<td>".$row['discount']."</td>
						<td class=".$status.">".$row['status']."</td>
						<td>".$row['date']."</td>
					</tr>";
						
		}
		$str.="</table>";
		echo $str;
	}
	elseif($for=='3'){
		$query="SELECT bill_id,bills.customer_id,name,phone,GST,amount,paid,discount,status,bills.date
		FROM `bills` JOIN customer 
		on customer.customer_id=bills.customer_id
		where DATE(bills.date)>='".$_POST['from']."' and DATE(bills.date)<='".$_POST['to']."' and LENGTH(GST)>5 ";
		$res=mysqli_query($con,$query);
		$str="	<table class='table table-hover table-bordered'>
					<thead>
						<tr>
							<th>S.No</th>
							<th>Bill ID</th>
							<th>Customer ID</th>
							<th>Name</th>
							<th>Phone</th>
							<th>GST</th>
							<th>Amount</th>
							<th>Paid</th>
							<th>Discount ( % )</th>
							<th>Status</th>
							<th>Date</th>
						</tr>
					</thead>";
		$i=1;			
		while($row=mysqli_fetch_array($res)){
			
			$status=($row['status']=="PAID")?"":((($row['amount']-$row['paid'])>1000)?"bg-danger":"bg-warning");
			$str.="	<tr>
						<td>".$i++."</td>
						<td>".$row['bill_id']."</td>
						<td>".$row['customer_id']."</td>
						<td>".$row['name']."</td>
						<td>".$row['phone']."</td>
						<td>".$row['GST']."</td>
						<td>".$row['amount']."</td>
						<td>".$row['paid']."</td>
						<td>".$row['discount']."</td>
						<td class=".$status.">".$row['status']."</td>
						<td>".$row['date']."</td>
					</tr>";
						
		}
		$str.="</table>";
		echo $str;
	}
	elseif($for=='4'){
		$query="SELECT bill_id,name,address,GST,amount,DATE(bills.date) as date
		FROM `bills` JOIN customer 
		on customer.customer_id=bills.customer_id
		where DATE(bills.date)>='".$_POST['from']."' and DATE(bills.date)<='".$_POST['to']."' and LENGTH(GST)>5 and status!='CANCELLED'";
		$res=mysqli_query($con,$query);
		$str="	<table class='table table-hover table-bordered'>
					<thead>
						<tr>
							<th>S.No</th>
							<th>Bill ID</th>
							<th>Name</th>
							<th>Address</th>
							<th>GST</th>
							<th>Amount ( Rs. )</th>
							<th>Date</th>
						</tr>
					</thead>";
		$i=1;			
		while($row=mysqli_fetch_array($res)){
			
			$str.="	<tr>
						<td>".$i++."</td>
						<td>".$row['bill_id']."</td>
						<td>".$row['name']."</td>
						<td>".$row['address']."</td>
						<td>".$row['GST']."</td>
						<td>".$row['amount']."</td>
						<td>".$row['date']."</td>
					</tr>";
						
		}
		$str.="</table>";
		echo $str;
	}
	elseif($for=='5'){
		$query="SELECT bill_id,name,address,GST,amount,DATE(bills.date) as date
		FROM `bills` JOIN customer 
		on customer.customer_id=bills.customer_id
		where DATE(bills.date)>='".$_POST['from']."' and DATE(bills.date)<='".$_POST['to']."' and status!='CANCELLED' ";
		$res=mysqli_query($con,$query);
		$str="	<table class='table table-hover table-bordered'>
					<thead>
						<tr>
							<th>S.No</th>
							<th>Bill ID</th>
							<th>Name</th>
							<th>Address</th>
							<th>GST</th>
							<th>Amount ( Rs. )</th>
							<th>Date</th>
						</tr>
					</thead>";
		$i=1;			
		while($row=mysqli_fetch_array($res)){
			
			$str.="	<tr>
						<td>".$i++."</td>
						<td>".$row['bill_id']."</td>
						<td>".$row['name']."</td>
						<td>".$row['address']."</td>
						<td>".$row['GST']."</td>
						<td>".$row['amount']."</td>
						<td>".$row['date']."</td>
					</tr>";
						
		}
		$str.="</table>";
		echo $str;
	}
	elseif($for=='6'){
		$query="select * from product";
	$res=mysqli_query($con,$query);
		$str="	<table class='table table-hover table-bordered'>
					<thead>
						<tr>
							<th>S.No</th>
							<th>ID</th>
							<th>Name</th>
							<th>Type</th>
							<th>Description</th>
							<th>Quantity</th>
							<th>Sell Price( Rs. )</th>
							<th>Reorder QTY</th>

						</tr>
					</thead>";
		$i=1;			
		while($row=mysqli_fetch_array($res)){
			
			$str.="	<tr>
						<td>".$i++."</td>
						<td>".$row['product_id']."</td>
						<td>".$row['product_name']."</td>
						<td>".$row['type']."</td>
						<td>".$row['description']."</td>
						<td>".$row['qty']."</td>
						<td>".$row['selling_price']."</td>
						<td>".$row['threshold_qty']."</td>
					</tr>";
						
		}
		$str.="</table>";
		echo $str;
		
	}
	elseif($for=='7'){
		$query="
			select 
			product.product_id,product_name,type,
			max(COALESCE(price,0)) as max_sales,min(COALESCE(price,0)) as min_sales,avg(COALESCE(price,0)) as avg_sales,
			sum(COALESCE(sales.qty,0)) as sales_qty,sum(COALESCE(price,0)*COALESCE(sales.qty,0)) as sales_amt,

			sum(purchase_qty) as pur_qty,sum(purchase_price*purchase_qty) as cost,
			product.qty as avail_qty,product.qty*avg(purchase_price) as in_business,product.qty*selling_price as sellable

			from product 
				left join purchase 
					on product.product_id=purchase.product_id
				left join sales 
					on product.product_id=sales.product_id
			group by product.product_id";
	$res=mysqli_query($con,$query);
		$str="	<table class='table table-hover table-bordered'>
					<thead>
						<tr class='text-center'>
							
							<th rowspan='2'>ID</th>
							<th rowspan='2'>Name</th>
							<th rowspan='2'>Type</th>
							<th colspan='5' >Sales</th>
							<th colspan='2' >Purchase</th>
							<th colspan='3' >Available</th>
						</tr>
						<tr>
							
							<th>Max</th>
							<th>Min</th>
							<th>Avg</th>
							<th>QTY</th>
							<th>Amt (Rs.)</th>
							<th>QTY</th>
							<th>Amt(Rs.)</th>
							<th>QTY</th>
							<th>Cost(Rs.)</th>
							<th>Sell Amt(Rs.)</th>

							
						</tr>
					</thead>";
		
		while($row=mysqli_fetch_array($res)){
			
			$str.="	<tr>
						
						<td>".$row['product_id']."</td>
						<td>".$row['product_name']."</td>
						<td>".$row['type']."</td>
						<td class='text-right'>".round($row['max_sales'],2)."</td>
						<td class='text-right'>".round($row['min_sales'],2)."</td>
						<td class='text-right'>".round($row['avg_sales'],2)."</td>
						<td>".round($row['sales_qty'],2)."</td>
						<td class='text-right'>".round($row['sales_amt'],2)."</td>
						
						<td>".round($row['pur_qty'],2)."</td>
						<td class='text-right'>".round($row['cost'],2)."</td>
						<td>".round($row['avail_qty'])."</td>
						<td class='text-right'>".round($row['in_business'],2)."</td>
						<td class='text-right'>".round($row['sellable'],2)."</td>
					</tr>";
						
		}
		$str.="</table>";
		echo $str;
		
	}
	elseif($for=='8'){
		$query="select id,product.product_id,product_name,return.qty,DATE(return.date) as date,type from `return` join product on return.product_id=product.product_id 
		where DATE(return.date)>='".$_POST['from']."' and DATE(return.date)<='".$_POST['to']."' ";
	$res=mysqli_query($con,$query);
		$str="	<table class='table table-hover table-bordered'>
					<thead>
						<tr class='text-center'>
							
							<th>ID</th>
							<th>Product ID</th>
							<th> Name</th>
							<th>Type</th>
							<th>QTY</th>
							<th>Date</th>
							
						</tr>
						
					</thead>";
		
		while($row=mysqli_fetch_array($res)){
			
			$str.="	<tr>
						
						<td>".$row['id']."</td>
						<td>".$row['product_id']."</td>
						<td>".$row['product_name']."</td>
						<td>".$row['type']."</td>
						<td>".$row['qty']."</td>
						<td>".$row['date']."</td>
						
					</tr>";
						
		}
		$str.="</table>";
		echo $str;
		
	}

}
echo mysqli_error($con);
?>